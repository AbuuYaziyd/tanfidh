<?php

namespace App\Filters;

use App\Models\User;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Mushrif implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = new User();
        $auth = $user->find(session('id'));
        
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login');
        }
        
        if ($auth['role'] == 'user') {
            return redirect()->to('user');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
