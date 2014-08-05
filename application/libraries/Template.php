<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();

		

		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('content_for_template', $this->CI->load->view($view, $view_data, TRUE));
			$this->set('nav_list', array('home','notes','media', 'about', 'write'));	
			return $this->CI->load->view($template, $this->template_data, $return);
		}
		function load_main($view = '', $view_data = array(), $return = FALSE)
		{
			 $this->set('nav_list', array('Home', 'Photos', 'About', 'Contact'));
			 $this->load('template', $view, $view_data, $return);
		}
		function set_globals($config = array())
		{
			foreach ($config as $key => $value) {
	            $data[$key] = $value;
	        }
			$CI =& get_instance();
			$CI->load->vars($data);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */