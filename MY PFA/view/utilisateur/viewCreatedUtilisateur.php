<?php
echo '<p>Bienvenue '.$u->getNom().' '.$u->getPrenom().'</p>';
echo "<p><a href='index.php?controller=utilisateur&action=connect'>Se connecter</a> </p>" ;
echo "<p> Page d'acceuil <a href='index.php?controller=evenement&action=readAll>Vers la page  </a> </p>" ;
?>