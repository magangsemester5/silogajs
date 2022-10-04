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
            'id_kabel' => [
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
            'no_hasbell' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'gudang' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'panjang' => [
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
        $this->forge->addForeignKey('id_kabel', 'kabel', 'id_kabel');
        $this->forge->createTable('kabel_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('kabel_masuk');
    }
}
