<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Country;
use App\Models\Data;
use App\Models\Image;
use App\Models\Mashruu;
use App\Models\Notify;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\Umrah;
use App\Models\University;
use App\Models\User;
use App\Models\Whatsapp;

class AdminController extends BaseController
{
    public function index()
    {
        helper('form');
        $user = new User();
        $tanfidh = new Tanfidh();
        $set = new Setting();
        $dt = new Data();

        $role = $user->find(session('id'));

        $data['mushrif'] = $user->where('role', 'mushrif')->countAllResults();
        // $data['makka'] = $tanfidh->where(['makkahLat' => null,'miqatLat!=' => null])->countAllResults();
        // $data['tanfidh'] = $tanfidh->where(['miqatLat' => null])->countAllResults();
        $data['judud'] = $user->where(['malaf' => null, 'status' => 0])->countAllResults();
        $data['set'] = $set->where(['info' => 'tasrihDate', 'extra>=' => date('Y-m-d')])->first();
        $data['full'] = count($user->findAll());
        // $data['jamia'] = count($user->groupBy('jamia')->where('jamia!=', null)->findAll());
        // $data['nationality'] = count($user->groupBy('nationality')->where('nationality!=', null)->findAll());
        $data['title'] = lang('app.dashboard');
        $data['tasrihNow'] = $tanfidh->where(['tasrih!=' => null, 'tnfdhStatus' => null])->countAllResults();
        $data['tasrih'] = $tanfidh->where('tnfdhStatus', null)->countAllResults();
        $data['tasrihAll'] = $tanfidh->where('tnfdhStatus', 0)->countAllResults();
        
        // $data['lead'] = $tanfidh->where('mushrif', session('id'))->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'done','mushrif', session('id')])->countAllResults();
        // $data['judud0'] = $user->where(['malaf' => null, 'status' => null, 'jamia' => $role['jamia'], 'nationality' => $role['nationality']])->countAllResults();
        // $data['judud1'] = $user->where(['malaf' => null, 'status' => 0, 'jamia' => $role['jamia'], 'nationality' => $role['nationality']])->countAllResults();
        $data['set'] = $set->where(['info' => 'tasrihDate', 'extra>=' => date('Y-m-d')])->first();
        // $data['total'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia'],'role!=' => 'admin'])->countAllResults();
        // $data['full'] = $user->where('role!=', 'admin')->countAllResults();
        // $data['tasrihNow'] = $tanfidh->where(['tasrih!=' => null, 'mushrif' => session('id'), 'tnfdhStatus!=' => null])->countAllResults();
        // $data['tasrihAll'] = $tanfidh->where(['tasrih!=' => null, 'mushrif' => session('id')])->countAllResults();
        // $data['title'] = lang('app.dashboard');
        $data['all'] = $dt->where(['userId' => session('id')])->findAll();
        $data['umra'] = $tanfidh->where('userId', session('id'))->first();
        $data['month'] = $dt->where(['month(created_at)' => date('m'), 'userId' => session('id')])->findAll();
        // dd($data);

        return view('admin/index', $data);  
    }

    
    public function jamia($jm)
    {
        $user = new User();
        $uni = new University();
        $whats = new Whatsapp();

        $data['title'] = lang('app.mushrifuna').' - '.$uni->find($jm)['uni_name'];
        $data['title2'] = lang('app.students').' - '.$uni->find($jm)['uni_name'];
        $data['type'] = 'jamia';
        $data['all'] = $user->where('jamia', $jm)->where('role!=', 'admin')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->findAll();
        $data['users'] = $user->where(['jamia' => $jm, 'role' => 'mushrif'])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->findAll();
        // dd($data);

        if (session('role') == 'admin') {
            return view('admin/mushrif', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    
    public function nat($nt)
    {
        $user = new User();
        $nat = new Country();
        $what = new Whatsapp();

        $data['title'] = lang('app.mushrifuna').' - '.$nat->where('country_code' , $nt)->first()['country_arName'];
        $data['type'] = 'nat';
        $data['title2'] = lang('app.students').' - '.$nat->where('country_code', $nt)->first()['country_arName'];
        $data['all'] = $user->where('nationality', $nt)->where('role!=', 'admin')
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->findAll();
        $data['users'] = $user->where(['nationality' => $nt, 'role' => 'mushrif'])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->findAll();
        // dd($data);

        if (session('role') == 'admin') {
            return view('admin/mushrif', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    public function users($nat, $jam)
    {
        $user = new User();
        $nationality = new Country();
        $jamia = new University();
        $whats = new Whatsapp();
        
        $nt = $nationality->where('country_code', $nat)->first();
        $jm = $jamia->where('uni_id', $jam)->first();
        $data['title'] = lang('app.users').' - '.$nt['country_arName'] .' - '.$jm['uni_name'];
        $data['users'] = $user->where(['jamia' => $jam, 'nationality' => $nat])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->orderBy('role', 'desc')
                            ->findAll();
        $data['mushrif'] = $user->where(['jamia' => $jam, 'nationality' => $nat, 'role' => 'mushrif'])
                            ->join('countries n', 'n.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->first();
        $data['type'] = 'all';
        $data['whats'] = $whats->where(['country_code' => $nat, 'jamia_id' => $jam])->first();
        // dd($data);
        
        if (session('role') == 'admin') {
            return view('admin/users', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    public function addMushrif($id)
    {
        $user = new User();
        $data = [
            'role' => 'mushrif',
        ];
        $ok = $user->update($id, $data);
        // dd($data);

        if ($ok) {
            return redirect()->to('admin/show/'.$id)->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.edit').' '. lang('app.profile').' '. lang('app.success'));
        }
    }

    public function show($id = null)
    {
        $user = new User();
        $image = new Image();
        $mash = new tanfidh();

        $data['user'] = $user->join('countries c', 'c.country_code=users.nationality')
                        ->join('universities u', 'u.uni_id=users.jamia')
                        ->find($id);
        $m = $data['user']['mushrif'];
        if ($m!=null) {
            $data['mushrif'] = $user->find($m);
        } else {
            $data['mushrif'] = null;
        }
        
        $data['img'] = $image->where('userId', $id)->first();
        $data['mashruu'] = $mash->where('userId', $id)->findAll();
        $data['title'] = lang('app.user');
        // dd($data);

        return view('admin/user', $data);
    }

    public function all()
    {
        $user = new User();

        $data['users'] = $user
                            ->join('countries c', 'c.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->join('banks', 'banks.bankId=users.bank')
                            ->findAll();
        $data['judud'] = $user->where('malaf', null)
                            ->join('countries c', 'c.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->join('banks', 'banks.bankId=users.bank')
                            ->findAll();
        $data['title'] = lang('app.students');
        // dd($data);

        return view('admin/all', $data);
    }

    public function delete($id)
    {
        $user = new User();

        $ok = $user->delete($id);

        if ($ok) {
            return redirect()->to('admin/view')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.delete') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }

    public function activate($id)
    {
        $user = new User();
        $set = new Setting();
        $image = new Image();

        $cnt = $set->where('name', 'count')->first()['value'];
        $img = $image->where('userId', $id)->first();
        $data['users'] = $user->find($id);
        $data['title'] = lang('app.judud');
        $malaf = $user->find($id)['malaf'];
        
        $ok = $user->select('malaf')->orderBy('id', 'desc')->findAll();
            foreach ($ok as $data) {
                $arr1[] = $data['malaf'];
            }
            for ($i=1000; $i < intval($cnt); $i++) { 
                if (!(in_array($i, $arr1))) {
                    $dt = [
                        'malaf' => $i,
                    ];
                }
            }
        $updt = $user->update($id, $dt);
        if ($updt) {
            
            if (file_exists('app-assets/images/malaf/new/'.$img['imgIqama'])) {
                $path = 'app-assets/images/malaf/new/'.$img['imgIqama'];
                $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                $file = new \CodeIgniter\Files\File($path);
                if (!file_exists($newPath)) {
                    mkdir($newPath, 0777, true);
                }
                $file->move($newPath);
            }
            if (file_exists('app-assets/images/malaf/new/'.$img['imgPass'])) {
                $path = 'app-assets/images/malaf/new/'.$img['imgPass'];
                $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                $file = new \CodeIgniter\Files\File($path);
                if (!file_exists($newPath)) {
                    mkdir($newPath, 0777, true);
                }
                $file->move($newPath);
            }
            if (file_exists('app-assets/images/malaf/new/'.$img['imgStu'])) {
                $path = 'app-assets/images/malaf/new/'.$img['imgStu'];
                $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                $file = new \CodeIgniter\Files\File($path);
                if (!file_exists($newPath)) {
                    mkdir($newPath, 0777, true);
                }
                $file->move($newPath);
            }
            if (file_exists('app-assets/images/malaf/new/'.$img['imgIban'])) {
                $path = 'app-assets/images/malaf/new/'.$img['imgIban'];
                $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                $file = new \CodeIgniter\Files\File($path);
                if (!file_exists($newPath)) {
                    mkdir($newPath, 0777, true);
                }
                $file->move($newPath);
            }

            return redirect()->to('admin')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.register') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }

    public function activateAll()
    {
        $user = new User();
        $set = new Setting();
        $image = new Image();

        $cnt = $set->where('name', 'count')->first()['value'];
        $ok = $user->select('malaf')->orderBy('id', 'desc')->findAll();
            foreach ($ok as $data) {
                $arr1[] = $data['malaf'];
            }
            for ($i=1000; $i < intval($cnt); $i++) { 
                if (!(in_array($i, $arr1))) {
                    $dt[] = $i;
                }
            }
            foreach ($this->request->getVar('id') as $key => $value) {
                $id = $value;
                $d = [
                    'malaf' => $dt[$key],
                    'status' => 1,
                    'id' => $id
                ];
                $updt = $user->update($id, $d);
                
                $malaf = $user->find($id)['malaf'];
                $img = $image->where('userId', $id)->first();
                
                if ($updt) {
                    
                    if (file_exists('app-assets/images/malaf/new/'.$img['imgIqama'])) {
                        $path = 'app-assets/images/malaf/new/'.$img['imgIqama'];
                        $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                        $file = new \CodeIgniter\Files\File($path);
                        if (!file_exists($newPath)) {
                            mkdir($newPath, 0777, true);
                        }
                        $file->move($newPath);
                    }
                    if (file_exists('app-assets/images/malaf/new/'.$img['imgPass'])) {
                        $path = 'app-assets/images/malaf/new/'.$img['imgPass'];
                        $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                        $file = new \CodeIgniter\Files\File($path);
                        if (!file_exists($newPath)) {
                            mkdir($newPath, 0777, true);
                        }
                        $file->move($newPath);
                    }
                    if (file_exists('app-assets/images/malaf/new/'.$img['imgStu'])) {
                        $path = 'app-assets/images/malaf/new/'.$img['imgStu'];
                        $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                        $file = new \CodeIgniter\Files\File($path);
                        if (!file_exists($newPath)) {
                            mkdir($newPath, 0777, true);
                        }
                        $file->move($newPath);
                    }
                    if (file_exists('app-assets/images/malaf/new/'.$img['imgIban'])) {
                        $path = 'app-assets/images/malaf/new/'.$img['imgIban'];
                        $newPath = 'app-assets/images/malaf/'.$malaf.'/';

                        $file = new \CodeIgniter\Files\File($path);
                        if (!file_exists($newPath)) {
                            mkdir($newPath, 0777, true);
                        }
                        $file->move($newPath);
                    }
                }
            }
            
            // dd($d);
            if ($updt) {
                return redirect()->to('admin')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.register') . ' ' . lang('app.student') . ' ' . lang('app.success'));
            }
    }

    public function tanfidh()
    {
        $dt = new Data();

        $data['title'] = lang('app.hadiya');
        $data['all'] = $dt->countAllResults();
        $data['month'] = $dt->where('month(created_at)', date('m'))->findAll();
        // dd($data);

        return view('mashruu/tanfidh', $data);
    }
    
    public function tanfidhAll()
    {
        $dt = new Data();

        $data['title'] = lang('app.hadiya');
        $data['all'] = $dt->findAll();
        // dd($data);

        return view('mashruu/tanfidhAll', $data);
    }

    public function tasrih()
    {
        $tanfidh = new Tanfidh();
        
        $data['tasrih'] = $tanfidh->where(['tnfdhStatus' => 0, 'tasrih!=' => null])
                            ->join('users u', 'u.id=tanfidh.userId')
                            ->findAll();
        $data['title'] = lang('app.tasrih');
        dd($data);
        
        if (session('role') == 'admin') {
            return view('admin/tasrih', $data);
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }
    
    public function tasrihUser($id)
    {
        // dd($id);
        helper('form');

        $tanfidh = new Tanfidh();
        $user = new User();

        $mr = $user
                ->join('countries c', 'c.country_code=users.nationality')
                ->join('universities u', 'u.uni_id=users.jamia')
                ->find($id);
        $mushrif = $mr['mushrif']??null;
        $data['user'] = $tanfidh->where(['tanfidh.mushrif' => $mushrif, 'tnfdhStatus' => 0, 'tanfidh.userId' => $id])
                            ->join('users u', 'u.id=tanfidh.userId')
                            ->join('images', 'u.id=images.userId')
                            ->first();
        $data['title'] = lang('app.tasrih');
        $data['loc'] = $mr['country_arName'].' - '.$mr['uni_name'];
        // dd($data);
        
        if (session('role') == 'admin') {
            return view('admin/userTasrih', $data);
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }

    public function mulahadha($id)
    {
        // dd($this->request->getVar());
        $usr = new User();
        $tan = new Tanfidh();
        $not = new Notify();

        if (session('role') != 'user') {
            
            $user = $tan->find($id);
            // dd(file_exists($user['tasrih']));
            if (file_exists($user['tasrih'])) {
                unlink($user['tasrih']);
            }

            $data = [
                'mulahadha' => $this->request->getVar('mulahadha'),
                'tnfdhStatus' => null,
                'tasrih' => null,
            ];

            $user = $usr->find($this->request->getVar('userId'));
            $dt = [
                'title' => 'tasrih',
                'info' => 'danger',
                'mushrif' => $user['mushrif'],
                'userId' => $this->request->getVar('userId'),
                'description' => $this->request->getVar('mulahadha'),
            ];
            // dd($data);

            $not->save($dt);
            $ok = $tan->update($id, $data);
            
            if ($ok) {
                return redirect()->to('admin/tasrih')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
            }
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }

    public function editMushrif($id)
    {
        $user = new User();

        $usr = $user->find($id);
        $dt = ['mushrif' => null];
        // dd($dt);
        $user->update($id, $dt);

        return redirect()->back()->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));;
    }
}
