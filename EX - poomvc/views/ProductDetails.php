<?php
include 'header.php';
?>
<H2>Détails du produit</H2>
<?php

if(!isset($product)){
    echo"<p> Erreur : Produit non trouvé</p>";
    include 'footer.php';
    exit;
}
?>
<p><?php echo htmlspecialchars($product->getDetails());?></p>
<?php
// si il y a un message alors on l'affiche
if(isset($message)){
    echo "<p style='color:green;'>".htmlspecialchars($message)."</p>";
}
?>

<p>
    <a href="index.php?action=create&id=<?php echo $product->getId();?>">Créer le produit</a>
    <a href="index.php?action=update&id=<?php echo $product->getId();?>">Mettre à jour le produit</a>
    <a href="index.php?action=delete&id=<?php echo $product->getId();?>">Supprimer le produit</a>
</p>

<?php
include 'footer.php';
?>

