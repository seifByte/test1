<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

$controller = "administrateur";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelAdministrateur.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="connect";	
	
	switch ($action) 
	{      
			// Afficher la page de connexion de l'administrateur
			case "connect":
				$pagetitle = "Connexion Admin";
				$view = "connect";
				require ("{$ROOT}{$DS}view{$DS}view.php");
				break;
	
			// Vérifier les informations de connexion de l'administrateur
			case "connected":
				if(isset($_REQUEST['adresse']) && isset($_REQUEST['mot_de_passe']))
				{
						$adr = $_REQUEST['adresse'];
						$mdp=$_REQUEST['mot_de_passe'];
						$u = ModelAdministrateur::select($adr,'adresse_email');
		
							if($u!=null){
	
								if($mdp == $u->getMot_de_passe())
								{   
									// Démarrer une session et enregistrer l'adresse e-mail de l'administrateur connecté
									session_start();
									$_SESSION['admin'] = $_REQUEST['adresse'];
									// Rediriger l'administrateur vers la page de gestion des événements
									header('Location: index.php?controller=evenement&action=readAll');
									exit(); 
								}
									 else{
										die('mot de passe invalide');
									 }
							}
								
							
								 else{
										die ('Email ou mot de passe invalide');
									}	
							}	
							
				else{
						die("Veuillez remplir tous les champs ");
					}	
				
				break;
			
			// Déconnecter l'administrateur
			case "deconnect":
				session_start();
			   // Déconnexion
			   session_destroy();
			  // Rediriger vers la page d'accueil 
			  header('Location: index.php?controller=evenement&action=readAll');
			  exit();
		   
			
		}
	
	?>
	
