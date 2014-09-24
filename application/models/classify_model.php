<?php
class Classify_model extends MY_Model {
	public function __construct()
	{
	    $this->load->database();   
	}
	public function getClassify($id=FALSE){
		if($id){
			$query = $this->db->get_where('classify', array('id' => $id));
	  		return $query->row_array();
		}else{
			$query = $this->db->get('classify');
	    	return $query->result_array();
		}
	}
}