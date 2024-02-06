<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SectionAllocation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'class_id' => [
                'type' => 'int',
                'constraint' => 10,
                'null' => false,
            ],
            'section_id' => [
                'type' => 'int',
                'constraint' => 10,
                'null' => false,
            ],

            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',

            'created_by' => [
                'type' => 'bigint',
                'constraint' => 30,
                'null' => false,
            ],
            'updated_by' => [
                'type' => 'bigint',
                'constraint' => 30,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'datetime',
                'default' => null,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('section_allocation');
    }

    public function down()
    {
        $this->forge->dropTable('section_allocation');
    }
}
