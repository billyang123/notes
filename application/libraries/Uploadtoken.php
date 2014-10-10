<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("qiniu/io.php");
require_once("qiniu/rs.php");
class Uploadtoken {
		var $template_data = array();
		var $bucket = 'ybbcdn';
		

		function get_token()
		{	
			$bucket = $this->bucket;
			$SecertKey = '-5P_lb891K-xXUSNj2pTxSNK21FxnbXKvAn9dDF7';
			$AccessKey = 'hZB4el2zIFDT7eb5XXX7qxQso3-x1s5GCLpzNmNQ';
			Qiniu_SetKeys($AccessKey, $SecertKey);
			$putPolicy = new Qiniu_RS_PutPolicy($bucket);
			$upToken = $putPolicy->Token(null);
			return $upToken;
		}
		function get_key()
		{
			return md5("yangbinbin".time());
		}
		function uploadToQiNiu($bucket='ybbcdn',$key1="default",$fileDir)
		{
			$accessKey = 'hZB4el2zIFDT7eb5XXX7qxQso3-x1s5GCLpzNmNQ';
			$secretKey = '-5P_lb891K-xXUSNj2pTxSNK21FxnbXKvAn9dDF7';
			Qiniu_SetKeys($accessKey, $secretKey);
			$putPolicy = new Qiniu_RS_PutPolicy($bucket);
			$upToken = $putPolicy->Token(null);
			$putExtra = new Qiniu_PutExtra();
			$putExtra->Crc32 = 1;
			list($ret, $err) = Qiniu_PutFile($upToken, $key1, $fileDir, $putExtra);
			if ($err !== null) {
				return $err;
			} else {
				return $ret;   
			}
		}
		function deleteFromQiNiu($key1="default",$bucket='ybbcdn')
		{
			$accessKey = 'hZB4el2zIFDT7eb5XXX7qxQso3-x1s5GCLpzNmNQ';
			$secretKey = '-5P_lb891K-xXUSNj2pTxSNK21FxnbXKvAn9dDF7';
			Qiniu_SetKeys($accessKey, $secretKey);
			$client = new Qiniu_MacHttpClient(null);
			$err = Qiniu_RS_Delete($client, $bucket, $key1);
			//echo "====> Qiniu_RS_Delete result: \n";
			if ($err !== null) {
			    return $err;
			} else {
			    return "Success";
			}
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */