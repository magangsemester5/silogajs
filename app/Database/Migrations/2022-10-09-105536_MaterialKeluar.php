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
            'no_permintaan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'no_telepon' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'wilayah' => [
                'type' => 'varchar',
                'constraint' => '50'
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
        $this->forge->createTable('material_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('material_keluar');
    }
}