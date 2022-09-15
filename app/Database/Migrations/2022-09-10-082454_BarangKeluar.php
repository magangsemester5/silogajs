<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang_keluar' => [
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
            'kode_barang_keluar' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'jumlah_keluar' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'foto_pengambilan_barang' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_barang_keluar');
        $this->forge->addForeignKey('id_barang', 'barang', 'id_barang');
        $this->forge->createTable('barang_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('barang_keluar');
    }
}
