<?php
require_once("Model.php");

class ModelInformation extends Model {
  private $id_commande;
  private $id_event;
  private $quantite;
  protected static $table = 'information';
  protected static $primary = 'id_commande';

  public function __construct($id_commande = NULL, $id_event = NULL, $quantite = NULL) {
    if (!is_null($id_commande) && !is_null($id_event) && !is_null($quantite)) {
      $this->id_commande = $id_commande;
      $this->id_event = $id_event;
      $this->quantite = $quantite;
    }
  }

  public function getId_commande() {
    return $this->id_commande;
  }

  public function getId_event() {
    return $this->id_event;
  }

  public function getQuantite() {
    return $this->quantite;
  }

  public function setId_commande($id_commande) {
    $this->id_commande = $id_commande;
  }

  public function setId_event($id_event) {
    $this->id_event = $id_event;
  }

  public function setQuantite($quantite) {
    $this->quantite = $quantite;
  }
}
?>
