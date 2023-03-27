<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class ReCapture extends BaseConfig
{
    public function verify(string $str, ?String &$error = null)
    {
          $secretkey = env('GOOGLE_RECAPTCHA_SECRETKEY');

          if(($str) && !empty($str)) {

                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretkey."&response=".$str."&remoteip=".$_SERVER['REMOTE_ADDR']);

                $responseData = json_decode($response);
                if($responseData->success) { // Verified
                      return true;
                }
          }

          $error = "Invalid captacha";

          return false;
    }
}
