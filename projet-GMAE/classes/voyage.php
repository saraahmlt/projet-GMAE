<?php
include '../classes/db.php';

class Travels {
    public $id_voyage;
    public $categorie;
    public $region;
    public $formule;
    public $title;
    public $image_url;
    public $description;
    public $date_debut;
    public $date_fin;
    public $price;
    public $type_hebergement;
    public $dbc;
 
    public function __construct() {
        $this->dbc = new Db ('localhost', 'projetGMAE', 'root', 'root');
        $this->dbc->connect();
    }

    public function create($categorie, $region, $formule, $title, $image_url, $description, $date_debut, $date_fin, $price, $type_hebergement) {
        // Requête SQL d'insertion pour insérer le voyage dans la base de données
        $query = "INSERT INTO travels (categorie, region, formule, title, image_url, description, date_debut, date_fin, price, type_hebergement) 
                  VALUES (:categorie, :region, :formule, :title, :image_url, :description, :date_debut, :date_fin, :price, :type_hebergement)";
        
        // Préparation de la requête
        $stmt = $this->dbc->connection->prepare($query);
    
        // Liaison des valeurs
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':region', $region);
        $stmt->bindParam(':formule', $formule);
        $stmt->bindParam(':title', $title );
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date_debut', $date_debut);
        $stmt->bindParam(':date_fin', $date_fin);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':type_hebergement', $type_hebergement);
    
        // Exécution de la requête d'insertion
        $stmt->execute();
    }

    public function delete($id_voyage){
        $deleteTrav = "DELETE FROM travels WHERE `id_voyage`=".$id_voyage;
        $stmt=$this->dbc->connection->prepare($deleteTrav);
        $stmt->execute();
    }
    
    public function getTravelsDetail($id_voyage) {
        try {
            $query = "SELECT * FROM travels WHERE id_voyage= :id_voyage";
            $stmt=$this->dbc->connection->prepare($query);
            $stmt->bindParam(':id_voyage', $id_voyage);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMesage();
            return false;
        }
    }
    
    public function update($id_voyage, $categorie, $region, $formule, $title, $image_url, $description, $date_debut, $date_fin, $price, $type_hebergement) {
        try {
            $updateTrav = "UPDATE travels SET 
                          categorie = :categorie,
                          region = :region,
                          formule = :formule,
                          title = :title,
                          image_url = :image_url,
                          description = :description,
                          date_debut = :date_debut,
                          date_fin = :date_fin,
                          price = :price,
                          type_hebergement = :type_hebergement 
                          WHERE id_voyage = :id_voyage";
            
            $stmt = $this->dbc->connection->prepare($updateTrav);
        
            $stmt->bindParam(':id_voyage', $id_voyage);
            $stmt->bindParam(':categorie', $categorie);
            $stmt->bindParam(':region', $region);
            $stmt->bindParam(':formule', $formule);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':image_url', $image_url);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':date_debut', $date_debut);
            $stmt->bindParam(':date_fin', $date_fin);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':type_hebergement', $type_hebergement);
        
            // Exécution de la requête de mise à jour
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Erreur lors de la mise à jour du voyage: " . $e->getMessage();
        }
    }
}    

$travels = new Travels();

$travels->delete(12);

?>

   




