<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PermintaanMaterial extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_permintaan_material' => [
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

        $this->forge->addPrimaryKey('id_permintaan_material');
        $this->forge->addForeignKey('id', 'user', 'id');
        $this->forge->createTable('permintaan_material');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan_material');
    }
}
