<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MaterialMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_material_masuk' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_material' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_satuan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'tanggal_masuk' => [
                'type' => 'date'
            ],
            'no_delivery_order' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'jumlah_masuk' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'gudang' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_penerima' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_material_masuk');
        $this->forge->createTable('material_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('material_masuk');
    }
}