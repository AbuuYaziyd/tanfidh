<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Whatsapp;

class WhatsappController extends BaseController
{
    public function index()
    {
        $whats = new Whatsapp();
        $usr = new User();
        
        $user = $usr->find(session('id'));
        $data = [
            'jamia_id' => $user['jamia'],
            'mushrif_id' => $user['id'],
            'country_code' => $user['nationality'],
        ];
        // dd($data);

        $ok = $whats->save($data);
        if ($ok) {
            return redirect()->back()->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.groupDone'));
        } else {
            return redirect()->back()->with('type', 'error')->with('title', lang('app.done'))->with('text', lang('app.errorOccured'));
        }
    }

    public function edit($id)
    {
        // dd($this->request->getVar());
        $whats = new Whatsapp();

        $data = [
            'link' => $this->request->getVar('link'),
        ];
        // dd($data);

        $ok = $whats->update($id, $data);
        if ($ok) {
            return redirect()->back()->with('type', 'success')->with('title', lang('app.done'))->with('text', lang('app.doneSuccess'));
        } else {
            return redirect()->back()->with('type', 'error')->with('title', lang('app.done'))->with('text', lang('app.errorOccured'));
        }
    }
}
