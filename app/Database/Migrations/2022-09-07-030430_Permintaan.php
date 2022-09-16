<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permintaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_permintaan' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'id_barang' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'no_permintaan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'jumlah_permintaan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'wilayah' => [
                'type' => 'int',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_permintaan');
        $this->forge->addForeignKey('id_barang', 'barang', 'id_barang');
        $this->forge->createTable('permintaan');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan');
    }
}
