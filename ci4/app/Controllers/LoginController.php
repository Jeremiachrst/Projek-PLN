<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('Login');
    }
    public function logout()
    {
        $session = session();
        $session->destroy(); // Menghancurkan sesi yang ada
        return redirect()->to(base_url('public/')); // Mengarahkan ke halaman login
    }
}
