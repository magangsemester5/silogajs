<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Material extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_material' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_satuan' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'nama_material' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'stok' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'serial_number' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_serial_number' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);
        $this->forge->addPrimaryKey('id_material');
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id_satuan');
        $this->forge->createTable('material');
    }

    public function down()
    {
        $this->forge->dropTable('material');
    }
}
