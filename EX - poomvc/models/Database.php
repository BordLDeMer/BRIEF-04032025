<?php
/* Se connecter  la BDD
 * Bien gérer les ressources (pattern Singleton)
 * Simplifier l'utilisation de PDO
 */
class Database
{
// propriété privée - instance unique de la connection (par personne)
    private static $instance = null; // statique : valable meme sans avoir declaré variable

// pour stocker l'objet $pdo
    private $pdo;

// contructeur privé
    private function __construct(){
        // configuration BDD
        $host = "localhost";
        $dbname = "mytech";
        $user = "root";
        $password = "";

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die ("Erreur : " . $e->getMessage());
        }
    }
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnection(){
        // Retourne l'objet PDO,  pour pouvoir faire des requetes
        return $this->pdo;
    }
}

//Exemple pour appeler cette classe
//$db = Database :: getInstance()->getConnection();