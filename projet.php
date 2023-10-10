<?php
$lang = 'fr';

// récuperer le projet à afficher
$id = $_GET['id'];


$titleOfPage = 'iLab 202324 @ HEAJ in DWT by PJDJ';


require_once 'components/header.php';
require_once 'components/connectProjets.php';
require_once 'components/connectOptions.php';
require_once 'components/connectEtudiants.php';

foreach($dataProjets as $projet){
    if($projet['id'] == $id){
        $projetToDisplay = $projet;
    }
}

?>

<!-- Notre code ici -->





<?php
// affichage des élément du $projetsToDisplay
// echo $projetToDisplay['nom'];
?>


<div class="relative h-96 w-full">
    <img src="assets/datas/fr/img/<?php echo $projetToDisplay['img1'];?>" alt="Background Image" class="w-full h-full object-cover">
    <div class="absolute bottom-4 left-4">
        <h2 class="text-4xl text-black font-bold"><?php echo $projetToDisplay['nom'];?></h2>
        <p class="text-xl text-red-500"><?php echo $projetToDisplay['etudiants'];?></p>
    </div>
</div>


<?php
include 'components/footer.php';
?>
