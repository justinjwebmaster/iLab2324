<?php

$titleOfPage = 'iLab 202324 @ HEAJ in DWT by PJDJ';
$lang = 'fr';

require_once 'components/header.php';
require_once 'components/connectProjets.php';
require_once 'components/connectOptions.php';
require_once 'components/connectEtudiants.php';

?>

<!-- Notre code ici -->

<div class="container mx-auto">
    <div class="grid grid-cols-3 gap-10 m-10">
        <?php
        shuffle($dataProjets);
        $previousConfig = '';
        $length = count($dataProjets);
        
        
        echo "<div class='relative shadow-md overflow-hidden h-96 col-span-1 rounded-2xl bg-white'>
            <div class='absolute bottom-0 left-0 p-6 pt-16 w-full'>
                <img src='assets/img_1.png' alt='' class='rounded-full border-4 border-red-300 p-4 mr-28'>
                <p class='text-black'>Salut, moi c'est <span class='text-red-300 font-bold'>Rooter</span>, je suis la pour te guider.</p>
                <p class='text-black'>Touche un projet et je te dirais tout ce que je sais sur lui.</p>
            </div>
        </div>";

        echo generateCard($dataProjets[0], "col-span-2");
        $previousConfig = '1-2';

        


        for ($i = 1; $i < $length; $i++) {
            $randomValue = mt_rand(1, 3);
            
            

            // Si c'est la dernière itération ou s'il ne reste qu'une seule carte
            if ($i === $length - 1) {
                echo generateCard($dataProjets[$i], "col-span-3");
                $previousConfig = '3';
                continue;
            }

            switch ($randomValue) {
                case 1:
                    if ($previousConfig != '1-2') {
                        echo generateCard($dataProjets[$i], "col-span-1");
                        echo generateCard($dataProjets[++$i], "col-span-2");
                        $previousConfig = '1-2';
                    } else {
                        echo generateCard($dataProjets[$i], "col-span-2");
                        echo generateCard($dataProjets[++$i], "col-span-1");
                        $previousConfig = '2-1';
                    }
                    break;

                case 2:
                    if ($previousConfig != '2-1') {
                        echo generateCard($dataProjets[$i], "col-span-2");
                        echo generateCard($dataProjets[++$i], "col-span-1");
                        $previousConfig = '2-1';
                    } else {
                        echo generateCard($dataProjets[$i], "col-span-1");
                        echo generateCard($dataProjets[++$i], "col-span-2");
                        $previousConfig = '1-2';
                    }
                    break;

                case 3:
                    if ($previousConfig != '3') {
                        echo generateCard($dataProjets[$i], "col-span-3");
                        $previousConfig = '3';
                    } else {
                        echo generateCard($dataProjets[$i], "col-span-1");
                        echo generateCard($dataProjets[++$i], "col-span-2");
                        $previousConfig = '1-2';
                    }
                    break;
            }
        }

        function getNomById($id) {
            global $dataOptions; // TODO: demander au prof si on peut faire ca
            foreach ($dataOptions as $option) {
                if ($id == $option['id']) {
                    return $option['nom'];
                }
            }
            return "pas bon id ? '$id'"; // retourne null si aucune correspondance n'est trouvée
        }
        function generateCard($element, $spanClass) {
            
            $nom = getNomById($element['option']);
            
            return "<a href='projet.php?id=" . $element['id'] . "' class='relative shadow-md overflow-hidden h-96 $spanClass rounded-2xl'>
                    <img src='assets/datas/fr/img/{$element['img1']}' alt='{$element['nom']}' class='w-full h-full object-cover'>
                    <div class='absolute bottom-0 left-0 p-6 pt-16 bg-gradient-to-t from-black to-transparent w-full'>
                        <h2 class='text-2xl font-bold text-white mb-2'><span class='uppercase'>{$element['nom']}</span></h2>
                        <p class='text-white'><span class='uppercase'>{$nom}</span></p>
                    </div>
                </a>";
        }
        ?>
        
       

    </div>

<?php
include 'components/footer.php';
?>
