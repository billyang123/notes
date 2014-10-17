<?php
	class Tags extends MY_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('tags_model');
			$this->load->model('notes_model');
		}
		public function index()
		{
			$data = $this->tags_model->get_tags();
			$this->result_jsonCode($data,true);	
		}
		public function search($key=FALSE)
		{
			
			$data = $this->tags_model->search_tags($key);
			$json = json_encode($data);
			header('Content-type:text/json');
		   	echo $json;
			//$this->result_jsonCode($data,true);		
		}
		public function add()
		{
			$tagName = $this->input->get("tagStr");
			if($tagName){			
				$this->result_jsonCode($this->tags_model->set_tag(explode(',',$tagName)),true);
			}
		}
		
	}