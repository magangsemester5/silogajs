<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang' => [
                'type' => 'int',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'kategori_id' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'satuan_id' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'kode_barang' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'nama_barang' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'stok' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'satuan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);
        $this->forge->addKey('id_barang');
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id_kategori');
        $this->forge->addForeignKey('satuan_id', 'satuan', 'id_satuan');
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
