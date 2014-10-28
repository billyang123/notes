<?php
	class Search extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->spark('markdown/1.2.0');
		  	$this->load->model('notes_model');
		  	$this->load->model('tags_model');
		  	$this->load->library('session');
		  	$this->load->model('classify_model');
		  	$this->load->model('account_model');
		}
		public function index()
		{	
			//$isPage = $this->input->get('isPage',true);
			$page = $this->input->get('p','1');
			$page = $page ? $page :1;
			$classId = $this->input->get('class');
			//$data = $this->notes_model->get_notes(FALSE,$page,5);
			$data = $this->notes_model->get_pageNotes($page,5);
			//$data["laters"] = array_reverse($data["content"]);
			//echo($this->result_jsonCode($data));exit(0);
			//var_dump($data);exit(0);
			//$data["assets"] = "";
			//echo json_encode($data);exit(0);
			$data['classId'] = $classId?$classId:1;
			$data['classify'] = $this->classify_model->getClassify();
			$data['pagin'] = $this->pagination('/index.php/notes/?class='.$data['classId'],$data['total'],5,'/index.php/notes/');
			if($this->input->is_ajax_request()){
				$this->loadView('notes public','notes','note/note_page',$data);
			}else{
				$this->loadView('notes public','notes','note/index',$data);
			}
			//$this->loadView('notes','notes','note/index',$data);
		}
		public function mine()
		{	
			
			//$page = $this->input->get('p',1);
			//$data = $this->notes_model->get_notes(FALSE,$page,5);
			$this->checkLogin();
			$isPage = $this->input->get('isPage',true);
			$page = $this->input->get('p','1');
			$page = $page ? $page :1;
			$user = $this->get_currentUser();
			//var_dump($data['userInfo']);exit(0);
			$data = $this->notes_model->get_notesByUserId($user["userId"],$page,5);
	
			//$data = $this->notes_model->get_notes(FALSE,$page,5);
			$data['userInfo'] = $this->account_model->get_users($user["userId"]);
			$data['pagin'] = $this->pagination('/index.php/mine/?',$data['total'],5,'/index.php/mine/');
			
			//var_dump($classId,$data['classId']);exit(0);
			if($this->input->is_ajax_request()){
				$this->loadView('my notes','mine','note/note_page',$data);
			}else{
				$this->loadView('my notes','mine','note/mynotes',$data);
			}
		}
		public function note($id)
		{

			$data["content"] = $this->notes_model->get_notes($id);
			//var_dump($data["content"]);exit(0);
			$data["user"] = $this->get_currentUser();
			$this->load->model('account_model');
			$info = $this->account_model->get_users($data["content"]["userId"]);
			//var_dump($data["content"]["scope"] ,$data["content"]["userId"],$data["user"]["userId"]);
			if($data["content"]["scope"] == '0' &&  $data["content"]["userId"]!=$data["user"]["userId"]){
				if(!$data["user"]["is_login"]){
					$this->checkLogin();
				}else{
					show_404();
				}
				return;
			}
			$data["com_user"] = array(
				"userId"=>$data["content"]["userId"],
				'userName'=>$info["username"],
				'intro' => $info["intro"],
				'email'=>$info["email"],
				'avatar'=>$info["avatar"],
				'is_login'=>true
				);
			// if($data["content"]['scope'] == '0' && $data["user"]["userId"] == $data["content"]["userId"]){
			// 	$this->checkLogin();
			// 	return;
			// }
			//$this->result_jsonCode($data);exit(0);
			if(count($data["content"])>0){
				$this->loadView($data["content"]["title"],'notes','note/note',$data);
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
					$tagName = $this->input->post('tagsStr');
					if($tagName){			
						$this->tags_model->set_tag(explode(',',$tagName));
					}
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
					$tagName = $this->input->post('tagsStr');
					if($tagName){			
						$this->tags_model->set_tag(explode(',',$tagName));
					}
			    	$this->result_jsonCode("修改成功",true);
			    }else{
			    	$this->result_jsonCode("修改失败",false);
			    }
			    return;
			}
			$data["content"] = $this->notes_model->get_notes($id);
			$data["classify"] = $this->classify_model->getClassify();
			$this->loadView('Write','Write','write/update',$data);

		}
		public function old()
		{
			$data["notes"] = $this->notes_model->get_oldNotes();

			echo json_encode($data["notes"]);
		}
	}