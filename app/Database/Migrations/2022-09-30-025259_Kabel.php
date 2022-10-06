<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kabel' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_satuan' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
            ],
            'no_drum' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'core' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'panjang' => [
                'type' => 'int',
                'constraint' => '50'
            ],
            'serial_number' => [
                'type' => 'varchar',
                'constraint' => '50'
            ],
            'foto_serial_number' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);
        $this->forge->addPrimaryKey('id_kabel');
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id_satuan');
        $this->forge->createTable('kabel');
    }

    public function down()
    {
        $this->forge->dropTable('kabel');
    }
}
