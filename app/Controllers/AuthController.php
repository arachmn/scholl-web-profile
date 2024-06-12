<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ProfileModel;

class AuthController extends BaseController
{
    protected $adminModel;
    protected $profileModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        try {
            $data = [
                'profile' => $this->profileModel->getProfile(1)
            ];
            return view('auth/login', $data);
        } catch (\Exception $e) {
            $errorCode = $e->getCode();
            $message = $e->getMessage();

            $data = [
                'errorCode' => $errorCode,
                'message' => $message
            ];

            return view('myError/error', $data);
        }
    }

    public function loginProccess()
    {
        try {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $this->adminModel->where('username', $username)->first();

            if ($user) {
                if ($user['password'] == $password) {
                    session()->set('id_admin', $user['id_admin']);
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/auth')->with('error', 'Periksa username dan password Anda.');
                }
            } else {
                return redirect()->to('/auth')->with('error', 'Periksa username dan password Anda.');
            }
        } catch (\Exception $e) {
            return redirect()->to('/auth')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        session()->remove('id_admin');
        return redirect()->to(site_url('auth'));
    }
}
