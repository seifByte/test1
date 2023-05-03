<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

$controller = "billet";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelBillet.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelCommande.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelEvenement.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelInformation.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelUtilisateur.php"); 


if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) 
{
     

				case "confirmer_commande":
					session_start();


					$id_commande = $_REQUEST["id_commande"];
					$id_event= $_REQUEST["id_event"];
					$commande = ModelCommande::selectid($id_commande);
				    $evenement=ModelEvenement::selectid($id_event);
                  
					
					// Start transaction
					Model::beginTransaction();
				  
					try {
					  // Update information table
					  $information = array(
						"id_commande" => $id_commande,
						"id_event" => $evenement->getId_event(),
						"quantite" => $_REQUEST["nbr_billets"],
					  );
					  ModelInformation::insert($information);

					  // Update evnement table
					  $newnombre = $evenement->getNombre_billet() - $_REQUEST["nbr_billets"];
                       
						  $tab = array(
							"id_event" => $evenement->getId_event(),
							"nombre_billet" => $newnombre,
						);
						
						ModelEvenement::update($tab,$id_event);
				  
					  // Update billet table
				
					  $billet = array(
						"id_event" => $evenement->getId_event(),
						"prix" => $evenement->getPrix_billet(),
					  );
					  for ($i = 0; $i < $_REQUEST["nbr_billets"] ; $i++) {
						ModelBillet::insert($billet);
					  }
				  
					  // Update commande table

					  $tab=array(
						"etat" =>  "payé" ,
						"id_commande" =>$commande->getId_commande()
					  );
					  ModelCommande::update($tab, $commande->getId_commande());
				  
					  
					  // Commit transaction
					  Model::commit();
			
					  $message = "Commande confirmée avec succès.";
					} catch (PDOException $e) {
					  // Rollback transaction
					  Model::rollback();
				  
					  $message = "Erreur lors de la confirmation de la commande : " . $e->getMessage();
					}

				  
					$pagetitle = "Confirmation de commande";
					$view = "confirmer_commande";
					require ("{$ROOT}{$DS}view{$DS}view.php");
					break;
				  
       
	  
		
	 
	}


?>
