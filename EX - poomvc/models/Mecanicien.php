<?php

class Mecanicien{
    private $nom;

    // constructeur
    public function __construct($nom){
        $this->nom = $nom;
    }
    // Méthode pour réparer une voiture. C'est le mécanicien qui vient changer l'état
    public function reparerVoiture(Voiture $voiture){
        echo "Le mécanicien " .$this->nom. " répare la voiture : ".$voiture->getMarque() . "<br>";
        $voiture->setEtat("réparée");
        $voiture->save();
    }

    // Fonction déclarer la panne - BB
    public function declarerPanne(Voiture $voiture){
        echo "Le mécanicien " . $this->nom . " déclare en panne la voiture : " . $voiture->getMarque() . "<br>";
        $voiture->setEtat("en panne");
        $voiture->save();
    }

    // Fonction afficher nom mécanicien
    public function afficherNom(){
        echo "Mécanicien : " .$this->nom ."<br>";
    }
}