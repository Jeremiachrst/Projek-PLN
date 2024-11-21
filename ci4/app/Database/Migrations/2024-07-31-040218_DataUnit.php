<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataUnit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID_UNIT' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'CUSTOMER' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'UNIT' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'CATEGORY_CUSTOMER' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'KODE_PUSAT_BIAYA' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'DESKRIPSI_PUSAT_BIAYA' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'JENIS_PEMBANGKIT' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'STATUS' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ]
        ]);
        $this->forge->addKey('ID_UNIT', true);
        $this->forge->createTable('setdataunit');
    }

    public function down()
    {
        $this->forge->dropTable('setdataunit');
    }
}
