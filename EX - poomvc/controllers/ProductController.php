<?php

// Class ProductController
// Ce contôleur gère les actions qui concernent le produit
// son but est de récupérer les données et d'inclure la vue

require_once __DIR__ . "/../models/Product.php";
require_once __DIR__ . "/../models/Vendeur.php";

class ProductController
{
    /**
     * function details
     * Afficher détails du produit
     *
     * @param int $id
     */

    public function details($id)
    {
        // Chargement du pdt
        $product = Product::loadById($id);

        if (!$product) {
            echo "Produit non trouvé";
            return;
        }

        // Inclusion de la vue
        include __DIR__ . "/../views/ProductDetails.php";
    }

//----------------------------------------------------------------------------------------------------------------------
// Creation Produit -BB
    public function create($id)
    {
        // Chargement du produit
        $product = Product::loadById($id);

        if (!$product) {
            echo "Produit non en rayon";
            return;
        }
        // Créer une nouvelle instance de vendeur
        $vendeur = new Vendeur('Joshue');

        // vendeur rentre le pdt
        $message = $vendeur->create($product);

        // Inclusion de la vue
        include __DIR__ . '/../views/ProductDetails.php';
    }

//----------------------------------------------------------------------------------------------------------------------
// Supprimer pdt - BB
    public function delete($id)
    {
        // Chargement du produit
        $product = Product::loadById($id);

        if (!$product) {
            echo "produit non en rayon";
            return;
        }
        // Créer une nouvelle instance de vendeur
        $vendeur = new Vendeur('Sephiroth');
        // Facultatif : On peut passer un message à la vue
        $message = $vendeur->delete($product);
        // Inclusion de la vue
        include __DIR__ . "/../views/ProductDetails.php";
    }
//----------------------------------------------------------------------------------------------------------------------
// Mettre à jour le produit

    public function update($id)
    {

        // Créer une nouvelle instance de vendeur
        $vendeur = new Vendeur('Mao');
        // Chargement du produit
        $product = Product::loadById($id);

        // vendeur met à jour le pdt
        $message = $vendeur->update($product);

        // Inclusion de la vue
        include __DIR__ . "/../views/ProductDetails.php";
    }
}