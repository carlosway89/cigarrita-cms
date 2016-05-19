<?php
// Crear un nuevo recurso cURL
$ch = curl_init();
$url_path="http://www.cigarrita-worker.com";
// Establecer URL y otras opciones apropiadas
curl_setopt($ch, CURLOPT_URL, $url_path."/api/realTimeUpdate");
curl_setopt($ch, CURLOPT_HEADER, 0);

// Capturar la URL y pasarla al navegador
curl_exec($ch);

// Cerrar el recurso cURL y liberar recursos del sistema
curl_close($ch);
?>
