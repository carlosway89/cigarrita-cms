<?php 
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/dompdf/autoload.php';

// disable DOMPDF's internal autoloader if you are using Composer
define('DOMPDF_ENABLE_AUTOLOAD', false);

// include DOMPDF's default configuration
require_once 'vendor/dompdf/dompdf/dompdf_config.inc.php';

class Pdf{
	
	public function create($html="<h1>Hola mundo!</h1>"){

		

		$filename="report".date("Y-m-d H:i:s");

		$fp=fopen("pdf/$filename.pdf","x");
		fclose($fp) ;



		// 		// Introducimos HTML de prueba
		// $html = '<h1>Hola mundo!</h1>';
		 
		// // Instanciamos un objeto de la clase DOMPDF.
		$pdf = new DOMPDF();
		 
		// // Definimos el tamaño y orientación del papel que queremos.
		$pdf->set_paper("A4", "portrait");
		 
		// // Cargamos el contenido HTML.
		$pdf->load_html(utf8_decode($html));
		 
		// // Renderizamos el documento PDF.
		$pdf->render();

		file_put_contents('pdf/'.$filename.".pdf", $pdf->output());
		// $pdf->stream("$filename.pdf", array("Attachment" => false));

		// chmod("pdf/$filename.pdf", 0777);

		return $filename.".pdf";


		// exit(0);


	}
}
