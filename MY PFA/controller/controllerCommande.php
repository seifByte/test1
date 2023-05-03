<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

$controller = "commande";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelCommande.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelEvenement.php");
require_once ("{$ROOT}{$DS}model{$DS}ModelUtilisateur.php");
require_once ("{$ROOT}{$DS}model{$DS}ModelInformation.php");

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
	switch ($action) {

		case "commande":
	
			// Récupération des informations de la commande
			session_start();
			$evenement = ModelEvenement::selectid($_REQUEST["id"]);
			$prix_total = $_POST["nb_billets"] * $evenement->getPrix_billet();
			$id_utilisateur = $_SESSION["id_utilisateur"];
			$date_commande = date("Y-m-d");
			$etat = "non paye";
	
			// Insertion de la commande dans la table "commande"
			$tab = array(
				"prix_total" => $prix_total,
				"etat" => $etat,
				"date_commande" => $date_commande,
				"id_utilisateur" => $id_utilisateur,
			);				
			ModelCommande::insert($tab);
			$id = ModelCommande::lastInsertId();
			$commande = new ModelCommande($id, $prix_total, $etat, $date_commande, $id_utilisateur);
	
			// Mise à jour du nombre de billets disponibles pour l'événement
			$evenement->setNombre_billet($evenement->getNombre_billet() - $_POST["nb_billets"]);
	
			// Affichage de la vue de confirmation d'achat
			$pagetitle = "Confirmation d'achat";
			$view = "commande";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			break;
	
		case "read":
		
			// Récupération des commandes de l'utilisateur courant
			session_start();
			if(isset($_SESSION['id_utilisateur'])){
				$id_utilisateur =$_SESSION['id_utilisateur'];
				$commandes = ModelCommande::selectmul($id_utilisateur,"id_utilisateur");
	
				if($commandes!=null){
					$message="Vos commandes:";
				}
				else{
					$message="Pas de commandes pour le moment";
				}
	
				// Affichage de la vue des achats de l'utilisateur courant
				$pagetitle = "Mes Achats";
				$view = "achat";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}	
			break;
	
		case "delete":
		
			// Suppression d'une commande
			if(isset($_REQUEST['id_commande'])){
				$id = $_REQUEST['id_commande'];
				$del = ModelCommande::selectid($id);
				session_start();
				if($del!=null){
					$del->delete($id);
	
					// Redirection vers le contrôleur et l’action par défaut
					header('Location: index.php?controller=evenement');
				}
			}
			break;
	}
	
