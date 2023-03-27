<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bank;
use App\Models\Country;
use App\Models\Data;
use App\Models\Hits;
use App\Models\Image;
use App\Models\Setting;
use App\Models\Umrah;
use App\Models\University;
use App\Models\User;
use App\Models\Whatsapp;

class UserController extends BaseController
{
    public function index()
    {
        helper('form');

        $user = new User();
        $set = new Setting();
        $dt = new Data();
        $img = new Image();
        $umrah = new Umrah();

        $data['user'] = $user->where('status', 'active')->countAllResults();
        $data['mandub'] = $user->where('role', 'mandub')->countAllResults();
        $data['umra'] = $umrah->where('userId', session('id'))->first();
        $data['jamia'] = $user->groupBy('jamia')->countAllResults();
        $data['nation'] = $user->groupBy('nationality')->countAllResults();
        $data['bank'] = $user->groupBy('bank')->countAllResults();
        $data['set'] = $set->where(['info' => 'tasrihDate', 'extra>=' => date('Y-m-d')])->first();
        $data['title'] = lang('app.dashboard');
        $data['all'] = $dt->where(['userId' => session('id')])->findAll();
        $data['month'] = $dt->where(['month(created_at)' => date('m'), 'userId' => session('id')])->findAll();

        $role = $user->find(session('id'));
        $auth = password_verify('1234567890', $role['password']);
        $image = $img->where('userId', session('id'))->first();
        // dd($data);

        if (!$auth) {
            if ($role['role'] == 'superuser') {
                return redirect()->to('admin');
            }elseif ($role['role'] == 'admin') {
                return redirect()->to('admin');
            }else {
                if(!$image) {
                    // dd(!$image);
                    return redirect()->to('image');
                } elseif ($image['imgIqama']==null || $image['imgStu']==null || $image['imgIban']==null) {
                    // dd($image);
                    return redirect()->to('image');
                } else {
                    if ($role['role'] == 'mushrif') {
                        return redirect()->to('mushrif');
                    } else {
                        return view('user/index', $data);
                    }
                }
            }
        } else {
            return redirect()->to('change/password');
            // dd($auth);
        }
        
    }

    public function show($id)
    {
        $user = new User();
        $whats = new Whatsapp();
        $nat = new Country();
        $uni = new University();

        $data['title'] = lang('app.profile');
        if (session('role') != 'admin') {
            $data['user'] = $user->join('banks', 'banks.bankId=users.bank')
                                ->join('universities u', 'u.uni_id=users.jamia')
                                ->join('countries n', 'n.country_code=users.nationality')
                                ->find($id);
            $data['mushrif'] = $user->find($data['user']['mushrif']);
        } else {
            $data['user'] = $user->join('banks', 'banks.bankId=users.bank')
                                ->join('countries n', 'n.country_code=users.nationality')
                                ->find($id);
        }
        $data['whats'] = $whats->where(['country_code' => $data['user']['nationality'], 'jamia_id' => $data['user']['jamia']])->first();
        $data['nat'] = $nat->findAll();
        $data['uni'] = $uni->findAll();
        // dd($data);

        if (session('role') != 'admin') {
            return view('user/profile', $data);
        } else {
            return view('admin/profile', $data);
        } 
    }

    public function edit($id)
    {
        helper('form');

        $user = new User();
        $bank = new Bank();
        $nat = new Country();
        $uni = new University();

        $data['title'] = lang('app.profile');
        if (session('role') != 'admin') {
            $data['user'] = $user->join('banks', 'banks.bankId=users.bank')
                                ->join('universities u', 'u.uni_id=users.jamia')
                                ->join('countries n', 'n.country_code=users.nationality')
                                ->find($id);
        } else {
            $data['user'] = $user->join('banks', 'banks.bankId=users.bank')
                                ->join('countries n', 'n.country_code=users.nationality')
                                ->find($id);
        }
        $data['bank'] = $bank->findAll();
        $data['nat'] = $nat->findAll();
        $data['uni'] = $uni->findAll();
        // dd($data);

        if (session('role') != 'admin') {
            return view('user/edit', $data);
        } else {
            return view('admin/edit', $data);
        } 
    }

    public function update($id)
    {
        $email = $this->request->getVar('email');
        $user = new User();

        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $email!=null?$email: null,
            'phone' => $this->request->getVar('phone'),
            'bitaqa' => $this->request->getVar('bitaqa'),
            'iqama' => $this->request->getVar('iqama'),
            'passport' => strtoupper($this->request->getVar('passport')),
            'bank' => strtoupper($this->request->getVar('bank')),
            'iban' => strtoupper($this->request->getVar('iban')),
        ];

        // dd($data);
        $ok = $user->update($id, $data);
        if (!$ok) {
            return redirect()->to('user/edit/'.$id)->with('type', 'error')->with('title', lang('app.sorry'))->with('text', lang('app.errorOccured'));
        } else {
            return redirect()->to('user/profile/'.$id)->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.edit').' '. lang('app.profile'));
        }
    }
    
    public function editMushrif($id)
    {
        // dd($this->request->getVar());
        $nat = $this->request->getVar('nationality');
        $jam = $this->request->getVar('jamia');

        $user = new User();
        $nt = new Country();

        $country = $nt->where('country_code', $nat)->first();
        // dd($country);
        
        $mushrif = $user->where(['jamia' => $jam, 'nationality' =>$nat])->first();
        // dd($mushrif);
        if (!isset($mushrif)) {
            return redirect()->back()->with('type', 'info')->with('title', lang('app.sorry'))->with('text', lang('app.mushrifNotFound'));
        }else {
            $dt = [
                'jamia' => $this->request->getVar('jamia'),
                'nationality' => $this->request->getVar('nationality'),
                'mushrif' => $mushrif['id'],
            ];
            // dd($dt);
            
            $ok = $user->update($id, $dt);
            
            if (!$ok) {
                return redirect()->to('user/edit/'.$id)->with('type', 'error')->with('title', lang('app.sorry'))->with('text', lang('app.errorOccured'));
            } else {
                return redirect()->to('user/profile/'.$id)->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.done').' '. lang('app.addMushrf').' '.$country['country_arName']);
            }
        }
    }
}
