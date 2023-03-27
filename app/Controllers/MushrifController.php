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

class MushrifController extends BaseController
{
    public function index()
    {
        helper('form');
        
        $user = new User();
        $tanfidh = new Tanfidh();
        $set = new Setting();
        $dt = new Data();

        $ok = $user->where(['nationality!=' => 'TZ', 'nationality!=' => 'SA'])->first();
        dd($ok);

        $role = $user->find(session('id'));
        $data['lead'] = $tanfidh->where('mushrif', session('id'))->countAllResults();
        $data['status'] = $tanfidh->where(['tnfdhStatus' => 'done','mushrif', session('id')])->countAllResults();
        $data['judud0'] = $user->where(['malaf' => null, 'status' => null, 'jamia' => $role['jamia'], 'nationality' => $role['nationality']])->countAllResults();
        $data['judud1'] = $user->where(['malaf' => null, 'status' => 0, 'jamia' => $role['jamia'], 'nationality' => $role['nationality']])->countAllResults();
        $data['set'] = $set->where(['info' => 'tasrihDate', 'extra>=' => date('Y-m-d')])->first();
        $data['total'] = $user->where(['nationality' => $role['nationality'], 'jamia' => $role['jamia'],'role!=' => 'admin'])->countAllResults();
        $data['full'] = $user->where('role!=', 'admin')->countAllResults();
        $data['tasrihNow'] = $tanfidh->where(['tasrih!=' => null, 'mushrif' => session('id'), 'tnfdhStatus!=' => null])->countAllResults();
        $data['tasrihAll'] = $tanfidh->where(['tasrih!=' => null, 'mushrif' => session('id')])->countAllResults();
        $data['title'] = lang('app.dashboard');
        $data['all'] = $dt->where(['userId' => session('id')])->findAll();
        $data['umra'] = $tanfidh->where('userId', session('id'))->first();
        $data['month'] = $dt->where(['month(created_at)' => date('m'), 'userId' => session('id')])->findAll();
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/index', $data);
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }
    
    public function users()
    {
        helper('form');
        
        $user = new User();
        $nat = new Country();
        $jam = new University();
        $whats = new Whatsapp();

        $dt = $user->find(session('id'));
        $jm = $jam->find($dt['jamia']);
        $nt = $nat->where('country_code', $dt['nationality'])->first();
        // $data['users'] = $user->where('mushrif', session('id'))
        $data['users'] = $user->where(['nationality' => $dt['nationality'], 'jamia' => $dt['jamia']])
                            ->orderBy('role', 'asc')
                            ->findAll();
        $data['check'] = lang('app.students');
        $data['title'] = lang('app.students').' - '.$jm['uni_name'].' - '.$nt['country_arName'];
        $data['whats'] = $whats->where(['country_code' => $nt['country_code'], 'jamia_id' => $jm['uni_id']])->first();
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/users', $data);
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }
    
    public function judud()
    {
        $user = new User();
        $nat = new Country();
        $jam = new University();

        $dt = $user->find(session('id'));
        // $data['users'] = $user->where(['mushrif' => session('id'), 'malaf' => null])->findAll();
        $data['users'] = $user->where(['nationality' => $dt['nationality'], 'jamia' => $dt['jamia'], 'malaf' => null])->findAll();
        $data['check'] = lang('app.students');
        $jm = $jam->find($dt['jamia'])['uni_name'];
        $nt = $nat->where('country_code', $dt['nationality'])->first()['country_arName'];
        $data['title'] = lang('app.judud').' - '.$nt.' - '.$jm;
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/judud', $data);
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }
    
