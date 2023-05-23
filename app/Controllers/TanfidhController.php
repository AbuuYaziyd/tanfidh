<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bank;
use App\Models\Country;
use App\Models\Data;
use App\Models\Mashruu;
use App\Models\Notify;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\University;
use App\Models\User;

class TanfidhController extends BaseController

{
    public function index()
    {
        helper('form');

        $umrah = new Tanfidh();
        $set = new Setting();

        $data['title'] = lang('app.tanfidh');
        $data['next'] = $set->where(['name'=>'tanfidhDate','value>='=>date('Y-m-d')])->orderBy('value','asc')->findAll();
        $data['umrah'] = $umrah->where(['userId' => session('id')])->orderBy('tnfdhId', 'DESC')->first();
        $data['green'] = $umrah->where(['userId' => session('id'), 'tnfdhStatus' => 'completed'])->first();
        // dd($data);

        if ($data['umrah'] != null) {
            return view('umrah/index', $data);
        } else {
            return redirect()->to('user')->with('type', 'info')->with('title', lang('app.regNotOk'));
        }
    }

    public function create()
    {
        // dd($this->request->getVar());
        $umrah = new Tanfidh();
        $usr = new User();

        $id = $this->request->getVar('id');
        $tanfidh = $this->request->getVar('tanfidh');
        $user = $usr->find(session('id'));
        // dd($user);

        $data['title'] = lang('app.umrah');
        $check = $umrah->where(['userId' => $id, 'tnfdhDate' => $tanfidh])->countAllResults();
        // dd($check);

        if ($check <= 0) {
            $reg = [
                'userId' => $id,
                'malaf' => session('malaf'),
                'tnfdhDate' => $tanfidh,
                'bank' => $user['bank'],
                'mushrif' => $usr->where('role', 'admin')->first()['name'],
            ];
            // dd($reg);
            
            $umrah->save($reg);

            return redirect()->to('umrah')->with('type', 'success')->with('text', lang('app.regOk'))->with('title', lang('app.done'));
        }else {
            return redirect()->back()->with('type', 'error')->with('title', lang('app.sorry'))->with('text', lang('app.errorOccured'));
        }
    }

    public function show($id)
    {
        helper('form');

        $umrah = new Tanfidh();
        $user = new User();

        $ok = $umrah->find($id);

        // dd($ok);
        if (!$ok) {
            return redirect()->to('umrah/create');
        } else {
            $data['title'] = lang('app.umrah');
            $data['umrah'] = $ok;
            $usr = $user
                     ->join('countries c', 'c.country_code=users.nationality')
                     ->join('universities u', 'u.uni_id=users.jamia')
                    ->find($ok['userId']);
            $data['loc'] = $usr['country_arName'].' - '.$usr['uni_name'];
            // dd($data);

            return view('umrah/edit', $data);
        }
    }

    public function update($id)
    {
        $this->request->getFile('img');
        
        $umrah = new Tanfidh();
        $usr = new User();
        $nat = new Country();
        $jam = new University();
        $notfy = new Notify();

        $user = $umrah->find($id);
        // $us = $usr->find(session('id'));
        // $nt = $nat->where('country_code', $us['nationality'])->first()['country_arName'];
        $notf = $notfy->where(['userId' => $user['userId'], 'title' => 'tasrih'])->findAll();
        // $jm = $jam->where('uni_id', $us['jamia'])->first()['uni_name'];
        // $mushrif = $nt.' - '. $jm;
        // $upl = 'tasrih';
        // $next = $user['tnfdhDate'];
        // dd($user);

        $validationRule = $this->validate(
            [
                'img' => 'uploaded[img]|mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,2048]',
            ],
            [   // Errors
                'img' => [
                    'uploaded' => lang('error.uploaded'),
                    'mime_in' => lang('error.mime'),
                    'max_size' => lang('error.max_size'),
                ],
            ]
        );

        if (!$validationRule) {
            $data = ['errors' => $this->validator->getErrors()];

            helper('form');
            $data['title'] = lang('app.data');
            // dd($data['errors']['img']);
            return redirect()->to('umrah/show/'.$id)->with('type', 'error')->with('text', lang(
            'app.errorOccured'))->with('title', $data['errors']['img']);
        }

        // dd(file_exists($user['tasrih']));
        if (file_exists($user['tasrih'])) {

            // dd($user['tasrih']);
            unlink($user['tasrih']);

            $img = $this->request->getFile('img');
            $ext = $img->getClientExtension();
            $name = $user['tnfdhId']. '.' . $ext;
            $loc = 'app-assets/images/tasrih/'.$user['tnfdhId'] . '.' . $ext;

            $ppn = [
                'tasrih' => $loc,
                'mulahadha' => null,
            ];
            // dd($ppn);

            // dd($notf);
            if ($notf != null) {
                foreach ($notf as $value) {
                    $notfy->delete($value['id']);
                }
            }

            $img->move('app-assets/images/tasrih/', $name);
            $umrah->update($id, $ppn);

            return redirect()->to('umrah')->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
        } else {
            $img = $this->request->getFile('img');
            $ext = $img->getClientExtension();
            $name = $user['tnfdhId']. '.' . $ext;
            $loc = 'app-assets/images/tasrih/'.$user['tnfdhId'] . '.' . $ext;

            $ppn = [
                'tasrih' => $loc,
                'mulahadha' => null,
            ];
            // dd($ppn);

            // dd($notf != null);
            if ($notf != null) {
                foreach ($notf as $value) {
                    $notfy->delete($value['id']);
                }
            }

            $img->move('app-assets/images/tasrih/', $name);
            $umrah->update($id, $ppn);

            return redirect()->to('umrah')->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
        }
    }

