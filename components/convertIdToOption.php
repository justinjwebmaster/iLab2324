<?php
function getNomById($id) {
    global $dataOptions;

    foreach ($dataOptions as $option) {
        if ($id == $option['id']) {
            return $option['nom'];
        }
    }
    return "pas bon id ? '$id'"; // retourne null si aucune correspondance n'est trouvée
}