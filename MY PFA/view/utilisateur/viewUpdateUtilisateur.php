<?php
$id=$up->getId();
?>
	
<!-- Formulaire de modification -->
<form method="POST" action="index.php?controller=utilisateur&action=updated&id=<?=$id?>">
  <fieldset>
     <legend>Modification du compte </legend>
	 <p>
		<label for="nom">Nom</label> :
		<input type="text" id="nom"   value= "<?=$up->getNom()?>"  name="nom" placeholder="Nom" required >
     </p> 
	 <p>
		 <label for="n">Prénom</label> :
		 <input name="prénom" id="prénom"   value= "<?=$up->getPrenom()?>"  placeholder="Prénom" required>
	  </p> 
	 <p>
		<label for="adr">Adresse email</label> :
		<input name="adresse" id="adr" value= "<?=$up->getEmail()?>" placeholder="Adresse email" readonly required/>
     </p>
     <p>
		<label for="mdp">Mot de passe</label> :
		<input  type="text" name="mot_de_passe" id="mdp" value= "<?=$up->getMot_de_passe()?>" placeholder="Mot de passe"  min="8" required/>
     </p>   
	 
	 <p>
		<input  type="submit" value="Envoyer" /> 
		<a href="index.php?controller=utilisateur&action=delete&id=<?=$id?>"><input type="button" value=" <?php if (isset($_SESSION["admin"])) echo "Supprimer  compte"; else echo "Supprimer mon compte";?>"></a>
		<a href="index.php?controller=evenement"><input type="button"  value="annuler"/></a>

	 </p>

	
	 
   </fieldset> 
</form>
