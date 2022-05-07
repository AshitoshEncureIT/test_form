<?php 
defined('BASEPATH') OR exit('No direct script access allowed.');
	function pr($myArray = array(), $terminate = true) {
	echo '<pre>';
	print_r($myArray);
	if($terminate) {
	
	}
	echo '</pre>';
	}

	function num_format($number=""){
		if (!empty($number)) {
			$number = number_format($number, 2, '.', ',');
			return $number;
		}
		
	}
	function num_format_wd($number=""){
		if (!empty($number)) {
			$number = number_format($number);
			return $number;
		}
	}

	function set_alert($type, $message) {	
	    $CI = & get_instance();
	    $CI->session->set_flashdata('message-' . $type, $message);
	}

	function _l($line, $label = '') {  
	    
	    $CI = & get_instance();
	     $_line = sprintf($CI->lang->line($line), $label);
	    if ($_line !== '') {
	        return $_line;
	    }
	    
	    // dont change this line
	    return 'translate_not_found_' . $line;
	}
	

	function _s($line) {
		$CI = & get_instance();
	    $_line = sprintf($CI->session->userdata($line));
		return $_line;
	}

	if (!function_exists('set_api_language')) {
	    function set_api_language($language) {
	        $CI =& get_instance();
	        $CI->load->helper('language');
	        switch ($language) {
	            case 'english': $CI->lang->load('rest_controller','english'); break;                
	            case 'french': $CI->lang->load('rest_controller', 'french'); break;
	            default: $CI->lang->load('french_lang','english'); break;
	        }
	        return;
	    }
	}