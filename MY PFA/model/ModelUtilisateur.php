<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */

require_once ("Model.php"); 

class ModelUtilisateur extends Model{
//Même noms et ordre que dans la table utilisateur
  private $id_utilisateur;
  private $nom;
  private $prenom;
  private $mot_de_passe;
  private  $adresse_email;
  protected static $table = 'utilisateur';
  protected static $primary = 'id_utilisateur';
   
  public function __construct( $nom = NULL, $prenom = NULL, $mot_de_passe = NULL, $adresse_email = NULL , $id_utilisateur = NULL ,$id=NULL) {
    if (!is_null($nom) && !is_null($prenom) && !is_null($mot_de_passe) && !is_null($adresse_email)) {
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->mot_de_passe =$mot_de_passe;
      $this->adresse_email =$adresse_email;
      $this->id =$id;
     }
  } 

  public function getId() {
    return $this->id_utilisateur;  
}

public function setId($id) {
     $this->id=$id_utilisateur;  
}

 public function getNom() {
       return $this->nom;  
  }
  public function getPrenom() {
       return $this->prenom;  
  }
  public function getEmail() {
    return $this-> adresse_email;  
}
public function getMot_de_passe() {
  return $this->mot_de_passe;  
}
}
?>
