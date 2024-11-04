<?php



// Añadir el token
$token = "vVmYQi60cVFeW1ncYHXQTLj9O3pYCSRreLtrOnIs";

$fecha = '2021-10-10';
// URL del APOD


$url_ast ="https://api.nasa.gov/neo/rest/v1/feed?start_date=".$fecha."&end_date=".$fecha."&api_key=" . $token;








// Hacer la solicitud  asteroides 
$request = @file_get_contents($url_ast);
$jsonAsteroides= json_decode($request);

print_r($jsonAsteroides->element_count);


$warnings=0;
foreach($jsonAsteroides->near_earth_objects->{$fecha} as $element){
print_r("<br/>");
print_r($element->name);
print_r("<br/>");
print_r($element->estimated_diameter->kilometers->estimated_diameter_max);
print_r("<br/>");
print_r($element->close_approach_data[0]->relative_velocity->kilometers_per_second." km/s");
print_r("<br/>");
print_r($element->close_approach_data[0]->miss_distance->lunar." lunar");
print_r("<br/>");

if($element->is_potentially_hazardous_asteroid== true){
    $warnings++;
}
}
print_r("<br/>");
print_r($warnings);









?>