<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KabelKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kabel_keluar' => [
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

        $this->forge->addPrimaryKey('id_kabel_keluar');
        $this->forge->createTable('kabel_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('kabel_keluar');
    }
}