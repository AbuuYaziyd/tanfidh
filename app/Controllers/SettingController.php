<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Setting;
use App\Models\Whatsapp;

class SettingController extends BaseController
{
    public function index()
    {
        helper('form');

        $set = new Setting();
        $whats = new Whatsapp();

        $data['title'] = lang('app.settings');
        $data['tasrih'] = $set->where('name', 'tanfidhDate')->findAll();
        $data['count'] = $set->where('name', 'count')->first();
        $data['umra'] = $set->where('name', 'umraNo')->first();
        $data['whats'] = $whats->where('country_code', 'mushrifuna')->first();
        $data['extra'] = $set->where('name', 'tanfidhDate')->orderBy('value', 'desc')->first()['extra'];
        // dd($data);

        return view('settings/index', $data);
    }

    public function add()
    {
        helper('form');

        $data['title'] = lang('app.settings');

        return view('settings/add', $data);
    }

    public function create()
    {
        // dd($this->request->getVar());
        helper('form');

        $set = new Setting();

        $input = $this->validate(
            [   //Rules
                'name' => 'required',
                'value' => 'required',
            ],
            [   // Errors
                'name' => [
                    'required' => lang('error.required'),
                ],
                'value' => [
                    'required' => lang('error.required'),
                ],
            ]
        );
        
        if (!$input) {
            $data['set'] = $set->findAll();
            $data['title'] = lang('app.settings');
            $data['validation'] = $this->validator;
            echo view('settings/add', $data);
        } else {

            $data = [
                'name'     => $this->request->getVar('name'),
                'value'     => $this->request->getVar('value'),
                'info'     => $this->request->getVar('info'),
                'extra'     => $this->request->getVar('extra'),
            ];

            // dd($data); 
            $ok = $set->save($data);

            if ($ok) {
                return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
            }
        }
    }

    public function show($id)
    {
        helper('form');

        $set = new Setting();

        $data['title'] = lang('app.settings');
        $data['set'] = $set->find($id);
        // dd($data);

        return view('settings/show', $data);
    }

    public function edit($id)
    {
        // dd($this->request->getVar());
        $set = new Setting();
        
        $data['title'] = lang('app.settings');
        $data['set'] = $set->find($id);

        $dt = [
            'name' => $this->request->getVar('name'),
            'value' => $this->request->getVar('value'),
            'info' => $this->request->getVar('info'),
            'extra' => $this->request->getVar('extra'),
        ];
        $ok = $set->update($id, $dt);
        // dd($dt);
        
        if ($ok) {
            return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }

    public function delete($id)
    {
        $set = new Setting();
        $ok = $set->find($id);
        // dd($ok);
        $ok = $set->delete($id);

        if ($ok) {
            return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }

    public function studentCount()
    {
        // dd($this->request->getVar());
        $set = new Setting();

        $id = $this->request->getVar('id');
        $data = [
            'value' => $this->request->getVar('stuCount'),
        ];
        // dd($data);

        $ok = $set->update($id, $data);
        
        if ($ok) {
            return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }

    public function tanfidh()
    {
        // dd($this->request->getVar());
        $set = new Setting();

        $id = $this->request->getVar('id');
        $tanfidhDate = $this->request->getVar('tanfidhDate');
        for ($i=0; $i < count($id); $i++) { 
            $data = ['value' => $tanfidhDate[$i]];
            $ok = $set->update($id[$i], $data);
        }
        // dd($id);
        
        if ($ok) {
            return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }

    public function tasrih()
    {
        // dd($this->request->getVar());
        $set = new Setting();

        $date = $this->request->getVar('tasrihDate');
        $tasrih = $set->where('info', 'tasrihDate')->findAll();
        foreach ($tasrih as $dt) {
            $data = ['extra' => $date];
            $ok = $set->update($dt['id'], $data);
        }
        // dd($data);
        
        if ($ok) {
            return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }

    public function umraCount()
    {
        // dd($this->request->getVar());
        $set = new Setting();

        $id = $this->request->getVar('id');
        $data = [
            'value' => $this->request->getVar('umraNo'),
        ];
        // dd($data);

        $ok = $set->update($id, $data);
        
        if ($ok) {
            return redirect()->to('set')->with('type', 'success')->with('text', lang('app.doneSuccess'))->with('title', lang('app.ok'));
        }
    }
}
