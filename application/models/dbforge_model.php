<?php
	class Dbforge_model extends CI_Model {
		public function __construct()
		{
		    $this->load->dbforge();
		}
		public function create_fields()
		{
			$fields = array(
                'note_users' => array(
                        'is_open' => 'int',
                        'constraint' => '3',
                )
            );
            var_dump($this->dbforge->add_field($fields));

		}
	}
?>