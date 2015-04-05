<?php
	class Ipc extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->model('ipc_model');
		  	$this->load->library('session');
		}
		public function reset()
		{
			$this->ipc_model->reset();
		}
		public function index($id=FALSE)
		{
			$data['assets'] = $this->assets;
			if($id){
				$result = $this->ipc_model->get_json($id);
				$data['value'] = $result['value'];
				// $data['userId'] = $result['userId'];
				// $data['id'] = $id;
				// var_dump($result['value']);
				//var_dump(json_decode($result['value']));exit(0);
				// $data['result']['value'] = json_decode($data['result']['value']);
				$this->result_jsonCode(json_decode($result['value']));
			}else{
				$data['result'] = $this->ipc_model->get_json();
				$this->loadView('ipc_json','ipc_json','ipc/index',$data);	
			}
		}
		public function opt($id=FALSE)
		{
			$this->checkLogin();
			$data["user"] = $this->get_currentUser();
			$data['assets'] = $this->assets;
			$data['uptype'] = 'create';
			if($id){
				$data['uptype'] = 'update/'.$id;
				$data['result'] = $this->ipc_model->get_json($id);
				$this->loadView('ipc_json','ipc_json','ipc/update',$data);				
			}else{
				$this->loadView('ipc_json','ipc_json','ipc/add',$data);
			}
		}
		public function create()
		{	
			$this->checkLogin();		
			$result = $this->ipc_model->set_ipc($this->input->post("value"),$this->session->userdata('userId'),$this->session->userdata('username'));
			$this->result_jsonp($result);
		}
		public function update($id)
		{	
			$this->checkLogin();
			$result = $this->ipc_model->up_ipc($id);
			$this->result_jsonp($result);
		}
		public function wedding()
		{

			$this->loadView('about of notes','about','about/index');
		}
	}