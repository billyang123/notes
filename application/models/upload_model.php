<?php
class Upload_model extends CI_Model {
 
	public function __construct()
	{
	    $this->load->database();
	    $this->load->library('session');
	    $this->load->library('uploadtoken');
	}
	public function upload()
	{
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		// 5 minutes execution time
		@set_time_limit(5 * 60);

		// Uncomment this one to fake upload time
		// usleep(5000);

		// Settings
		//$tmpDir = '/Library/WebServer/Documents/notes/notes';
		$tmpDir = '/var/tmp';

		$targetDir = $tmpDir . DIRECTORY_SEPARATOR . "plupload";

		//$targetDir = 'uploads';
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds
		// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}

		// Get a file name
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}
		
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
		// Chunking might be enabled
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
		// Remove old temp files

		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}

			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}

		// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}
		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}

			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {	
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}

		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}

		@fclose($out);
		@fclose($in);

		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off 
			rename("{$filePath}.part", $filePath);
		}
		//echo 'hhhhh'.$filePath;exit(0);
		$_key_=date("Ymd",time())."_".time()."_".$fileName;
		$result = $this->uploadtoken->uploadToQiNiu('ybbcdn',$_key_,$filePath);
		$path = 'http://ybbcdn.qiniudn.com/'.$_key_;
		$this->set_upload_info($path,$fileName,$this->input->post("albumId"),$this->input->post("description"));
		// Return Success JSON-RPC response
		return $result;
	}
	public function get_token()
	{
		return $this->uploadtoken->get_token();
	}
	public function getFile($url,$filePath)
	{
		set_time_limit(24*60*60);
		$tmpDir = '/var/tmp';
		//$targetDir = $tmpDir . DIRECTORY_SEPARATOR . "plupload";
		$newfname = $filePath;
		$file=fopen($url, 'rb');
		if($file){
			$newf = fopen($newfname, 'wb');
			if($newf){
				while (!feof($file)) {
					fwrite($newf, fread($file,1024*8),1024*8);
				}
			}
			if($file){
				fclose($file);
			}
			if($newf){
				fclose($newf);
			}
		}
	}
	public function signUpload()
	{
		$tmpDir = '/var/tmp';
		$targetDir = $tmpDir . DIRECTORY_SEPARATOR . "plupload";

		$imgUrl = $this->input->post("imgUrl");
		$fileName = 'colectimg'.time().'.' . $this->input->post("media_type");
		$filePath = $targetDir.DIRECTORY_SEPARATOR.$fileName;

		$this->getFile($imgUrl,$filePath);
		$_key_=date("Ymd",time())."_".time()."_".$fileName;
		$result = $this->uploadtoken->uploadToQiNiu('ybbcdn',$_key_,$filePath);
		$path = 'http://ybbcdn.qiniudn.com/'.$_key_;
		$albumId = $this->input->post("albumId");
		$albumId = $albumId?$albumId:$this->session->userdata('default_albumId');
		$this->set_upload_info($path,$fileName,$albumId,$this->input->post("description"));
		$result['albumId'] = $albumId;
		return $result;
	}
	public function set_upload_info($path,$name,$albumId,$description)
	{
		$data = array(
		    'path' => $path,
		    'name' => $name,
		    'albumId' => $albumId,
		    'userId' => $this->session->userdata('userId'),
		    'userName' => $this->session->userdata('username'),
		    'createTime' => time(),
		    'description' => $description
		);
		return $this->db->insert('yun_img_info', $data);
	}
	public function delete_file($id=FALSE)
	{
		if(!$id) return FALSE;
		$query = $this->db->get_where('yun_img_info', array('id' => $id));
	  	$fileInfo = $query->row_array();
	  	//var_dump(explode("ybbcdn.qiniudn.com/",$fileInfo['path'])[1]);exit(0);
	  	$_key_ = explode("ybbcdn.qiniudn.com/",$fileInfo['path'])[1];
		$result = $this->uploadtoken->deleteFromQiNiu($_key_);
		$this->db->delete("yun_img_info",array("id"=>$id));
		return $result;
	}
}