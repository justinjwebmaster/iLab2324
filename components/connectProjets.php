<?php

$json = file_get_contents('assets/datas/'. $lang . '/projets.json');
$dataProjets = json_decode($json, true);  // true pour obtenir un tableau associatif

// Vérifier si le décodage a fonctionné
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Erreur de décodage JSON PROJETS: ' . json_last_error_msg());
}
