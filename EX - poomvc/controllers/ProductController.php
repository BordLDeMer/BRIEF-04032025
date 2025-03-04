<?php

// Class ProductController
// Ce contôleur gère les actions qui concernent le produit
// son but est de récupérer les données et d'inclure la vue

require_once __DIR__ . "/../models/Product.php";

class ProductController
{
    /**
     * function details
     * Afficher détails du produit
     *
     * @param int $id
     */

    public function details()
    {
        // Chargement du pdt
        $product = Product::lister();

        if (!$product) {
            echo "Produit non trouvé";
            return;
        }

        // Inclusion de la vue
        include __DIR__ . "/../views/ProductDetails.php";
    }

//----------------------------------------------------------------------------------------------------------------------
// Creation Produit -BB
    public function create()
    {
        Product::create($_POST["name"], $_POST["prix"], $_POST["quantite"]);
        header("Location: index.php");
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
        if ($_POST["conf"] === "Supprimer"){
            Product::delete($id);
            header("Location: index.php");
            exit();
        } else {
            header("Location: views/Sup.php?msg=Confirmation ratee : Mauvaise orthographe&id=" . $_GET['id']);
            exit();
        }
    }
//----------------------------------------------------------------------------------------------------------------------
// Mettre à jour le produit

    public function update($id)
    {
        // Chargement du produit
        $product = Product::loadById($id);

        if (!$product) {
            echo "produit non en rayon";
            return;
        }

        $name = !empty($_POST["name"]) ? trim($_POST["name"]) : $product->getNom();
        $prix = !empty($_POST["prix"]) ? floatval($_POST["prix"]) : $product->getPrix();
        $quantite = !empty($_POST["quantite"]) ? intval($_POST["quantite"]) : $product->getStock();

        Product::update($id, $name, $prix, $quantite);

        header("Location: index.php");
    }
}