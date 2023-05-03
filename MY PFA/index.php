<?php
// __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
$ROOT = __DIR__;

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;

$controleur_default = "evenement" ;

if(!isset($_REQUEST['controller']))
				//$controller récupère $controller_default;
				$controller=$controleur_default;
			else 
				// recupère l'action passée dans l'URL
				$controller = $_REQUEST['controller'];

				
switch ($controller) {
			case "evenement" :
				require ("{$ROOT}{$DS}controller{$DS}controllerEvenement.php");
				break;


			case "billet" :
				require ("{$ROOT}{$DS}controller{$DS}controllerBillet.php");
				break;
				
			case "information" :
				require ("{$ROOT}{$DS}controller{$DS}controllerInformation.php");
				break;



			case "administrateur" :
					require ("{$ROOT}{$DS}controller{$DS}controllerAdministrateur.php");
					break;
				
			 case "utilisateur" :
				require ("{$ROOT}{$DS}controller{$DS}controllerUtilisateur.php");
				break;	

			case "commande" :
				require ("{$ROOT}{$DS}controller{$DS}controllerCommande.php");
				break;	

			case "billet" :
				require ("{$ROOT}{$DS}controller{$DS}controllerBillet.php");
				break;	
				
			case "default" :
				require ("{$ROOT}{$DS}controller{$DS}controllerUtilisateur.php");
				break;
}
?>