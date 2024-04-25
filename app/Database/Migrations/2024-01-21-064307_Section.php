<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Section extends Migration
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
            'section_name' => [
                'type' => 'varchar',
                'constraint' => 100,
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

        $this->forge->addUniqueKey('section_name');

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('section');
    }

    public function down()
    {
        $this->forge->dropTable('section');
    }
}
