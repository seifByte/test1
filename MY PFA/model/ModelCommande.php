<?php
require_once("Model.php");
require_once ("{$ROOT}{$DS}config{$DS}Conf.php"); 

class ModelCommande extends Model{
  private $id_commande;
  private $prix_total;
  private $etat;
  private $date_commande;
  private $id_utilisateur;
  protected static $table = 'commande';
  protected static $primary = 'id_commande';
   
  public function __construct($id_commande = NULL, $prix_total = NULL, $etat = NULL, $date_commande = NULL, $id_utilisateur = NULL) {
    if (!is_null($prix_total) && !is_null($etat) && !is_null($date_commande) && !is_null($id_utilisateur)) {
      $this->id_commande = $id_commande;
      $this->prix_total = $prix_total;
      $this->etat = $etat;
      $this->date_commande = $date_commande;
      $this->id_utilisateur = $id_utilisateur;
    }
  } 

  public function getId_commande() {
    return $this->id_commande;  
  }
  
  public function getPrix_total() {
    return $this->prix_total;  
  }
  
  public function getEtat() {
    return $this->etat;  
  }
  
  public function getDate_commande() {
    return $this->date_commande;  
  }
  
  public function getId_utilisateur() {
    return $this->id_utilisateur;  
  }

  
}









?>
