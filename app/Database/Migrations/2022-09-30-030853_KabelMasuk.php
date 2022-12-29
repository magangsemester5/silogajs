<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KabelMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kabel_masuk' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'tanggal_masuk' => [
                'type' => 'date'
            ],
            'no_delivery_order' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'no_hasbell' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'core' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'nama_satuan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'gudang' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'panjang_masuk' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'merek' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_penerima' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_kabel_masuk');
        $this->forge->createTable('kabel_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('kabel_masuk');
    }
}