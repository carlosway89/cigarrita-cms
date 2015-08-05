<?php 
include_once('vendor/simple_html_dom/simple_html_dom.php');

class HTMLDOM{

	function get($url){
		$html = file_get_html($url);
		return $html;
	}
}