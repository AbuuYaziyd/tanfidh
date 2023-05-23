<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Image;
use App\Models\User;

class ImageController extends BaseController
{
    public function index()
    {
        helper('form');

        $img = new Image();
        $user = new User();

        $data['img'] = $img->where('userId', $_SESSION['id'])->first();
        $data['user'] = $user->join('universities u', 'u.uni_id=users.jamia')->find(session('id'));
        $data['title'] = lang('app.data');
        // dd($data);

        if (!$data['img']) {
            $insert = [
                'userId' => $_SESSION['id']
            ];
            $img->save($insert);
            $data['img'] = $img->where('userId', $_SESSION['id'])->first();
        }

        // return redirect()->back()->with('type', 'info')->with('text', lang('app.errorOccured'))->with('title', lang('app.sorry'));
        // dd($data);
        return view('image/index', $data);
    }

    public function imgShow($id, $type)
    {
        helper('form');
        
        $img = new Image();
        $user = new User();

        $data['img'] = $img->where('userId', $id)->first();
        $data['user'] = $user->find($id);
        $data['title'] = lang('app.data');
        switch ($type) {
            case 'iqama':
        $data['type'] = 'imgIqama';
                break;
            case 'bitaqa':
        $data['type'] = 'imgStu';
                break;
            case 'iban':
        $data['type'] = 'imgIban';
                break;
        }
        // dd($data);

        if (!$data['img']) {
            $insert = [
                'userId' => $_SESSION['id']
            ];
            $img->save($insert);
        }

        return view('image/edit', $data);
    }

    public function update($id)
    {    
        // dd($this->request->getFile('img'));
        $image = new Image();
        $settingz = new User();
        $nm = $settingz->find($id)['malaf'];
        $upl = $this->request->getVar('select');

        // dd($upl);
        $validationRule = $this->validate(
            [
                'img' => 'uploaded[img]|mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,2048]',
                'select' => 'required',
            ],
            [   // Errors
                'img' => [
                    'uploaded' => lang('error.uploaded'),
                    'mime_in' => lang('error.mime'),
                    'max_size' => lang('error.max_size'),
                ],
                'select' => [
                    'required' => lang('error.required'),
                ],
            ]);
        // dd($validationRule);

        if (!$validationRule) {
            $data = ['errors' => $this->validator->getErrors()];

            helper('form');
            $data['title'] = lang('app.data');
            $data['type'] = $upl;
            $data['user'] = $settingz->find(session('id'));
            $data['img'] = $image->where('userId', $id)->first();
            // dd($data);

            return view('image/edit', $data);
        }

        $pic = $image->where('userId', $id)->first();

        // dd(file_exists('app-assets/images/malaf/'.($nm??'new').'/' . ($pic[$upl]??'img.img')));
            if (file_exists('app-assets/images/malaf/'.($nm??'new').'/' . ($pic[$upl]??'img.img'))) {
                $path = 'app-assets/images/malaf/'.($nm??'new').'/' . $pic[$upl];
                // dd($path);

                unlink($path);

                $img = $this->request->getFile('img');
                $ext = $img->getClientExtension();
                $name = date('ymdHis') . $id . '.' . $ext;

                $ppn = [$upl => $name,];
                // dd($name);

                $img->move('app-assets/images/malaf/'.($nm??'new').'/', $name);
                $image->update($pic['imgId'], $ppn);

                // dd($test);
                return redirect()->to('image')->with('type', 'success')->with('type', lang('app.imageEdited'))->with('title', lang('app.success'));
            } else {
                // dd($this->request->getVar());
                $img = $this->request->getFile('img');
                $ext = $img->getClientExtension();
                $name = date('ymdHis') . $id . '.' . $ext;

                $ppn = [$upl => $name,];

                $img->move('app-assets/images/malaf/'.($nm??'new').'/', $name);
                $image->update($pic['imgId'], $ppn);

                return redirect()->to('image')->with('type', 'success')->with('text', lang('app.imageUploaded'))->with('title', lang('app.success'));
            }
    }
}