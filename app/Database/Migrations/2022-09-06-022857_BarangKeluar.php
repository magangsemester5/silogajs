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
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_material' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'barang_id' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'qty' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'serial_number' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_serial_number' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_pengambilan_paket' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);
 
        $this->forge->addPrimaryKey('id_barang_keluar');
        $this->forge->addForeignKey('barang_id', 'barang', 'id_barang');
        $this->forge->createTable('barang_keluar');
    }
 
    public function down()
    {
        $this->forge->dropTable('barang_keluar');
    }
}
