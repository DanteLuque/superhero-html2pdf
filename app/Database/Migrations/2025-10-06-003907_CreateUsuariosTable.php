<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'auto_increment' => true,
                'unsigned'       => true
            ],
            'nombres' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'apellidos' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'avatar' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 70,
            ],
            'userpass' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'rol' => [
                'type'       => 'ENUM',
                'constraint' => ['ADMIN', 'USER'],
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
