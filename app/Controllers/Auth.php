<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    public function register(): RedirectResponse
    {
        $username = (string) $this->request->getPost('username');
        $password = (string) $this->request->getPost('password');
        $confirm  = (string) $this->request->getPost('password_confirm');

        if ($password !== $confirm) {
            return redirect()->back()->withInput()->with('errors', ['password' => 'Passwords do not match.']);
        }

        $userModel = new UserModel();
        $data = [
            'username'      => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        ];

        if (! $userModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $userModel->errors());
        }

    return redirect()->to(site_url('login'))->with('message', 'Account created. You can log in now.');
    }

    public function login(): RedirectResponse
    {
        $username = (string) $this->request->getPost('username');
        $password = (string) $this->request->getPost('password');

    $userModel = new UserModel();
    $user      = $userModel->where('username', $username)->first();

        if (! $user || ! password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('errors', ['login' => 'Invalid username or password.']);
        }

        // Set session
        session()->set([
            'user_id'      => $user['id'],
            'user_username'=> $user['username'],
            'isLoggedIn'   => true,
        ]);

        return redirect()->to(site_url('notes'))->with('message', 'Welcome back!');
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to(site_url('login'))->with('message', 'You have been logged out.');
    }
}
