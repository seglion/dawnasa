
<?php
$user = "Miguel";

// Añadir el token
$token = "vVmYQi60cVFeW1ncYHXQTLj9O3pYCSRreLtrOnIs";
$fecha = isset($_GET['calendar']) ? $_GET['calendar'] : date('Y-m-d');
var_dump($fecha);
// URL del APOD
$url = "https://api.nasa.gov/planetary/apod?api_key=" . $token. "&date=".$fecha;
//URL de los asteroides

$url_ast ="https://api.nasa.gov/neo/rest/v1/feed?start_date=".$fecha."&end_date=".$fecha."&api_key=" . $token;


// Preparar file_get_contents para obtener la cabecera
$options = [
    'http' => [
        'method' => 'GET',
        'header' => "User-Agent: PHP\r\n"
    ]
];



// Crear un contexto de flujo (stream context)
$context = stream_context_create($options);

// Hacer la solicitud  asteroides 
$request = @file_get_contents($url_ast);
$jsonAsteorides = json_decode($request);




// Hacer la solicitud  imagen 
$request = @file_get_contents($url, false, $context);
$json = json_decode($request);





// Obtener los encabezados HTTP y el límite de peticiones
$headers = $http_response_header;
$totallimit = explode(":", $headers[15])[1];
$remainRequest = explode(":", $headers[16])[1];
$usedRequest = $totallimit - $remainRequest;







?>
