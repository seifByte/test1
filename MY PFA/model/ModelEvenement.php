<?php

require_once ("Model.php"); 

class ModelEvenement extends Model {
  private $description;
  private $lieu;
  private $image;
  private $date_event;
  private $nombre_billet;
  private $nom;
  private $prix_billet;
  protected static $table = 'evenement';
  protected static $primary = 'id_event';
  
  public function __construct($nom = NULL, $lieu = NULL, $date_event = NULL, $description = NULL, $image=NULL, $id_organisateur=NULL, $id_event=NULL,$prix_billet=NULL,$nombre_billet=NULL) {
    if (!is_null($nom) && !is_null($lieu) && !is_null($date_event) && !is_null($description) && !is_null($image) && !is_null($id_organisateur) && !is_null($prix_billet)  && !is_null($nombre_billet) ){
  
      $this->nom = $nom;
      $this->lieu = $lieu;
	 $this->description=$description;
      $this->image=$image;
      $this->date_event=$date_event;
      $this->id_event=$id_event;
      $this->id_organisateur=$id_organisateur;
      $this->prix_billet=$prix_billet;
      $this->nombre_billet=$nombre_billet;
    }
  }  
  

  public function getNom() {
       return $this->nom;  
  }


  public function getNombre_billet() {
     return $this->nombre_billet;  
}

public function SetNombre_billet($nombre_billet) {
     $this->nombre_billet=$nombre_billet;  
}


  public function getPrix_billet() {
     return $this->prix_billet;  
}


  public function getId_event() {
     return $this->id_event;  
}

  
  public function getLieu() {
       return $this->lieu;  
  }

  public function getDate() {
       return $this->date_event;  
  }

  public function getDescription() {
     return $this->description;  
}

public function getImage() {
     return $this->image;  
}
   

public function getId_organisateur() {
     return $this->id_organisateur;  
}
}
?>
