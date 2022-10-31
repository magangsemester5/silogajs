<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailKabelKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_kabel_keluar' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_permintaan_kabel' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'id_kabel' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'panjang' => [
                'type' => 'int',
                'constraint' => '12'
            ]
        ]);

        $this->forge->addPrimaryKey('id_detail_kabel_keluar');
        $this->forge->addForeignKey('id_permintaan_kabel', 'permintaan_kabel', 'id_permintaan_kabel');
        $this->forge->addForeignKey('id_kabel', 'kabel', 'id_kabel');
        $this->forge->createTable('detail_kabel_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('detail_kabel_keluar');
    }
}