<?php
require_once 'Database.php';
class Voiture {

    //propriétés privées
    private $id;
    private $marque;
    private $model;
    private $annee;
    private $etat;

    //Constructeur : initialisation de la voiture
    public function __construct($marque, $model, $annee, $etat = "en panne", $id=null) {
        $this->marque=$marque;
        $this->model =$model;
        $this->annee =$annee;
        $this->etat  =$etat;
        $this->id    =$id;
    }

    // Getter pour l'id
    public function getId(){
        return $this->id;
    }

    // Getter pour la marque
    public function getMarque(){
        return $this->marque;
    }

    // Getter pour le model
    public function getModel(){
        return $this->model;
    }
    // Getter pour l'année
    public function getAnnee(){
        return $this->annee;
    }
    // Getter pour l'état
    public function getEtat(){
        return $this->etat;
    }

    // Getter les details de la voiture
    public function getDetails(){
        return "Voiture : " .$this->marque . " " .$this->model . "(" . $this->annee . ") - Etat :" . $this->etat;
    }

    // Setter pour modifier l'état de la voiture
    public function setEtat($nouvelEtat){
        $this->etat=$nouvelEtat;
    }

    // Affichage des details de la voiture
    public function afficherDetails(){
        echo "Voiture : " .$this->marque . " " .$this->model . "(" . $this->annee . ") - Etat :" . $this->etat . "<br>";
    }

    // Méthode pour sauvegarder la voiture en BDD
    // Si l'id est null alors on fait une nouvelle insertion
    // Sinon, on met à jour l'enregistrement

    public function save(){
        // On recupère PDO via la Class Database
        $db = Database::getInstance()->getConnection();

        if($this->id === null){
            // Insertion
            $stmt = $db -> prepare("insert into voitures (marque, model, annee, etat) values (?, ?, ?, ?)");
            $stmt -> execute([$this->marque, $this->modele, $this->annee, $this->etat]);

            // Récupération de l'id généré par MySQL
            $this->id = $db->lastInsertId();

        } else {
            // Mise à jour si la voiture existe déjà
            $stmt = $db->prepare("update voitures set marque=?, modele=?, annee=?, etat=? where id=?");
            $stmt -> execute([$this->marque, $this->model, $this->annee, $this->etat, $this->id]);
        }
    }

    // Méthode pour charger la voiture provenant de la BDD
    /**
     * Charger une voiture depuis la BDD via son ID
     * @param int $id
     * @return Voiture/null retourne l'objet voiture ou rien
    */

    public static function loadById(int $id)
    {
        $db = Database::getInstance()->getConnection();

        // Récupération infos dans BDD
        $stmt = $db->prepare("SELECT * FROM voitures WHERE id=?");
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

/*var_dump($data);*/

        if ($data) {
            return new Voiture($data['marque'], $data['modele'], $data['annee'], $data['etat'], $data['id']);
        }
        // Sinon on retourne null
        return null;
    }
}