<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'user_last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'user_phone_number' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                        ),
                        'user_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'user_password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '32',
                        ),
                        
                ));
                $this->dbforge->add_key('user_id', TRUE);
                $this->dbforge->create_table('user');
        }

        public function down()
        {
                $this->dbforge->drop_table('user');
        }
}