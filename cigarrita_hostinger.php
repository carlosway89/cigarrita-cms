<?php
// Crear un nuevo recurso cURL
$ch = curl_init();

// Establecer URL y otras opciones apropiadas
curl_setopt($ch, CURLOPT_URL, "http://www.ikt-straubing.org/api/realTimeUpdate");
curl_setopt($ch, CURLOPT_HEADER, 0);

// Capturar la URL y pasarla al navegador
curl_exec($ch);

// Cerrar el recurso cURL y liberar recursos del sistema
curl_close($ch);
?>
