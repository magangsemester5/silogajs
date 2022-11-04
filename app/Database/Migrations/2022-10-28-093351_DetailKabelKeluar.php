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
            'id_kabel_keluar' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'no_drum' => [
                'type' => 'varchar',
                'constraint' => '50',
            ],
            'core' => [
                'type' => 'int',
                'constraint' => '50',
            ],
            'nama_satuan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'panjang' => [
                'type' => 'int',
                'constraint' => '12'
            ]
        ]);

        $this->forge->addPrimaryKey('id_detail_kabel_keluar');
        $this->forge->addForeignKey('id_kabel_keluar', 'kabel_keluar', 'id_kabel_keluar');
        $this->forge->createTable('detail_kabel_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('detail_kabel_keluar');
    }
}