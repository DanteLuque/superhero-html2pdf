<?php

namespace App\Models;


class Usuario extends BaseModel
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombres',
        'apellidos',
        'avatar',
        'username',
        'userpass',
        'rol',
    ];

    public function obtenerPorUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function crear(array $data, $imagenFile = null): int
    {
        if ($imagenFile && $imagenFile->isValid() && !$imagenFile->hasMoved()) {
            $newName = $imagenFile->getRandomName();
            $imagenFile->move(FCPATH . 'uploads/', $newName);
            $data['avatar'] = $newName;
        }

        $data['userpass'] = password_hash($data['userpass'], PASSWORD_BCRYPT);
        return $this->insert($data, true);
    }
}
