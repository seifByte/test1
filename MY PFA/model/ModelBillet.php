<?php
require_once ("Model.php"); 

class ModelBillet extends Model{
  private $prix;
  private $id_billet;
  private $id_event;
  protected static $table = 'billet';
  protected static $primary = 'id_billet';
   
  public function __construct($prix = NULL, $id_billet = NULL, $id_event = NULL) {
    if (!is_null($prix) && !is_null($id_billet) && !is_null($id_event)) {
      $this->prix = $prix;
      $this->id_billet = $id_billet;
      $this->id_event = $id_event;   
     }
  } 

  public function getPrix() {
    return $this->prix;  
  }
  public function getId_billet() {
    return $this->id_billet;  
  }
  public function getId_event() {
    return $this->id_event;  
  }
}
?>