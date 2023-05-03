<?php
/* c'est le DTO (Data Transfert Object) la
représentation objet d’une table, c’est-à-dire
l’objet métier. Il ne contient que des propriétés
et des accesseurs correspondants. */

require_once ("Model.php"); 

class ModelAdministrateur extends Model{
//Même noms et ordre que dans la table utilisateur
  private $mot_de_passe;
  private $email;
  protected static $table = 'administrateur';
  protected static $primary = 'adresse_email';
   
  public function __construct($mot_de_passe = NULL, $email = NULL  ) {
    if (!is_null($mot_de_passe) && !is_null($email)) {

      $this->mot_de_passe =$mot_de_passe;
      $this->email =$email;
      
     }
  } 

  public function getEmail() {
    return $this->email;  
}
public function getMot_de_passe() {
  return $this->mot_de_passe;  
}
}
?>
