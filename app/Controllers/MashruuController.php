<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bank;
use App\Models\Data;
use App\Models\Image;
use App\Models\Mashruu;
use App\Models\Notify;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\User;

class MashruuController extends BaseController
{
    public function index()
    {
        helper('form');

        $umr = new Tanfidh();

        $data['title'] = lang('app.tanfidh');
        
        $data['all'] = $umr->where('tnfdhStatus', 0)->join('users u', 'u.id=tanfidh.userId')
                        ->join('banks b', 'b.bankId=tanfidh.bank')
                        ->findAll();
        $data['ready'] = $umr->where('tnfdhStatus', 1)->join('users u', 'u.id=tanfidh.userId')
                        ->join('banks b', 'b.bankId=tanfidh.bank')
                        ->findAll();
        $data['tanfidh'] = $umr->where('tnfdhStatus', '0')->countAllResults();
        $data['delete'] = $umr->where('tnfdhStatus', 'done')->countAllResults() == $umr->countAllResults();
        // dd($data);

        return view('mashruu/index', $data);
    }

    public function create()
    {
        // dd($this->request->getFiles());
        $validationRule = $this->validate(
            [
                'csv' => 'uploaded[csv]|ext_in[csv,csv,xlsx]',
            ],
            [   // Errors
                'csv' => [
                    'uploaded' => lang('error.uploaded'),
                    'ext_in' => lang('error.extension'),
                ],
            ]);
        // dd($this->validator->getErrors());
        if (!$validationRule) {
            $data = ['errors' => $this->validator->getErrors()];

            helper('form');
            $data['title'] = lang('app.tanfidh');
            return view('mashruu/index', $data);
        }else{
            if($file = $this->request->getFile('csv')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('public/files', $newName);
                $file = fopen("public/files/".$newName,"r");
                $i = 0;
                $numberOfFields = 2;
                $csvArr = array();
                // dd(fgetcsv($file, 1000, ","));
                
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    if($i > 0 && $num == $numberOfFields){ 
                        $csvArr[$i]['ism'] = $filedata[0];
                        $csvArr[$i]['sabab'] = $filedata[1];
                    }
                    $i++;
                }
                fclose($file);
                // dd($csvArr);
                $count = 0;
                foreach($csvArr as $userdata){
                    $usr = new Mashruu();
                        if($usr->insert($userdata)){
                            $count++;
                        }
                }
                // dd(file_exists('public/files/'. $newName));
                unlink('public/files/'. $newName);
                // dd($count);
                return redirect()->to('tanfidh')->with('type', 'success')->with('text',  $count.' - تنفيذ مستورد ')->with('title', lang('app.success'));
            }
            else{
                session()->setFlashdata('message', 'CSV file coud not be imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            }else{
            session()->setFlashdata('message', 'CSV file coud not be imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
    }

    public function connect()
    {
        $umr = new Tanfidh();
        $mash = new Mashruu();

        $tanfidh = $umr->where('tnfdhStatus', '0')->join('users u', 'u.id=tanfidh.userId')->findAll();
        $swah = $mash->where('status', null)->findAll();
        // dd($swah);
        foreach ($swah as $key => $dt) {
            if (count($tanfidh)>$key) {
                $data = [
                    'status' => 1,
                    'userId' => $tanfidh[$key]['id'],
                    'amount' => 250,//($tanfidh[$key]['role']=='mushrif'?350:250),
                    'date' => date("Y-m-d", strtotime($tanfidh[$key]['tnfdhDate'])),
                    'bank' => $tanfidh[$key]['bank'],
                    'mushrif' => $tanfidh[$key]['mushrif'],
                    'nation' => $tanfidh[$key]['nationality'],
                    'userId' => $tanfidh[$key]['id'],
                    'malaf' => $tanfidh[$key]['malaf'],
                    'phone' => $tanfidh[$key]['phone'],
                    'jamia' => $tanfidh[$key]['jamia'],
                    'iban' => $tanfidh[$key]['iban'],
                ];
                $mash->update($dt['id'], $data);
                $data2 = [
                    'tnfdhStatus' => 'sent',
                    'tnfdhName' => $dt['ism'],
                    'tnfdhSabab' => $dt['sabab'],
                    'tnfdhId' => $tanfidh[$key]['tnfdhId'],
                    'mashruuId' => $dt['id'],
                    'tanfdhAmount' => 250,//($tanfidh[$key]['role']=='mushrif'?350:250),
                ];
                $umr->update($tanfidh[$key]['tnfdhId'], $data2);
            }
        }
        // dd($tanfidh);
        
        return redirect()->back()->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.success'));
    }

    public function delete()
    {
        helper('filesystem');

        $tan = new Tanfidh();
        $notify = new Notify();
        $set = new Setting();
        $usr = new User();
        $bnk = new Bank();
        $data = new Data();

        $dt = $tan->findAll();
        // dd($dt);
        foreach ($dt as $d) {
            $user = $usr->find($d['userId']);
            $us = ['umrah' => 'done'];
            $usr->update($d['userId'], $us);
            // dd($user);

            $all = [
                'userId' => $d['userId'],
                'sabab' => $d['tnfdhSabab'],
                'bank' => $bnk->find($d['bank'])['bankName'],
                'mushrif' => $d['mushrif'],
                'malaf' => $d['malaf'],
                'date' => date('Y-m-d H:i:s', strtotime($d['tnfdhDate'])),
                'ism' => $d['tnfdhName'],
                'name' => $user['name'],
                'phone' => $user['phone'],
                'iqama' => $user['iqama'],
                'iban' => $user['iban'],
                'code' => $bnk->find($d['bank'])['bankShort'],
            ];
            // dd($all);

            $data->save($all);
        }

        $date = date('dmY', strtotime($set->where('info', 'tasrihDate')->first()['extra']));
        $tasrih = FCPATH .$date.'.zip';

        // dd(file_exists($tasrih));
        // dd(count(directory_map('app-assets/images/tasrih')));

        if (file_exists($tasrih)) {
            unlink($tasrih);
            delete_files('app-assets/images/tasrih', true);
        } elseif (count(directory_map('app-assets/images/tasrih'))>0) {
            delete_files('app-assets/images/tasrih', true);
        }
        
        // dd(count(directory_map('app-assets/images/tasrih')));
        
        $ok = [
            $tan->emptyTable(),
            $tan->query('ALTER TABLE tanfidh AUTO_INCREMENT = 1'),
            $notify->emptyTable(),
            $tan->query('ALTER TABLE notify AUTO_INCREMENT = 1'),
        ];
        
        if ($ok) {
            return redirect()->to('user')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }

    public function tasrih()
    {
        $tanfidh = new Tanfidh();

        $data['tasrih'] = $tanfidh->where('tnfdhStatus', null)
                            ->join('users u', 'u.id=tanfidh.userId')
                            ->findAll();
        $data['title'] = lang('app.tasrih');
        // dd($data);
        
            if (count($data['tasrih'])>=0) {
                return view('mushrif/tasrih', $data);
            } else {
                return redirect()->to('user')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.tasrihActivated'));
            }
    }

    public function download()
    {
        $set = new Setting();
        $user = new User();
         
        $date = date('dmY', strtotime($set->where('info', 'tasrihDate')->first()['extra']));
        // dd($date);
        $source = 'app-assets/images/tasrih';
        $destination = FCPATH.$date;
        $user->zip_creation($source, $destination);

        return $this->response->download(FCPATH . $date.'.zip', null);
    }

    public function done()
    {
        helper('form');

        $tan = new Mashruu();
        $umr = new Tanfidh();

        $data['title'] = lang('app.tanfidh').' '.lang('app.done');
        $data['done'] = $tan
                        ->join('banks b', 'b.bankId=mashruu.bank')
                        ->join('countries c', 'c.country_code=mashruu.nation')
                        ->join('universities v', 'v.uni_id=mashruu.jamia')
                        ->join('users u', 'u.id=mashruu.userId')
                        ->where(['mashruu.status' => 1,'miqatLat!=' => null, 'makkahLat!=' => null])
                        ->findAll();
        // $data['new0'] = $umr
        //                 ->join('users u', 'u.id=tanfidh.userId')
        //                 ->where(['tnfdhStatus' => '0', 'miqatLat' => null])
        //                 ->findAll();
        // $data['start'] = $umr
        //                 ->join('users u', 'u.id=tanfidh.userId')
        //                 ->where(['tnfdhStatus' => 'sent', 'miqatLat!=' => null])
        //                 ->findAll();
        // $data['new1'] = $tan
        //                 ->where('mashruu.status', null)
        //                 ->findAll();
        // $data['tanfidh'] = $umr->where('tnfdhStatus', '0')->countAllResults();
        $data['delete'] = $umr->where('tnfdhStatus', 'done')->countAllResults() == $umr->countAllResults();
        // dd($data);

        return view('mashruu/done', $data);
    }

    public function start()
    {
        helper('form');

        $tan = new Mashruu();
        $umr = new Tanfidh();

        $data['title'] = lang('app.tanfidh').' '.lang('app.start') ;
        $data['start'] = $umr
                        ->join('users u', 'u.id=tanfidh.userId')
                        ->where(['tnfdhStatus' => 'sent', 'miqatLat!=' => null])
                        ->findAll();
        $data['tanfidh'] = $umr->where('tnfdhStatus', '0')->countAllResults();
        $data['delete'] = $umr->where('tnfdhStatus', 'done')->countAllResults() == $umr->countAllResults();
        // dd($data);

        return view('mashruu/started', $data);
    }

    public function show($id)
    {
        // dd($id);
        helper('form');

        $tanfidh = new Tanfidh();

        $data['user'] = $tanfidh->where(['tnfdhStatus' => 0, 'tnfdhId' => $id])
                            ->join('users u', 'u.id=tanfidh.userId')
                            ->join('images', 'u.id=images.userId')
                            ->first();
        $data['title'] = lang('app.tasrih');
        // dd($data);
        
        return view('mashruu/user', $data);
    }

    public function edit($id)
    {
        // dd($this->request->getVar());

        $tan = new Tanfidh();
        $usr = new User();
        $img = new Image();

        $dt = [
          'tnfdhName' => $this->request->getVar('ism'),  
          'tnfdhSabab' => $this->request->getVar('sabab'), 
          'tnfdhStatus' => 1, 
        ];

        $malaf = $this->request->getVar('malaf');
        if ($malaf) {
            $mlf = ['malaf' => $malaf];
            $user_id = $tan->find($id)['userId'];
            // dd($mlf);

            $usr->update($user_id, $mlf);

            $image = $img->where('userId', $user_id)->first();

            // Iqama

            $to = "app-assets/images/malaf/".$malaf."/";
            // dd($to);

            if (!file_exists($to)) {mkdir($to, 0777, true);}

            $iqama = "app-assets/images/malaf/new/".$image['imgIqama'];
            if (file_exists($iqama)) {
                $file = new \CodeIgniter\Files\File($iqama);
                $file->move($to, $image['imgIqama']);
            }
            
            $bitaqa = "app-assets/images/malaf/new/".$image['imgStu'];
            if (file_exists($bitaqa)) {
                $file = new \CodeIgniter\Files\File($bitaqa);
                $file->move($to, $image['imgStu']);
            }
            
            $iban = "app-assets/images/malaf/new/".$image['imgIban'];
            if (file_exists($iban)) {
                $file = new \CodeIgniter\Files\File($iban);
                $file->move($to);
            }
            
            // dd($file);
        }

        $ok = $tan->update($id, $dt);

        if ($ok) {
            return redirect()->to('tanfidh')->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.doneSuccess'));
        } else {
            return redirect()->to('user')->with('type', 'error')->with('title', lang('app.sorry'))->with('text', lang('app.errorOccured'));
        }
    }
}
