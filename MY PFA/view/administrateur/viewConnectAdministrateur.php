
<!-- Formulaire de connexion de l'administrateur-->
<form method="POST" action="index.php?controller=administrateur&action=connected" >
  <fieldset>
     <legend> Connexion Admin </legend> 
	  
	 <p>
     <label for="adr">Adresse email</label> :
     <input type="email" name="adresse" id="adr" placeholder="Adresse email" required/>
    </p>

     <p>
      <label for="mdp">Mot de passe</label> :
      <input  type="password" name="mot_de_passe" id="mdp" placeholder="Mot de passe" minlength="8" required/>
     </p>  

	 <p>
     <input type="submit"  value="Se connecter"/> 
	 </p>


   </fieldset> 

   </fieldset>


</form>
