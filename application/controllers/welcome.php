<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->spark('markdown/1.2.0');
		//$this->load->library('uploadtoken');
		$this->load->model('notes_model');
	}
	public function index()
	{

		$data = $this->notes_model->get_pageNotes(1,2);
		//$data["laters"] = array_reverse($data["content"]);
		//echo($this->result_jsonCode($data));exit(0);
		//var_dump($data);exit(0);
		//$data["assets"] = "";
		//echo json_encode($data);exit(0);
		//$this->pagination();
		$data['pagin'] = $this->pagination();
		if($this->input->is_ajax_request()){
			$this->loadView('notes','notes','note/note_page',$data);
		}else{
			$this->loadView('notes','notes','note/index',$data);
		}
	}
}