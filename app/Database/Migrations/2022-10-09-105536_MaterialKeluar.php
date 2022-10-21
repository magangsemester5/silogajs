<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MaterialKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_material_keluar' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_permintaan_material' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'tanggal_keluar' => [
                'type' => 'date'
            ],
            'foto_penerima' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_material_keluar');
        $this->forge->addForeignKey('id_permintaan_material', 'permintaan_material', 'id_permintaan_material');
        $this->forge->createTable('material_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('material_keluar');
    }
}