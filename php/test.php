<?php
$busca = "descarga";

require_once "functions.php";
$config = getConfig($sub = true);

// $configArray = (array)$config->forms;
// $clave = array_search($busca, $configArray);


var_dump( $config->forms->{$busca} );