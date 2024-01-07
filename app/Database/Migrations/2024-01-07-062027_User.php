<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'bigint',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'mobile' => [
                'type' => 'varchar',
                'constraint' => 20,
                'default' => null,
            ],
            'full_name' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'profile_pic' => [
                'type' => 'varchar',
                'constraint' => 100,
                'default' => 'default.png',
            ],
            'generet_token' => [
                'type' => 'varchar',
                'constraint' => 255,
                'default' => null,
            ],
            'generet_on' => [
                'type' => 'datetime',
                'default' => null,
            ],
            'is_online' => [
                'type' => 'tinyint',
                'constraint' => 4,
                'null' => false,
                'default' => 0,
                'comment' => '0 for no, 1 for yes',
            ],
            'is_block' => [
                'type' => 'tinyint',
                'constraint' => 4,
                'null' => false,
                'default' => 0,
                'comment' => '0 for no, 1 for yes',
            ],
            'is_active' => [
                'type' => 'tinyint',
                'constraint' => 4,
                'null' => false,
                'default' => 1,
                'comment' => '0 for no, 1 for yes',
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

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
