<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

$controller = "utilisateur";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelUtilisateur.php"); 

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) 
{
        case "readAll":
					$pagetitle = "Liste des utilisateurs";
					$view = "readAll";
					session_start();
					$tab_u = ModelUtilisateur::getsAll();//appel au modèle pour gerer la BD
					require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
					break;
  
	    case "read":	
				if(isset($_REQUEST['adresse'])){
					$adr = $_REQUEST['adresse'];

					$u = ModelUtilisateur::selectid($adr);
						if($u!=null){
							$pagetitle = "Details de l'utilisateur";
							$view = "read";
							require ("{$ROOT}{$DS}view{$DS}view.php");
						}
					}	
			break;

		case "connect":
			$pagetitle = "Connexion";
			$view = "connect";
			require ("{$ROOT}{$DS}view{$DS}view.php");
			break;


		case "connected":
			if(isset($_REQUEST['adresse']) && isset($_REQUEST['mot_de_passe']))
			{
					$adr = $_REQUEST['adresse'];
					$mdp=$_REQUEST['mot_de_passe'];
					$u = ModelUtilisateur::select($adr,'adresse_email');
					
						if($u!=null){

							if($mdp == $u->getMot_de_passe())
							{   session_start();
								$_SESSION['id_utilisateur'] = $u->getId();
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
			
		
		
		case "deconnect":
			session_start();
           // deconnexion
           session_destroy();
          // Retour vers la page d'acceuil 
		  $pagetitle = "Accueil";
		  $view = "readAll";
		  require ("{$ROOT}{$DS}view{$DS}view.php");
		  header('Location: index.php?controller=evenement&action=readAll');
          exit();
	   
		case "delete": 
		 if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
			$del = ModelUtilisateur::selectid($id);
			session_start();
			if($del!=null){
			$del->delete($id);
			session_destroy();
			$_SESSION = array();
			
			/*redirection vers le contrôleur et l’action par défaut*/
			header('Location: index.php?controller=evenement');
			}
		  }
	      break;
	
	    case "create":
		$pagetitle = "Inscription";
		$view = "create";
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
		

	    case "created": 
			// Action du formulaire de la création
		  if(isset($_REQUEST['nom']) && isset($_REQUEST['prénom']) && isset($_REQUEST['adresse'])  && isset($_REQUEST['mot_de_passe'])){
			$nom = $_REQUEST["nom"];
			$prenom = $_REQUEST["prénom"];
			$email  = $_REQUEST["adresse"];
			$mot_de_passe= $_REQUEST["mot_de_passe"];
			$tab = array(
				"nom" => $nom,
				"prenom" => $prenom,
				"adresse_email" => $email,
				"mot_de_passe" => $mot_de_passe,
				);				
			    ModelUtilisateur::insert($tab);
				$id=ModelUtilisateur::lastInsertId();
				$u = new ModelUtilisateur($nom, $prenom, $mot_de_passe,$email,$id);
				$pagetitle = "Inscription réussie";
				$view = "created";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}	
		
		  break;


		  
	
	    case "update":
			if(isset($_REQUEST['id'])){
				$id = $_REQUEST['id'];
				$up = ModelUtilisateur::selectid($id);
				session_start();
				//il faut vérifier que l'utilisateur existe dans la bdd 
				if($up!=null){
					if(isset($_SESSION['admin'])){
						$pagetitle = "Compte utilisateur";
					}
					else $pagetitle = "Mon Compte";
					$view = "update";
					require ("{$ROOT}{$DS}view{$DS}view.php");			
				}
				
			}
			break;
		
	    case "updated": // Action du formulaire de modification
			if(isset($_REQUEST['nom']) && isset($_REQUEST['prénom']) && isset($_REQUEST['adresse'])  && isset($_REQUEST['mot_de_passe'])){
			$id = $_REQUEST['id'];
			$tab = array(
				"id_utilisateur" => $_REQUEST['id'],
				"nom" => $_REQUEST['nom'],
				"prenom" => $_REQUEST['prénom'],
				"adresse_email" => $_REQUEST['adresse'],
				"mot_de_passe" => $_REQUEST['mot_de_passe'],
				);	
				session_start();
			
			$o  = ModelUtilisateur::selectid($id);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			if($o!=null){
				$u = ModelUtilisateur::update($tab, $id);		
				$pagetitle = "Compte modifié";
				$view = "updated";
				require ("{$ROOT}{$DS}view{$DS}view.php");
			}
			
		   break;
		
		}	
	}


?>
