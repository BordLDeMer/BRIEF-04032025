<?php
/**
 * Front controller
 *
 * Point d'entrée de l'application
 * Il lit les paramètrs passés dans l'URL
 * Selon ces paramètres son but est d'instancier le controller qui convient
 */

// Démarrage session
session_start();

// Inclusion des controllers

require_once "controllers/ProductController.php";

// Récupération paramètres URL

$action = isset($_GET['action']) ? $_GET['action'] : 'details';

// même chose avec l'id
$id = isset($_GET['id']) ? intval($_GET['id']): 1;

//Instanciation controller
$controller = new ProductController();

//Routage
/*if($action=='details'){
    // Appel de la méthode pour afficher détails voiture
    $controller->details($id);
} else{
    // si l'action n'existe pas
    echo "Action n'existe pas";
}*/

switch ($action) {
    case 'details':
        $controller->details($id);
        break;
    case 'create':
        $controller->create($id);
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;

    default :
        echo "Action n'existe pas";
}