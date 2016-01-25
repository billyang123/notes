<?php
	class Extra extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->model('ipc_model');
		  	$this->load->library('session');
		}
		public function index($id)
		{
			
			if(!isset($id)) return;
			$this->load->view('extra/myrecord');
			
		}
		public function resume($cid){
			switch ($cid) {
				case '1':
					$this->load->view('extra/myrecord');
					break;			
				default:
					$this->load->view('404');
					break;
			}
		}
		public function demo(){
			$this->load->view('demo/header');
		}
		public function mylife($str){
			$this->checkLogin();
			$data["user"] = $this->get_currentUser();
			$data['assets'] = $this->assets;
			//var_dump($user);
			//exit(0);
			switch ($str) {
				case 'wedding':
					$result = $this->ipc_model->get_json(1);
					//$data['result'] = 
					$data['result'] = json_decode($result['value'],true);
				// $data['userId'] = $result['userId'];
				// $data['id'] = $id;
				// var_dump($result['value']);
				//var_dump(json_decode($result['value']));exit(0);
				// $data['result']['value'] = json_decode($data['result']['value']);
					//$this->result_jsonCode(json_decode($result['value']));
					//$result = $this->ipc_model->get_json(3);
					//var_dump($data['result']['homeImg']);exit(0);
					//$this->result_jsonCode($data);exit(0);
					$this->load->view('extra/wedding',$data);

					break;			
				default:
					$this->load->view('404');
					break;
			}
		}

	}