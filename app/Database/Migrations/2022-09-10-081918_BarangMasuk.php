<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang_masuk' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_barang' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'kode_barang_masuk' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'qty' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_pengantaran_paket' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_barang_masuk');
        $this->forge->addForeignKey('id_barang', 'barang', 'id_barang');
        $this->forge->createTable('barang_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}
