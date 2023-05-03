<?php
session_start();
$controller = "evenement";

require_once ("{$ROOT}{$DS}model{$DS}ModelEvenement.php"); // chargement du modèle

if(isset($_GET['action']))
	$action = $_GET['action'];// recupère l'action passée dans l'URL
else $action="readAll";
	

require_once ("{$ROOT}{$DS}model{$DS}ModelUtilisateur.php");
require_once ("{$ROOT}{$DS}model{$DS}ModelOrganisateur.php");

switch ($action) {
	case "readAll":
		$pagetitle = "Programme";
		$view = "readAll";
		$tab_ev = ModelEvenement::getsAll();
		$alert="Pas d'événement pour le moment";
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		break;
	
	case "read":
		if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
        $evenement=null;
		$organisateur=ModelOrganisateur::select($_SESSION['id_utilisateur'],"id_utilisateur");
		
		if($organisateur){
			$evenement=ModelEvenement::selectmul($organisateur->getIdOrg(),'id_organisateur');
		     $pagetitle = "Liste des événéments Organisées";
			 if($evenement){
				$message="Voici vos événements";
			 }
			 else{ 
				$message="Pas d'événements organisées pour le moment";
	   
			   }
		    }

			else{ 
				$message="Pas d'événements organisées pour le moment";
	   
			   }

	  
		$view = "read";
		$pagetitle = "Liste des événéments Organisées";
		require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue

			
		}
		break;
		
	
		
	case "create":
		$pagetitle = "Organiser un événement";
		$view = "create";
		$tab_utilisateurs = ModelUtilisateur::selectid($_SESSION["id_utilisateur"]);// pour récupérer les données de la BD
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;
	
	case "created": // Action du formulaire de la création
			if(isset($_REQUEST['nom']) && isset($_REQUEST['date']) && isset($_REQUEST['description']) && isset($_REQUEST['lieu']) && isset($_FILES["image"]["name"])  && isset($_REQUEST["prix"])   && isset($_REQUEST["nombre"])){
			$nom = $_REQUEST["nom"];
			$prix = $_REQUEST["prix"];
			$date = $_REQUEST["date"];
			$nombre = $_REQUEST["nombre"];
			$description = $_REQUEST["description"];
			$lieu = $_REQUEST["lieu"];
		// definition chemin de l'enregistrement des images 
			$traget_img="img_event/";
			$img=$traget_img.basename($_FILES["image"]["name"]);
			move_uploaded_file($_FILES["image"]["tmp_name"],$img);
            //update de la table organisateur

			$organisateur=ModelOrganisateur::select($_SESSION['id_utilisateur'],"id_utilisateur");
			if ($organisateur)
			{   $nb_event=$organisateur->getNombre_evenement();
				$nb_event+=1;
				$tab = array(
					"nombre_evenement" =>$nb_event,
					"id_utilisateur" => $_SESSION['id_utilisateur'],
					"id_organisateur" =>$organisateur->getIdOrg()
					);	
				$id=$organisateur->getIdOrg();
				$organisateur->update($tab,$id) ;
				$organisateur=new ModelOrganisateur($nb_event,$_SESSION['id_utilisateur'],$id);
			}             
			else{
				$tab = array(
					"nombre_evenement" => 1,
					"id_utilisateur" => $_SESSION['id_utilisateur']
					);	
				ModelOrganisateur::insert($tab);
				$id=ModelOrganisateur::lastInsertId();
				$organisateur=new ModelOrganisateur(1,$_SESSION['id_utilisateur'],$id);
				
			}
           //update de la table evenement
			
			 $tab = array(
			  "nom" => $nom,
			  "date_event" => $date,
			  "description" => $description,
			  "lieu" => $lieu,
			  "image" => $img,
			  "prix_billet"=>$prix,
			  "id_organisateur"=>$id,
			  "nombre_billet"=>$nombre);

			ModelEvenement::insert($tab);
			$id_event=ModelEvenement::lastInsertId();
			$evenement = new ModelEvenement($nom, $lieu, $date, $description, $img, $id, $id_event , $prix , $nombre);
		    $pagetitle = "Evénement crée";



			$view = "created";
			require ("{$ROOT}{$DS}view{$DS}view.php");
		}
		else {
			die ("Veuillez remplir tous les champs ");
		}
	    
		break;


	case "delete":
			if(isset($_REQUEST['id'])){
				$id= $_REQUEST['id'];
				$del = ModelEvenement::selectid($id);
				$oldImageFilename=$_REQUEST["image"];
				if($del!=null){
				$del->delete($id);
				//supprimer  image de l'evenement  enregistré dans le dossier img_event 
				if (file_exists($oldImageFilename)) {
					unlink($oldImageFilename);
				}
				 header('Location: index.php?controller=evenement&action=readAll');
				}
			}
				break;
		
	
    case "update":
	 if(isset($_REQUEST['id'])){
	 	$id= $_REQUEST['id'];
	 	$oldEvent = ModelEvenement::selectid($id);
		if($oldEvent !=null){
		$pagetitle = "Modifier l'événement";
		$view = "update";
	 	require ("{$ROOT}{$DS}view{$DS}view.php");
	 }
	 }
	  break;
		
	case "updated": // Action du formulaire de modification

		if(isset($_REQUEST['nom']) && isset($_REQUEST['date']) && isset($_REQUEST['description']) && isset($_REQUEST['lieu']) && isset($_REQUEST['prix'])  && isset($_REQUEST["nombre"])){
			$oldid = $_REQUEST['id'];

			if (empty($_FILES["image"]["name"])){
				$img=$_REQUEST['oldimage'];
			}

            else{
			$traget_img="img_event/";
				$img=$traget_img.basename($_FILES["image"]["name"]);
				move_uploaded_file($_FILES["image"]["tmp_name"],$img);
				$oldImageFilename=$_REQUEST["oldimage"];
				//supprimer l'ancienne image enregistré dans le dossier img_event 
				if (file_exists($oldImageFilename)) {
					unlink($oldImageFilename);
				}
			}
			
			$tab = array(
				"nom" => $_REQUEST["nom"],
				"date_event" => $_REQUEST["date"],
				"description" => $_REQUEST["description"],
				"lieu" => $_REQUEST["lieu"],
				"image" => $img,
				"id_organisateur"=>$_REQUEST["id_org"],
			    "id_event"=>$oldid,
			    "prix_billet"=>$_REQUEST["prix"],
				"nombre_billet"=>$_REQUEST["nombre"]

		     );
			
				
			$oldEvent = ModelEvenement::selectid($oldid);
			//il faut vérifier que l'utilisateur existe dans la bdd 
			
			$UpdatedEvent = $oldEvent->update($tab,$oldid);
			$pagetitle = "Evénement modifiée avec succès";
			$view = "updated";
			require (("{$ROOT}{$DS}view{$DS}view.php"));
			
			}
			else{
				die('veuillez remplir tous les champs');
				}
			break;


	case "achat":
		$pagetitle = "Achat Billet";
		$view = "achat";
		$evenement = ModelEvenement::selectid($_REQUEST["id"]);// pour récupérer les données de la BD
		if($evenement->getNombre_billet()==0){
			$pagetitle = "Achat Billet";
			$view = "Sold_out";
		}
		require ("{$ROOT}{$DS}view{$DS}view.php");
		break;


		case "recherche":
			$pagetitle = "Programme";
			$view = "readAll";
			$lieu=$_REQUEST["lieu"];
			$alert="Pas d'événement dans cette région pour le moment";
			$tab_ev = ModelEvenement::selectmul($lieu,'lieu');
			require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
			break;


	}
?>