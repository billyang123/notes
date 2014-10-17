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

		$data["content"] = array_reverse($this->notes_model->get_home_notes());
		$data['classify'] = $this->classify_model->getClassify();
		$data['tags'] = $this->tags_model->get_tags();
		$this->loadView('notes-home','home','home/index',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */