<?php

require_once ("Model.php"); 

class ModelOrganisateur extends Model {
  private $nombre_evenement;
  private $id_utilisateur;
  private $id_organisateur;
  protected static $table = 'organisateur';
  protected static $primary = 'id_organisateur';
  
  public function __construct($nombre_evenement = NULL, $id_utilisateur = NULL, $id_organisateur=NULL) {
    if ((!is_null($nombre_evenement)) && !is_null($id_utilisateur) ) {
      $this->nombre_evenement= $nombre_evenement;
      $this->id_utilisateur= $id_utilisateur;
      $this->id_organisateur= $id_organisateur;

    }
  }  
  
  public function getId() {
       return $this->id_utilisateur;  
  }
  
  public function getIdOrg() {
     return $this->id_organisateur;  
}

public function setIdOrg($id_organisateur) {
     $this->id_organisateur= $id_organisateur;
}

  public function getNombre_evenement() {
       return $this->nombre_evenement;  
  }
  
}
?>
