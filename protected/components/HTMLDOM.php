<?php 
include_once('vendor/simple_html_dom/simple_html_dom.php');

class HTMLDOM{

	function get($url,$type="html"){
		if ($type=="string") {
			$html = str_get_html($url);
		}else{
			$html = file_get_html($url);
		}
					
		return $html;
	}
}