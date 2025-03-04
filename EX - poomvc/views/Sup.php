<?php
include "Header.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (isset($_GET["msg"])){
    echo $_GET["msg"] . "<br>";
}
?>

    <a href="../../../BRIEF-04032025/EX%20-%20poomvc/index.php"><button>Retour</button></a>
    <form action="../../../BRIEF-04032025/EX%20-%20poomvc/index.php?action=delete&id=<?php echo $id ?>" method="post">
        <label for="conf">Confirmation :</label>
        <input type="text" id="conf" name="conf" placeholder='Veuillez taper "Supprimer"'/>
        <button type="submit">Envoyer</button>
    </form>

<?php include "Footer.php"; ?>