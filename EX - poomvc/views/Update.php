<?php
include "header.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>

<a href="../../../BRIEF-04032025/EX%20-%20poomvc/index.php"><button>Retour</button></a>
<form action="../../../BRIEF-04032025/EX%20-%20poomvc/index.php?action=update&id=<?php echo $id ?>" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" placeholder="Entrez le nom"/>
    <label for="prix">Prix :</label>
    <input type="text" id="prix" name="prix" placeholder="Entrez le prix"/>
    <label for="quantite">Quantité :</label>
    <input type="text" id="quantite" name="quantite" placeholder="Entrez la quantité"/>
    <button type="submit">Envoyer</button>
</form>

<?php include "Footer.php"; ?>