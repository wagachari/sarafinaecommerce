<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_friend extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'friend_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'friend_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'friend_age' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                        ),
                        'friend_gender' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                    ),
                        'friend_hobby' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                    ),
                    //     'created' => array(
                    //         'type' => 'TIMESTAMP',
                    //         'default'=>"CURRENT_TIMESTAMP"
                    // ),
                ));
                $this->dbforge->add_key('friend_id', TRUE);
                $this->dbforge->create_table('friend');
        }

        public function down()
        {
                $this->dbforge->drop_table('friend');
        }
}