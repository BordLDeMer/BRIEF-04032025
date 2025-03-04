<?php
include 'header.php';
?>



<H2>Détails de la voiture</H2>
<?php

if(!isset($voiture)){
    echo"<p> Erreur : voiture non trouvée</p>";
    include 'footer.php';
    exit;
}
?>
<p><?php echo htmlspecialchars($voiture->getDetails());?></p>
<?php
// si il y a un message alors on l'affiche
if(isset($message)){
    echo "<p style='color/green;'>".htmlspecialchars($message)."</p>";
}
?>

<p>
    <a href="index.php?action=reparer&id=<?php echo $voiture->getId();?>">Réparer la voiture</a>
    <a href="index.php?action=panne&id=<?php echo $voiture->getId();?>">Déclarer en Panne</a>
</p>

<?php
include 'footer.php';
?>

