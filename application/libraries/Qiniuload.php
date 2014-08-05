<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("qiniu/io.php");
require_once("qiniu/rs.php");
class Qiniuload {
	public function upLoadLocalFile($value='file_name1')
	{
		$bucket = 'ybbcdn';
		$secretKey = '-5P_lb891K-xXUSNj2pTxSNK21FxnbXKvAn9dDF7';
		$accessKey = 'hZB4el2zIFDT7eb5XXX7qxQso3-x1s5GCLpzNmNQ';
		$key1 = $value;

		Qiniu_SetKeys($accessKey, $secretKey);
		$putPolicy = new Qiniu_RS_PutPolicy($bucket);
		$upToken = $putPolicy->Token(null);
		$putExtra = new Qiniu_PutExtra();
		$putExtra->Crc32 = 1;
		list($ret, $err) = Qiniu_PutFile($upToken, $key1, __file__, $putExtra);
		echo "====> Qiniu_PutFile result: \n";
		if ($err !== null) {
		    var_dump($err);
		} else {
		    var_dump($ret);
		}
	}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */