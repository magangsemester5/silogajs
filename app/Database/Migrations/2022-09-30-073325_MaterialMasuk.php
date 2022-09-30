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
        $this->forge->addForeignKey('id_material', 'material', 'id_material');
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id_satuan');
        $this->forge->createTable('material_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('material_masuk');
    }
}
