<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombres'   => 'Jhon',
                'apellidos' => 'Francia Minaya',
                'avatar'    => 'admin.jpg',
                'username'  => 'JhonAdmin',
                'userpass'  => password_hash('Holaquehace123*', PASSWORD_DEFAULT),
                'rol'       => 'ADMIN',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nombres'   => 'Dante',
                'apellidos' => 'Luque Zelada',
                'avatar'    => null,
                'username'  => 'Danlukae',
                'userpass'  => password_hash('Holaquehace123*', PASSWORD_DEFAULT),
                'rol'       => 'USER',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('usuarios')->insertBatch($data);
    }
}
