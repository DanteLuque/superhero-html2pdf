<?php

namespace App\Controllers;

use App\Models\Usuario;

class AuthController extends BaseController
{
    public function login(): string
    {
        return view('auth/login');
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function doLogin()
    {
        $usuarioModel = new Usuario();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('userpass');

        $usuario = $usuarioModel->obtenerPorUsername($username);
        if (!$usuario) return redirect()->back()->withInput()->with('error', 'Usuario no encontrado');

        if (!password_verify($password, $usuario['userpass'])) {
            return redirect()->back()->withInput()->with('error', 'Contraseña incorrecta');
        }

        $session = session();
        $session->set([
            'user' => [
                'id'         => $usuario['id'],
                'nombres'    => $usuario['nombres'],
                'username'   => $usuario['username'],
                'avatar'    => $usuario['avatar'],
                'rol'        => $usuario['rol'],
            ],
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/')->with('success', 'Bienvenido ' . esc($usuario['nombres']));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Sesión cerrada correctamente');
    }
}
