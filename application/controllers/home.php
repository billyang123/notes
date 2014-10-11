<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->spark('markdown/1.2.0');
		$this->load->model('notes_model');
	}
	public function index()
	{

		$data["content"] = array_reverse($this->notes_model->get_home_notes());
		$this->loadView('home','home','home/index',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */