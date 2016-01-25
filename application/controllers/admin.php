<?php
	class Admin extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->model('admin_model');
		}
		public function index()
		{

			$this->loadView('about of notes','about','about/index');
		}
		public function food($id=false){
			$data["type"] = "add";
			if($id){

				$data = $this->admin_model->get_matchedfood($id);
				$data["type"] = "editor";
			}
			//return var_dump($data);

			$this->loadView('food of notes','food','admin/upfood',$data);
		}
		public function footUp($id=false){
			$data = $this->admin_model->set_matchedfood($id);
			if($data){
				$this->result_jsonCode('添加成功！',true);
			}else {
				$this->result_jsonCode('添加失败！',false);
			}
		}
	}