<?php
/* Le contrôleur reçoit les actions de l’utilisateur, lit ou met
à jour les données à travers le modèle, puis appelle la vue
adéquate. */

$controller = "information";
// chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelInformation.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelCommande.php"); 
require_once ("{$ROOT}{$DS}model{$DS}ModelEvenement.php");


if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) 
{


 case "readAll":
		
         			$pagetitle = "Informations";
		 			$view = "readAll";
		 			session_start();
		 			$infos = ModelInformation::getsAll();//appel au modèle pour gerer la BD
		 			require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
		 			break;

	}


?>
