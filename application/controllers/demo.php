<?php 
	class Demo extends MY_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('demo_model');
		}
		public function index()
		{
			$data['assets'] = $this->assets;
			$data["data"] = $this->demo_model->get_demo();
			$this->load->view('demo/header',$data);
			$this->load->view('demo/list',$data);
		}
		public function up($id = false)
		{
			$this->checkLogin();
			$data['assets'] = $this->assets;
			$data["id"] = $id;
			if ($id === FALSE){
				if($this->input->is_ajax_request()){
					$this->demo_model->set_demo();
					$this->result_jsonCode();
				}else{
					$this->load->view('demo/header',$data);
					$this->load->view('demo/up',$data);
				}
			}else{
				$data["type"] = "list";
				if($this->input->is_ajax_request()){
					$this->demo_model->update_demo($id);
					$this->result_jsonCode();
				}else{
					$data["data"] = $this->demo_model->get_demo($id);
					$this->load->view('demo/header',$data);
					$this->load->view('demo/up',$data);
				}
			}
		}
		public function delete($id = false)
		{
			if ($id === FALSE){
				return false;
			}else{
				
				$this->result_jsonCode($this->demo_model->remove_demo($id));
			}
		}
	}