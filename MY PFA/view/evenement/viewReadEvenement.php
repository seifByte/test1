 <?php
 echo $message;
 if($evenement){
	echo "<div class='event-container'>";
 foreach ($evenement as $event){
	echo "<div class='event-card'>";
			echo "<p class='title'>".ucfirst($event->getNom())."</p>";
			echo "<img src='".$event->getImage()."'>";
      echo " <p>Lieu :".$event->getLieu()."</p>";
			echo "<p>Date : ".date('d/m/Y', strtotime($event->getDate()))."</p>";;
      echo " <p>Description: ".substr($event->getDescription(),0,10)."... <a href='#' class='read-more' data-description='".$event->getDescription()."'>Read more</a></p>";


	$id=$event->getId_event();
	$image=$event->getImage();
	

	    	echo "<div class='button-container'>";

				echo '<div class= updt><a href="index.php?controller=evenement&action=update&id='.$id.'">
						Modifier  </a>
					</div> ';
				echo '<div class= supp><a href="index.php?controller=evenement&action=delete&id='.$id.'&image='.$image.'">
						Supprimer </a>
					</div> ';

		     echo "</div>";
	        echo "</div>";
	
  }
  echo "</div>";
}
	
?>



<div class="modal" id="description-modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p id="description-modal-text"></p>
  </div>
</div>


<script>
  // récupérer le modal
  var modal = document.getElementById("description-modal");

  // récupérer le button qui ouve le modal
  var btn = document.getElementsByClassName("read-more");

  // récuperer le span close
  var span = document.getElementsByClassName("close")[0];

  // quand l'utilisateur clique sur le boutton read more le modal s'ouvre
  for (var i = 0; i < btn.length; i++) {
    btn[i].onclick = function() {
      var description = this.getAttribute('data-description');
      document.getElementById("description-modal-text").innerHTML = description;
      modal.style.display = "block";
    }
  }


  //quand l'utilisateur clique sur x le modal se ferme
  span.onclick = function() {
    modal.style.display = "none";
  }

  // quand le modal clique en dehors du modal il se ferme 
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>


