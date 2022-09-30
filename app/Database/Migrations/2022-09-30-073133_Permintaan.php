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
            'id_material' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE
            ],
            'id_kabel' => [
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
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'status' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);

        $this->forge->addPrimaryKey('id_permintaan');
        $this->forge->addForeignKey('id_material', 'material', 'id_material');
        $this->forge->addForeignKey('id_kabel', 'kabel', 'id_kabel');
        $this->forge->createTable('permintaan');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan');
    }
}
