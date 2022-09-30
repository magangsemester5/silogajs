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
            'id_material' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'id_satuan' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'id' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'tanggal_keluar' => [
                'type' => 'date'
            ],
            'jumlah_keluar' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'foto_penerima' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_material_keluar');
        $this->forge->addForeignKey('id_material', 'material', 'id_material');
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id_satuan');
        $this->forge->addForeignKey('id', 'user', 'id');
        $this->forge->createTable('material_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('material_keluar');
    }
}
