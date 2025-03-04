<?php

// Class VoitureController
// Ce contôleur gère les actions qui concernent la voiture
// son but est de récupérer les données et d'inclure la vue

require_once __DIR__ . "/../models/Voiture.php";
require_once __DIR__ . "/../models/Mecanicien.php";

class VoitureController {
    /**
     * function details
     * Afficher détails de la voiture
     *
     * @param int $id
     */

    public function details($id){
        // Chargement de la voiture
        $product = Product::loadById($id);

        if(!$product){
            echo "Produit non trouvée";
            return;
        }

        // Inclusion de la vue
        include __DIR__ . "/../views/ProductDetails.php";
    }

//----------------------------------------------------------------------------------------------------------------------
// réparation Voiture -BB
    public function reparer($id){
        // Chargement de la voiture
        $product = Product::loadById($id);

        if(!$product){
            echo "Produit non trouvée";
            return;
        }
        // Créer une nouvelle instance de mécanicien
        $mecanicien = new Mecanicien('Jean');

        // mécanicien répare voiture
        $message = $mecanicien->reparerVoiture($voiture);

        // Inclusion de la vue
        include __DIR__ . '/../views/ProductDetails.php';
    }

//----------------------------------------------------------------------------------------------------------------------
// Constatation voiture en panne - BB
    public function enPanne($id){
        // Chargement de la voiture
        $voiture = Voiture::loadById($id);

        if(!$voiture){
            echo "Voiture non voiture";
            return;
        }
        // Créer une nouvelle instance de mécanicien
        $mecanicien = new Mecanicien('Michel');
        // Facultatif : On peut passer un message à la vue
    $message = $mecanicien->declarerPanne($voiture);
        // Inclusion de la vue
        include __DIR__ . "/../views/ProductDetails.php";
    }}
