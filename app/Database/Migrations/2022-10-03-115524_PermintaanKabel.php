<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permintaankabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_permintaan_kabel' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'id' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'no_permintaan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_permintaan_kabel');
        $this->forge->addForeignKey('id', 'user', 'id');
        $this->forge->createTable('permintaan_kabel');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan_kabel');
    }
}
