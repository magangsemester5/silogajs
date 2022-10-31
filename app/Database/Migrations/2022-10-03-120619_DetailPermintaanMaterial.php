<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPermintaanMaterial extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_permintaan_material' => [
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
            'id_material' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'jumlah' => [
                'type' => 'int',
                'constraint' => '12'
            ],
            'status' => [
                'type' => 'int',
                'constraint' => '12'
            ]
        ]);

        $this->forge->addPrimaryKey('id_detail_permintaan_material');
        $this->forge->addForeignKey('id_permintaan_material', 'permintaan_material', 'id_permintaan_material');
        $this->forge->addForeignKey('id_material', 'material', 'id_material');
        $this->forge->createTable('detail_permintaan_material');
    }

    public function down()
    {
        $this->forge->dropTable('detail_permintaan_material');
    }
}