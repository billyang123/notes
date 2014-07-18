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