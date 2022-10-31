<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailMaterialKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_material_keluar' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_material_keluar' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'nama_material' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'nama_satuan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'jumlah' => [
                'type' => 'int',
                'constraint' => '12'
            ]
        ]);

        $this->forge->addPrimaryKey('id_detail_material_keluar');
        $this->forge->addForeignKey('id_material_keluar', 'material_keluar', 'id_material_keluar');
        $this->forge->createTable('detail_material_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('detail_material_keluar');
    }
}