    public function loc($id)
    {
        helper('form');

        $umrah = new Tanfidh();

        $data['umrah'] = $umrah->find($id);
        $data['title'] = lang('app.'.$this->request->getVar('locType'));
        // dd($data);

        return view('umrah/loc',$data);
    }

    public function miqat($id)
    {
        // dd($this->request->getVar());
        $umrah = new Tanfidh();
        $mash =  new Mashruu();

        $umr = $umrah->find($id);
        $data = [
            'miqatLat' => $this->request->getVar('miqatLat'),
            'miqatLong' => $this->request->getVar('miqatLong')
        ];
        // dd($data);
        $umrah->update($id, $data);
        
        $data2 = [
            'miqatLat' => $this->request->getVar('miqatLat'),
            'miqatLong' => $this->request->getVar('miqatLong')
        ];
        // dd($data);
        $ok = $mash->update($umr['mashruuId'], $data2);

        if ($ok) {
            return redirect()->to('umrah')->with('type', 'success')->with('text', lang('app.locSentMiqat'))->with('title', lang('app.success'));
        } else {
            return redirect()->to('umrah')->with('type', 'error')->with('text', lang('app.error'))->with('title', lang('app.sorry'));
        }
    }

    public function makkah($id)
    {
        // dd($this->request->getVar());
        $umrah = new Tanfidh();
        $mash = new Mashruu();
        $usr = new User();
        $jamia = new University();
        $ntn = new Country();
        $bnk = new Bank();
        $dt = new Data();

        $umr = $umrah->find($id);
        $data = [
            'makkahLat' => $this->request->getVar('makkahLat'),
            'makkahLong' => $this->request->getVar('makkahLong'),
            'tnfdhStatus' => 'done',
        ];
        // dd($data);
        $umrah->update($id, $data);
        
        $data2 = [
            'makkahLat' => $this->request->getVar('makkahLat'),
            'makkahLong' => $this->request->getVar('makkahLong'),
        ];
        // dd($data);
        $mash->update($umr['mashruuId'], $data2);

        $u = $umrah->find($id);
        $user = $usr->find($u['userId']);
        $data1 = [
            'name' => $user['name'],
            'userId' => $u['userId'],
            'iqama' => $user['iqama'],
            'phone' => $user['phone'],
            'jamia' => $jamia->find($user['jamia'])['uni_name'],
            'nation' => $ntn->where('country_code', $user['nationality'])->first()['country_arName'] ,
            'iban' => $user['iban'],
            'bank' => $bnk->find($user['bank'])['bankName']. ' - '.$bnk->find($user['bank'])['bankShort'],
            'mushrif' => $usr->find($user['mushrif'])['name'],
            'ism' => $u['tnfdhName'],
            'sabab' => $u['tnfdhSabab'],
            'amount' => $u['tanfdhAmount'],
            'miqatLat' => $u['miqatLat'],
            'miqatLong' => $u['miqatLong'],
            'makkahLat' => $u['makkahLat'],
            'makkahLong' => $u['makkahLong'],
            'date' => $u['tnfdhDate'],
            'malaf' => $user['malaf'],
        ];
        // dd($data1);

        $ok = $dt->insert($data1);

        if ($ok) {
            return redirect()->to('umrah')->with('type', 'success')->with('text', lang('app.locSentMakkah'))->with('title', lang('app.success'));
        } else {
            return redirect()->to('umrah')->with('type', 'error')->with('text', lang('app.error'))->with('title', lang('app.sorry'));
        }
    }
}