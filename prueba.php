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

$asteroides = new stdClass();
$asteroides->warnings=0;
$warnAste=array();
foreach($jsonAsteroides->near_earth_objects->{$fecha} as $element){

    if($element->is_potentially_hazardous_asteroid == true){
        $warnAste[$asteroides->warnings] = new stdClass();
        $warnAste[$asteroides->warnings]->name = $element->name;
        $warnAste[$asteroides->warnings]->diameter = $element->estimated_diameter->kilometers->estimated_diameter_max;
        $warnAste[$asteroides->warnings]->velocity = $element->close_approach_data[0]->relative_velocity->kilometers_per_second;
        $warnAste[$asteroides->warnings]->distance =$element->close_approach_data[0]->miss_distance->lunar;
        $asteroides->warnings++;
    }
}



foreach($warnAste as $element){print_r("<br/>");
    print_r($element->name);
    print_r("<br/>");
    print_r($element->diameter);
    print_r("<br/>");
    print_r($element->velocity." km/s");
    print_r("<br/>");
    print_r($element->distance." lunar");
    print_r("<br/>");}





print_r("<br/>");
print_r($asteroides->warnings);









?>