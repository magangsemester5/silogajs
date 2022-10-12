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
            'id_kabel' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'id_permintaan_kabel' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'tanggal_keluar' => [
                'type' => 'date'
            ],
            'panjang_keluar' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_penerima' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_kabel_keluar');
        $this->forge->addForeignKey('id_kabel', 'kabel', 'id_kabel');
        $this->forge->addForeignKey('id_permintaan_kabel', 'permintaan_kabel', 'id_permintaan_kabel');
        $this->forge->createTable('kabel_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('kabel_keluar');
    }
}
