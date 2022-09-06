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
            'foto_pengantaran_paket' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);
 
        $this->forge->addPrimaryKey('id_barang_masuk');
        $this->forge->addForeignKey('barang_id', 'barang', 'id_barang');
        $this->forge->createTable('barang_masuk');
    }
 
    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}
