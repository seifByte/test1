
<h1>MY_Event</h1>
     <header>
          
            
        <p><a  class="a_menu" href='index.php?controller=evenement'> Accueil </a></p>
        
        
        <?php
          if(empty($_SESSION['id_utilisateur'])){
              echo" <p><a class='a_menu' href='index.php?controller=utilisateur&action=connect'> Organiser </a></p>";
               }

          if(isset($_SESSION['id_utilisateur'])) { 
               $id=$_SESSION['id_utilisateur'];
               $user=ModelUtilisateur::selectid($id);
               echo "<p><a  class='a_menu' href='index.php?controller=evenement&action=create'> Organiser </a></p>";
               echo "<p><a  class='a_menu' href='index.php?controller=utilisateur&action=update&id=$id' >Mon Compte</a></p>";
               echo "<p><a  class='a_menu' href='index.php?controller=evenement&action=read&id=$id'> Mes événements</a></p>" ;
               echo "<p><a  class='a_menu' href='index.php?controller=commande&action=read'> Mes achats </a></p>";
               echo "<p><a  class='a_menu' href='index.php?controller=utilisateur&action=deconnect'> Log out </a></p>";
        } else { 
                     echo "<p><a  class='a_menu' href='index.php?controller=utilisateur&action=connect'> Se Connecter </a></p>";
         } ?>
    </p>
     </header>
<h2><?=$pagetitle?></h2>
<hr/>


