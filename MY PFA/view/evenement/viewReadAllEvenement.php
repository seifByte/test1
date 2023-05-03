<?php
			$lieux = array(
						'Ariana',
						'Béja',
						'Ben Arous',
						'Bizerte',
						'Gabès',
						'Gafsa',
						'Jendouba',
						'Kairouan',
						'Kasserine',
						'Kébili',
						'Le Kef',
						'Mahdia',
						'La Manouba',
						'Médenine',
						'Monastir',
						'Nabeul',
						'Sfax',
						'Sidi Bouzid',
						'Siliana',
						'Sousse',
						'Tataouine',
						'Tozeur',
						'Tunis',
						'Zaghouan',
						'Etranger'
					);
					?>
		

	<form class="recherche" method="post" action="index.php?controller=evenement&action=recherche" >
					<label for="lieu">Choisissez un lieu :</label>
					<select  name="lieu" id="lieu">
						<?php
						foreach ($lieux as $lieu) {
							echo '<option value="'.$lieu.'"'. ($_REQUEST["lieu"] == $lieu ? "selected":"" ).'>'.$lieu.'</option>';
						}
						?>
					</select>
					<input type="submit" value="Rechercher">
	</form>
	


<?php
	
if(is_null($tab_ev)) {
	echo $alert;
}
else{
	echo "<div class='event-container'>";
	foreach ($tab_ev as $evenement){
		echo "<div class='event-card'>";
		echo "<p class='title'>".ucfirst($evenement->getNom())."</p>";
		echo "<img src='".$evenement->getImage()."'>";
		echo "<p>Lieu : ".$evenement->getLieu()."</p>";
		echo "<p>Date : ".date('d/m/Y', strtotime($evenement->getDate()))."</p>";
		echo "<p>Description : ".$evenement->getDescription()."</p>";

		if(isset($_SESSION['admin'])){

			echo "<div class='button-container'>";
				echo "<div class= 'updt'>
						<a href='index.php?controller=evenement&action=update&id=".$evenement->getId_event()."'>Modifier</a>
					</div>";
				echo '<div class= supp><a href="index.php?controller=evenement&action=delete&id='.$evenement->getId_event().'&image='.$evenement->getImage().'">
						Supprimer </a>
					</div> ';
			  echo "</div>";
		}
		else{
			
				echo "<div class='buy' >
	         				<a href='index.php?controller=evenement&action=achat&id=".$evenement->getId_event()."'> Acheter billet </a>
        			  </div>";

		
			
		}
		echo "</div>";
	}

	echo "</div>";

		}
 	
?>