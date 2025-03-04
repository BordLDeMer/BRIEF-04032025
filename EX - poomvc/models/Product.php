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

    // Méthode pour sauvegarder le Product en BDD
    // Si l'id est null alors on fait une nouvelle insertion
    // Sinon, on met à jour l'enregistrement

    public function update(){
        // On recupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();

        if($this->id === null){
            // Insertion
            $stmt = $db -> prepare("insert into Product (nom, prix, stock) values (?, ?, ?)");
            $stmt -> execute([$this->nom, $this->prix, $this->stock]);

            // Récupération de l'id généré par MySQL
            $this->id = $db->lastInsertId();

        } else {
            // Mise à jour si le Product existe déjà
            $stmt = $db->prepare("update Product set nom=?, prix=?, stock=? where id=?");
            $stmt -> execute([$this->nom, $this->prix, $this->stock, $this->id]);
        }
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
        $stmt = $db->prepare("SELECT * FROM Product WHERE id=?");
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        /*var_dump($data);*/

        if ($data) {
            return new Product($data['nom'], $data['prix'], $data['stock'], $data['id']);
        }
        // Sinon on retourne null
        return null;
    }
// Méthode pour supprimer un produit de la BDD
        public function delete(){
            $db = Database::getInstance()->getConnection();

            try {
                if ($this->id !== null) {
                    $stmt = $db->prepare("DELETE FROM Product WHERE id = ?");
                    $stmt->execute([$this->id]);
                }
            } catch (PDOException $e) {
                // Gestion des erreurs de base de données
                echo "Erreur lors de la suppression du produit : " . $e->getMessage();
            }
        }
    }