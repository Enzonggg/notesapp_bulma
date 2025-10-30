<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function login(): ResponseInterface|string
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('notes'));
        }
        return view('auth/login');
    }

    public function register(): ResponseInterface|string
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('notes'));
        }
        return view('auth/register');
    }
}
