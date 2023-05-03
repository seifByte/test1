<?php
/* Les vues sont des fichiers qui contiennent du
code HTML et des echo permettant d’afficher
les variables pré-remplies par le contrôleur */

//$tab_u est un objet ModelUtilisateur donné par le controllerUtilisateur
	foreach ($tab_u as $u){
	  echo "<p> Nom : ".$u->getNom()." ".$u->getPrenom()."</p>";
	 
	  $id=$u->getId();
	  
	 echo "<div class='button-container user'>
			<div class= 'updt'>
				<a href='index.php?controller=utilisateur&action=update&id=$id'> Modifier </a>
			</div>

				<div class= 'supp'>
					<a href='index.php?controller=utilisateur&action=delete&id=$id'> Supprimer </a>
				</div>
			</div>
			<hr/>";
	}
?>

