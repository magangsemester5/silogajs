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
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'no_permintaan' => [
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
            'wilayah' => [
                'type' => 'int',
                'constraint' => '50'
            ]
        ]);
 
        $this->forge->addPrimaryKey('id_permintaan');
        $this->forge->addForeignKey('barang_id', 'barang', 'id_barang');
        $this->forge->createTable('permintaan');
    }
 
    public function down()
    {
        $this->forge->dropTable('permintaan');
    }
}
