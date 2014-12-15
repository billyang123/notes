<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->spark('markdown/1.2.0');
		$this->load->model('notes_model');
		$this->load->model('classify_model');
		$this->load->model('tags_model');
	}
	public function index()
	{

		
		//$this->result_jsonCode($data);
		$pageSize = 15;
		if($this->input->is_ajax_request()){
			$page = $this->input->get('p','1');
			$page = $page ? $page :1;
			$data = $this->notes_model->get_pageNotes($page,$pageSize);
			$data['assets'] = $this->assets;
			//$this->result_jsonCode($data);exit(0);
			$this->load->view('home/partial/list',$data);
		}else{
			$page = $this->input->get('p','1');
			$page = $page ? $page :1;
			$data = $this->notes_model->get_pageNotes($page,$pageSize);
			$data['classify'] = $this->classify_model->getClassify();
			$data['tags'] = $this->tags_model->get_tags();
			$this->loadView('notes-home','home','home/index',$data);
		}
		//$this->loadView('notes-home','home','home/index',$data);
	}
	
	public function homeList()
	{

		$data["content"] = $this->notes_model->get_home_notes();
		
		$this->loadView('notes-home','home','home/index',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */