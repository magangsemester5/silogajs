<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Satuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_satuan' => [
                'type' => 'int',
                'constraint' => '12',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_satuan' => [
                'type' => 'varchar',
                'constraint' => '50'
            ]
        ]);
        $this->forge->addPrimaryKey('id_satuan');
        $this->forge->createTable('satuan');
    }

    public function down()
    {
        $this->forge->dropTable('satuan');
    }
}
