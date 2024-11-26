<?php
// Obtiene la URL de la imagen desde el parámetro GET
$imageUrl = $_GET['url'] ?? '';

// Validar que la URL no esté vacía y que sea de la NASA
if (empty($imageUrl) || strpos($imageUrl, 'https://apod.nasa.gov/') === false) {
    die("URL inválida o no permitida.");
}

// Obtener el nombre del archivo desde la URL
$fileName = basename($imageUrl);

// Establece las cabeceras para la descarga
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$fileName\"");

// Abre el flujo de la URL y envía los datos al navegador.
$fp = fopen($imageUrl, 'rb');
if ($fp === false) {
    die("Error al abrir la imagen.");
}

fpassthru($fp); // Enviar el contenido del archivo al navegador
fclose($fp);
?>