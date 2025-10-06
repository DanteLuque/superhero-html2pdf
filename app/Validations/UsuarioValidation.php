<?php

namespace App\Validations;

class UsuarioValidation
{
    public array $usuario = [
        'nombres'    => 'required|trim|min_length[2]',
        'apellidos'  => 'required|trim|min_length[2]',
        'avatar'     => 'permit_empty|is_image[avatar]|max_size[avatar,2048]|ext_in[avatar,jpg,jpeg,png]',
        'username'   => 'required|trim|is_unique_soft[usuarios.username]|min_length[4]|max_length[70]',
        'rol'        => 'required|in_list[ADMIN,USER]',
        'userpass'   => 'required|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/]',
    ];

    public array $usuario_errors = [
        'nombres' => [
            'required' => 'El nombre es obligatorio',
            'min_length' => 'El nombre debe tener mínimo 2 caracteres',
        ],
        'apellidos' => [
            'required' => 'El apellido es obligatorio',
            'min_length' => 'El apellido debe tener mínimo 2 caracteres',
        ],
        'avatar' => [
            'is_image'  => 'El archivo debe ser una imagen válida',
            'max_size'  => 'La imagen no puede superar los 2MB',
            'ext_in'    => 'Solo se permiten imágenes JPG y PNG',
        ],
        'username' => [
            'required' => 'El usuario es obligatorio',
            'is_unique_soft' => 'Este nombre de usuario ya está registrado',
            'min_length' => 'El usuario debe tener mínimo 4 caracteres',
            'max_length' => 'El usuario no puede superar 70 caracteres',
        ],
        'rol' => [
            'required' => 'Debe seleccionar un rol',
            'in_list' => 'El rol seleccionado no es válido',
        ],
        'userpass' => [
            'required' => 'Debe ingresar una contraseña',
            'regex_match' => 'La contraseña debe tener al menos una mayúscula, un número y un carácter especial',
        ],
    ];
}