    public function user($id)
    {
        $user = new User();
        $image = new Image();
        $mash = new Mashruu();
        
        $data['user'] = $user->join('countries c', 'c.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->find($id);
        $data['mashruu'] = $mash->where('userId', $id)->findAll();
        $data['img'] = $image->where('userId', $id)->first();
        $data['title'] = lang('app.jadid');
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/user', $data);
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }

    public function active($id)
    {
        helper('form');

        $img = new Image();
        $user = new User();

        $data['img'] = $img->where('userId', $id)->first();
        $data['user'] = $user->find($id);
        $data['title'] = lang('app.data');
        // dd($data);

        if (!$data['img']) {
            $insert = [
                'userId' => $id
            ];
            $img->save($insert);
        $data['img'] = $img->where('userId', $id)->first();
        }
        // dd($data);

        if (session('role') == 'mushrif') {
            return view('mushrif/image', $data);
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }

    public function activate($id)
    {
        helper('form');

        $user = new User();

        $data['user'] = $user->find($id);
        $data['title'] = lang('app.data');
        // dd($data);

        $insert = [
            'status' => 0
        ];
        $ok = $user->update($id, $insert);
        // dd($data);
        if ($ok) {
            return redirect()->to('mushrif/judud')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.activate') . ' ' . lang('app.student') . ' ' . lang('app.success'));
        }
    }

    public function tasrih()
    {
        $tanfidh = new Umrah();
        $user = new User();

        $mr = $user
                ->join('countries c', 'c.country_code=users.nationality')
                ->join('universities u', 'u.uni_id=users.jamia')
                ->find(session('id'));
        $mushrif = $mr['id'];
        $data['tasrih'] = $tanfidh->where(['tanfidh.mushrif' => $mushrif, 'tnfdhStatus' => null])
                            ->join('users u', 'u.id=tanfidh.userId')
                            ->findAll();
        $data['title'] = lang('app.tasrih');
        // dd($data);
        
        if (session('role') == 'mushrif') {
            if (!$data['tasrih']) {
                return redirect()->to('user');
            } else {
                return view('mushrif/tasrih', $data);
            }
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }
    
    public function tasrihUser($id)
    {
        // dd($id);
        helper('form');

        $tanfidh = new Umrah();
        $user = new User();

        $mr = $user
                ->join('countries c', 'c.country_code=users.nationality')
                ->join('universities u', 'u.uni_id=users.jamia')
                ->find(session('id'));
        $mushrif = $mr['id'];
        $data['user'] = $tanfidh->where(['tanfidh.mushrif' => $mushrif, 'tnfdhStatus' => null, 'tanfidh.userId' => $id])
                            ->join('users u', 'u.id=tanfidh.userId')
                            ->join('images', 'u.id=images.userId')
                            ->first();
        $data['title'] = lang('app.tasrih');
        $data['loc'] = $mr['country_arName'].' - '.$mr['uni_name'];
        // dd($data);
        
        if (session('role') == 'mushrif') {
            if (!$data['user']) {
                return redirect()->to('user');
            } else {
                return view('mushrif/userTasrih', $data);
            }
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
            // dd($dt);

            $not->save($dt);
            $ok = $tan->update($id, $data);

            if ($ok) {
                return redirect()->to('mushrif/tasrih')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
            }
        } else {
            return redirect()->to('user')->with('type', 'error')->with('text', lang('app.authorisedPersonellOnly'))->with('title', lang('app.sorry'));
        }   
    }

    public function sendTasrih($id)
    {
        $tanfidh = new Umrah();

        $data = [
            'tnfdhStatus' => 0,
        ];
        // dd($data);

        $ok = $tanfidh->update($id, $data);
        if ($ok) {
            return redirect()->to('mushrif/tasrih')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.activate') . ' ' . lang('app.tanfidh') . ' ' . lang('app.success'));
        }
    }

    public function tasrihDelete($id)
    {
        $tanfidh = new Umrah();
        $usr = new User();
        $nat = new Country();
        $jam = new University();
        
        $user = $tanfidh->find($id);
        $next = $user['tnfdhDate'];
        $us = $usr->find($user['mushrif']);
        $nt = $nat->where('country_code', $us['nationality'])->first()['country_arName'];
        $jm = $jam->where('uni_id', $us['jamia'])->first()['uni_name'];
        $mushrif = $nt.' - '. $jm;
        $pic = $user['tasrih']??sprintf('%04s',session('malaf'));

        // dd(file_exists('app-assets/images/tasrih/'.$mushrif.'/'. $pic));
        if (file_exists('app-assets/images/tasrih/'.$mushrif.'/' . $pic)) {
            $path = 'app-assets/images/tasrih/'.$mushrif.'/' . $pic;

            unlink($path);
        }

        $data = [
            'tasrih' => null,
            'tnfdhStatus' => null,
        ];
        // dd($data);
        
        $ok = $tanfidh->update($id, $data);
        if ($ok) {
            return redirect()->to('mushrif/tasrih')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.activate') . ' ' . lang('app.tanfidh') . ' ' . lang('app.success'));
        }
    }

    public function tanfidh()
    {
        $dt = new Data();
        $nat = new Country();
        $usr = new User();
        $uni = new University();
        
        $user = $usr->find(session('id'));
        $cntry_code = $user['nationality'];
        $uni_id = $user['jamia'];
        $nat = $nat->where('country_code', $cntry_code)->first();
        $uni = $uni->find($uni_id);

        $data['title'] = lang('app.tanfidh');
        $data['tanfidh'] = $dt->where(['month(created_at)' => date('m'), 'nation' => $nat['country_arName'], 'jamia' => $uni['uni_name']])->findAll();
        // dd($data);
        
        return view('mushrif/full', $data);
    }

    public function thisMonthTanfidh()
    {
        $usr = new User();
        $dt = new Data();
        $nat = new Country();
        $uni = new University();
        $umra = new Umrah();

        $user = $usr->find(session('id'));
        $cntry_code = $user['nationality'];
        $uni_id = $user['jamia'];
        $nat = $nat->where('country_code', $cntry_code)->first();
        $uni = $uni->find($uni_id);

        $data['title'] = lang('app.tanfidh').' - '. lang('app.thisMonth');
        $data['not'] = $umra
                        ->join('users u', 'u.id=tanfidh.userId')
                        ->join('banks', 'u.bank=banks.bankId')
                        ->join('countries c', 'c.country_code=u.nationality')
                        ->join('universities v', 'v.uni_id=u.jamia')
                        ->where('u.mushrif', session('id'))->findAll();
        $data['month'] = $dt->where(['month(created_at)' => date('m'), 'nation' => $nat['country_arName'], 'jamia' => $uni['uni_name']])->findAll();
        // dd($data);

        return view('mushrif/tanfidh', $data);
    }
}
