<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'jabatan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'id_user' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'kriteria' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_user' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'wilayah' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'no_telepon' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);
 
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('user');
    }
 
    public function down()
    {
        $this->forge->dropTable('user');
    }
}