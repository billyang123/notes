<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("qiniu/rs.php");
class Uploadtoken {
		var $template_data = array();

		

		function get_token()
		{	$bucket = 'ybbcdn';
			$SecertKey = '-5P_lb891K-xXUSNj2pTxSNK21FxnbXKvAn9dDF7';
			$AccessKey = 'hZB4el2zIFDT7eb5XXX7qxQso3-x1s5GCLpzNmNQ';
			Qiniu_SetKeys($AccessKey, $SecertKey);
			$putPolicy = new Qiniu_RS_PutPolicy($bucket);
			$upToken = $putPolicy->Token(null);
			return $upToken;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('content_for_template', $this->CI->load->view($view, $view_data, TRUE));
			$this->set('nav_list', array('home','notes','media', 'about', 'write'));
			$this->set('assets',"/~apple");	
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		function load_main($view = '', $view_data = array(), $return = FALSE)
		{
			 $this->set('nav_list', array('Home', 'Photos', 'About', 'Contact'));
			 $this->load('template', $view, $view_data, $return);
		}

}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */