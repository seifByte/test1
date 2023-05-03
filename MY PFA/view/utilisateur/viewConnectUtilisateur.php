
<!-- Formulaire de connexion-->
<form method="POST" action="index.php?controller=utilisateur&action=connected" >
  <fieldset>
     <legend> Connexion </legend> 
	  
	 <p>
     <label for="adr">Adresse email</label> :
     <input type='email' name="adresse" id="adr" placeholder="Adresse email" required/>
    </p>

     <p>
     <label for="mdp">Mot de passe</label> :
     <input  type="password" name="mot_de_passe" id="mdp" placeholder="Mot de passe" minlength="8" required/>
     </p>  

	 <p>
     <input type="submit"  value="Se connecter"/> 
	   <a href="index.php?controller=utilisateur&action=create"><input type="button"  value="S'inscrire"/></a>
  
	 </p>

  

   </fieldset> 

   </fieldset>


</form>



