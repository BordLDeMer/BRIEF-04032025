<?php
require_once 'Database.php';
class Product {

    //propriétés privées
    private $id;
    private $nom;
    private $prix;
    private $stock;

    //Constructeur : initialisation du Product
    public function __construct($nom, $prix, $stock, $id=null) {
        $this->nom=$nom;
        $this->prix =$prix;
        $this->stock =$stock;
        $this->id    =$id;
    }

    // Getter pour l'id
    public function getId(){
        return $this->id;
    }

    // Getter pour le nom
    public function getNom(){
        return $this->nom;
    }

    // Getter pour le prix
    public function getPrix(){
        return $this->prix;
    }
    // Getter pour l'stock
    public function getStock(){
        return $this->stock;
    }

    // Getter les details de la Product
    public function getDetails(){
        return "Product : " .$this->nom . " " .$this->prix . "(" . $this->stock . ")";
    }
//----------------------------------------------------------------------------------------------------------------------
    /*Setter pour modifier l'état du Product*/

    // Affichage des details de la Product
    public function afficherDetails(){
        echo "Product : " .$this->nom . " " .$this->prix . "(" . $this->stock . ")" . "<br>";
    }

    // Méthode pour lister tous les produits
    public static function lister() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM Produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour charger le Product provenant de la BDD
    /**
     * Charger un Product depuis la BDD via son ID
     * @param int $id
     * @return Product/null retourne l'objet Product ou rien
     */

    public static function loadById(int $id)
    {
        $db = Database::getInstance()->getConnection();

        // Récupération infos dans BDD
        $stmt = $db->prepare("SELECT * FROM Produits WHERE id=?");
        $stmt->execute([$id]);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        /*var_dump($data);*/

        if ($data) {
            return new Product($data['nom'], $data['prix'], $data['stock'], $data['id']);
        }
        // Sinon on retourne null
        return null;
    }

    // Méthode de création de produit (un seul)
    public static function create($nom, $prix, $stock) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO Produits (nom, prix, stock) values (?, ?, ?)");
        return $stmt -> execute([ $nom, $prix, $stock]);
    }

    // Méthode pour sauvegarder le Product en BDD
    // Si l'id est null alors on fait une nouvelle insertion
    // Sinon, on met à jour l'enregistrement

    public static function update($id, $nom, $prix, $stock) {
        // On recupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE Produits SET nom = ?, prix = ?, stock = ? WHERE id = ?");
        return $stmt -> execute([ $nom, $prix, $stock, $id]);
    }

    // Méthode pour supprimer un produit de la BDD
    public static function delete($id){
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("DELETE FROM Produits WHERE id = ?");
            $stmt->execute([$id]);
    }
    }