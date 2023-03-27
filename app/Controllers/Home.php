<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = lang('app.welcome');
        
        return view('welcome', $data);
    }

    public function test()
    {
        dd('test');
    }

    public function reCaptureGoogle()
    {
          // Validation
          $input = $this->validate([
               'name' => 'required',
               'email' => 'required',
               'subject' => 'required',
               'message' => 'required',
               'g-reCaptcha' => 'required|verifyrecaptcha',
            ],[
               'g-reCaptcha' => [
               'required' => 'Please verify captcha',
            ],
          ]);

          if (!$input) { // Not valid

               $data['validation'] = $this->validator;

               return redirect()->back()->withInput()->with('validation', $this->validator);

          }else{ 
               // Set Session
               session()->setFlashdata('message', 'Submitted Successfully!');
               session()->setFlashdata('alert-class', 'alert-success');

          }
          return redirect()->route('/');

    }
}