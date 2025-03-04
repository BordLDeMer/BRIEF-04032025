<?php

class Vendeur{
    private $nom;

    // constructeur
    public function __construct($nom){
        $this->nom = $nom;
    }
    // Méthode pour créer un produit. C'est le vendeur qui vient changer l'état
    public function create(Product $product){
        echo "Le vendeur " .$this->nom. " enregistre le produit : ".$product->getNom() . "<br>";
        $product->setEtat("enregistré");
        $product->save();
    }

    // Fonction update product - BB
    public function update(Product $product){
        echo "Le vendeur" . $this->stock . " met à jour le produit : " . $product->getStock() . "<br>";
        $product->setEtat("à jour");
        $product->save();
    }
    // Fonction delete product - BB
    public function delete(Product $product){
        echo "Le vendeur" . $this->stock . " supprime le produit : " . $product->getStock() . "<br>";
        $product->setEtat("supprimé");
        $product->save();
    }

    // Fonction afficher nom vendeur
    public function afficherNom(){
        echo "Vendeur : " .$this->nom ."<br>";
    }
}