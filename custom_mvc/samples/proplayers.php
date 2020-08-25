<?php   
    require_once 'CALLAPI.php';

    $url = 'https://api.opendota.com/api/proPlayers';


    $data = CallAPI('GET' , $url);

    $data = json_decode($data);

    die(print_r($data));
