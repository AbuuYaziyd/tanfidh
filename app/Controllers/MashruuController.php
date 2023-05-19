<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mashruu;
use App\Models\Notify;
use App\Models\Setting;
use App\Models\Tanfidh;
use App\Models\Umrah;
use App\Models\User;

class MashruuController extends BaseController
{
    public function index()
    {
        helper('form');

        $tan = new Mashruu();
        $umr = new Umrah();

        $data['title'] = lang('app.tanfidh');
        $data['all'] = $tan
                        ->join('banks b', 'b.bankId=mashruu.bank')
                        ->join('universities v', 'v.uni_id=mashruu.jamia')
                        ->join('countries c', 'c.country_code=mashruu.nation')
                        ->join('users u', 'u.id=mashruu.userId')
                        ->findAll();
        $data['done'] = $tan
                        ->where(['mashruu.status' => '1','miqatLat!=' => null, 'makkahLat!=' => null])
                        ->countAllResults();
        $data['wait'] = $umr
                        ->where(['tnfdhStatus' => '0', 'miqatLat' => null])
                        ->countAllResults();
        $data['start'] = $umr
                        ->where(['tnfdhStatus' => 'sent', 'miqatLat!=' => null])
                        ->countAllResults();
        $data['new1'] = $tan
                        ->where('mashruu.status', null)
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
        $umr = new Umrah();
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

        $mash = new Mashruu();
        $tan = new Umrah();
        $notify = new Notify();
        $set = new Setting();

        $date = date('d-m-Y', strtotime($set->where('info', 'tasrihDate')->first()['extra']));
        $tasrih = $date.'.zip';

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
            $mash->emptyTable(),
            $tan->query('ALTER TABLE mashruu AUTO_INCREMENT = 1'),
            $notify->emptyTable(),
            $tan->query('ALTER TABLE notify AUTO_INCREMENT = 1'),
        ];
        
        if ($ok) {
            return redirect()->to('tanfidh')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }

    public function tasrih()
    {
        $tanfidh = new Umrah();
        $user = new User();

        $umrah = $tanfidh->where(['tnfdhStatus' => 1])
                        ->join('users us', 'us.id=tanfidh.userid')
                        ->findAll();
        $umrah = $tanfidh->where(['tnfdhStatus' => 1])->findAll();
        if (count($umrah) > 0) {
            foreach ($umrah as $dt) {
                $ok[] = [
                    'tanfidh' => $tanfidh->find($dt['tnfdhId']),
                    'user' => $user->join('countries c', 'c.country_code=users.nationality')
                            ->join('universities u', 'u.uni_id=users.jamia')
                            ->join('banks', 'banks.bankId=users.bank')
                            ->find($dt['userId']),
                ];
            }
        } else {
            $ok = [];
        }

        $data['title'] = lang('app.tasrihs');
        $data['umrah'] = $ok;
        $data['tasrih'] = $tanfidh->join('users s', 's.id=tanfidh.userId')
                            ->join('countries c', 'c.country_code=s.nationality')
                            ->join('universities u', 'u.uni_id=s.jamia')
                            ->where(['tnfdhStatus'=>0, 'tasrih!='=>null])
                            ->findAll();
        // dd($data);

        if (session('role') != 'user') {
            return view('mashruu/tasrih', $data);
        } else {
            return redirect()->to('user');
        } 
    }

    public function download($dt)
    {
        $set = new Setting();
        $user = new User();
         
        $date = $dt. date(' d-m-Y', strtotime($set->where('info', 'tasrihDate')->first()['extra']));
        // dd($date);
        $source = 'app-assets/images/tasrih';
        $destination = FCPATH.$date;
        $user->zip_creation($source, $destination);

        return $this->response->download(FCPATH . $date.'.zip', null);
        // dont forget to delete the file!
    }

    public function done()
    {
        helper('form');

        $tan = new Mashruu();
        $umr = new Umrah();

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
        $umr = new Umrah();

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
}
