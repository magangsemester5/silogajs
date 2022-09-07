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
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_kategori' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'id_satuan' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
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
        $this->forge->addPrimaryKey('id_barang');
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id_kategori');
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id_satuan');
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
