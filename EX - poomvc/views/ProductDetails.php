<link href="/BRIEF-04032025/EX - poomvc/css/crudintro.css" rel="stylesheet" />

<?php
include 'header.php';
?>
<H2>Détails du produit</H2>
<form action="index.php?action=create" method="post" style="padding: 8px 0 16px 8px">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required placeholder="Entrez le nom"/>
    <label for="prix">Prix :</label>
    <input type="text" id="prix" name="prix" required placeholder="Entrez le prix"/>
    <label for="quantite">Quantité :</label>
    <input type="text" id="quantite" name="quantite" required placeholder="Entrez la quantité"/>
    <button type="submit">Envoyer</button>
</form>
<?php

if(!isset($product)){
    echo"<p> Erreur : Produit non trouvé</p>";
    include 'footer.php';
    exit;
}
?>
<?php
// si il y a un message alors on l'affiche
if(isset($message)){
    echo "<p style='color:green;'>".htmlspecialchars($message)."</p>";
}
?>

<?php if(!empty($product)): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        <!-- PHP -->
        <?php foreach($product as $a):  ?>
            <tr>
                <td><?= htmlspecialchars($a['id']) ?></td>
                <td><?= htmlspecialchars($a['nom']) ?></td>
                <td><?= htmlspecialchars($a['prix']) ?></td>
                <td><?= htmlspecialchars($a['stock']) ?></td>
                <td><a href="/EX%20-%20poomvc/views/Update.php?id=<?= htmlspecialchars($a['id']) ?>">Modifier</a></td>
                <td><a href="/EX%20-%20poomvc/views/Sup.php?id=<?= htmlspecialchars($a['id']) ?>">Supprimer</a></td>
            </tr>
        <?php endforeach;  ?>
        </tbody>
    </table>
<?php else:  ?>
    <p>Aucun auteur</p>
<?php endif; ?>

<?php
include 'footer.php';
?>

