<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HistoryPermintaanKabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_history_permintaan_kabel' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'req_id' => [
                'type' => 'int',
                'constraint' => '12'
            ],
            'no_permintaan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'tanggal' => [
                'type' => 'date',
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'wilayah' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'no_telepon' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'no_drum' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'core' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'panjang' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_satuan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'status' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_history_permintaan_kabel');
        $this->forge->createTable('history_permintaan_kabel');
    }

    public function down()
    {
        $this->forge->dropTable('history_permintaan_kabel');
    }
}