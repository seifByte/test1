
<!-- Formulaire d'inscription -->
<form method="POST" action="index.php?controller=utilisateur&action=created" >
  <fieldset>
     <legend> Inscription </legend> 
	 <p>
     <label for="nom">Nom</label> :
     <input type="text" id="nom"  name="nom" placeholder="Nom" required>
     </p> 
	 <p>
		 <label for="prénom">Prénom</label> :
		 <input type="text" name="prénom" id="prénom"  placeholder="Prénom" required>
	  </p> 
	 <p>
     <label for="adr">Adresse email</label> :
     <input type='email' name="adresse" id="adr" placeholder="Adresse email" required/>
     </p>
     <p>
     <label for="mdp">Mot de passe</label> :
     <input  type="text" name="mot_de_passe" id="mdp" placeholder="Mot de passe"  min="8" required/>
     </p>  
	 <p>
     <input type="submit"  value="Inscription"/> 
	 </p>
   </fieldset> 
</form>

