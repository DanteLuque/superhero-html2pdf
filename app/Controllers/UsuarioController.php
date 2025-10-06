<?php

namespace App\Controllers;

use App\Models\Usuario;

class UsuarioController extends BaseController
{
    public function saveDB()
    {
        helper('validation');
        $errors = runValidation('usuario', $this->request);
        if (!empty($errors)) return redirect()->back()->withInput()->with('errors', $errors);

        try {
            $usuarioModel = new Usuario();

            $imagenFile = $this->request->getFile('avatar');
            $usuarioId = $usuarioModel->crear([
                'nombres'   => $this->request->getPost('nombres'),
                'apellidos' => $this->request->getPost('apellidos'),
                'username'  => $this->request->getPost('username'),
                'userpass'  => $this->request->getPost('userpass'),
                'rol'       => $this->request->getPost('rol'),
            ], $imagenFile);

            if (!$usuarioId) throw new \Exception("Error al crear usuario");

            return redirect()->to('/auth/login')->with('success', 'Cliente registrado con éxito');
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', 'Hubo un error: ' . $e->getMessage());
        }
    }
}
