<?php

class Migration_Add_blog  extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(
            array(
               'blog_id' => array( 
                    'type' => 'INT',
                    'constraint'=> '5',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
               ),
               'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'description' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
            )
        );
        $this->dbforge->add_key('blog_id', TRUE);
        $this->dbforge->create_table('blog');
    }

    public function down()
    {
            $this->dbforge->drop_table('blog');
    }
}