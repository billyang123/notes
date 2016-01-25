<?php
	class Messages extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		}
		public function index($id)
		{

			switch ($id) {
				case '1':
					$data["content"] = array("messages"=>"你的帐号没有通过审核，现在暂不能发布内容！请联系管理员QQ：289755081。");
					break;
				case '2':
					$data["content"] = array("messages"=>"由于你近期发布的内容有问题，所以暂停你的帐号，请联系管理员QQ：289755081。");
					break;
				default:
					$data["content"] = array("messages"=>"系统抽风啦！！，请联系管理员QQ：289755081。");
					break;
			}
			$this->loadView('messgaes of notes','about','messgaes/index',$data);

		}
	}