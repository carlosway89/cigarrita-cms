<?php 

// Include the required dependencies.
require_once( 'vendor/autoload.php' );

include_once('vendor/gajus/dindent/src/Indenter.php');

class DINDENT{

	function get($html){
		$indenter = new \Gajus\Dindent\Indenter();
		$_indenter=$indenter->indent($html);

		return $_indenter;
	}
}