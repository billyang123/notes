<?php
	class Notes extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->spark('markdown/1.2.0');
		  	$this->load->model('notes_model');
		}
		public function index()
		{	
			

			$data["content"] = array_reverse($this->notes_model->get_notes());
			//$data["laters"] = array_reverse($data["content"]);
			//echo($this->result_jsonCode($data));exit(0);
			//var_dump($data);exit(0);
			//$data["assets"] = "";
			$this->loadView('notes','notes','note/index',$data);
		}
		public function note($id)
		{
			$data["content"] = $this->notes_model->get_notes($id);
			$data["user"] = $this->get_currentUser();
			//echo($this->result_jsonCode($data));exit(0);
			if(count($data["content"])>0){
				$this->loadView('notes','notes','note/note',$data);
			}else{
				show_404();
			}
			//$this->loadView('notes','','note/note',$data);
		}
		public function notesPublic()
		{
			$data["content"] = $this->notes_model->get_notes_by_scope("1");
			$this->loadView('notesPublic','notes','note/index',$data);
			//$this->result_jsonCode($data);
		}
		public function notesPersonal()
		{
			$data["content"] = $this->notes_model->get_notes_by_scope("2");
			$this->loadView('notesPersonal','notes','note/index',$data);
			//$this->result_jsonCode($data);
		}
		public function delete($id){
			// var_dump($id);
			// exit(0);
			$this->notes_model->remove_note($id);
		}
		public function create()
		{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'title', 'required');
			$this->form_validation->set_rules('content', 'content', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->result_jsonCode("内容不能为空",false);
			}
			else
			{
				$result = $this->notes_model->set_notes();
				if($result){
			    	$this->result_jsonCode("保存成功",true);
			    }else{
			    	$this->result_jsonCode("保存失败",false);
			    }
			}
		}
		public function update($id,$ip=FALSE)
		{

			if($ip){
				$result = $this->notes_model->update_notes($id);
				if($result){
			    	$this->result_jsonCode("修改成功",true);
			    }else{
			    	$this->result_jsonCode("修改失败",false);
			    }
			    return;
			}
			$data["content"] = $this->notes_model->get_notes($id);
			$this->loadView('Write','Write','write/update',$data);

		}
		public function old()
		{
			$data["notes"] = $this->notes_model->get_oldNotes();

			echo json_encode($data["notes"]);
		}

	}