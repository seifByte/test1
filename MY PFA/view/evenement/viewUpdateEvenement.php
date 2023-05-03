<?php
$id=$oldEvent->getId_event();
$id_org=$oldEvent->getId_organisateur();
$image=$oldEvent->getImage();
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
<form method="POST"  enctype="multipart/form-data" action="index.php?controller=evenement&action=updated&id=<?=$id?>&id_org=<?=$id_org?>&oldimage=<?=$image?>">
  <fieldset>
  <legend>Modification de l'événement </legend> 
        <p>
			<label for="nom">Nom</label> :
			<input type="text" placeholder="Mon événement" value= "<?=$oldEvent->getNom() ?>" name="nom" id="nom" required/>
        </p>

        <p>
			<label for="date">Date</label> :
			<input type="date" value= "<?=$oldEvent->getDate()?>"  min="2023-05-15" max="2050-12-31"  name="date" id="date" required/>
        </p>

        <p>
       		 <label for="lieu"> Ville</label> :
                    <select  name="lieu" id="lieu" required>
                      <option value="none">- Choisir une valeur -</option>
                      <?php foreach($lieux as $lieu){ ?>
                      <option value="<?= $lieu ?>" <?php if($lieu == $oldEvent->getLieu()) echo 'selected' ?>><?= $lieu ?></option>
                      <?php } ?>
                    </select>
                    
        </p>

        <p>
          <label for="description">Description</label> :
          <input class='description-input' type="text" placeholder="Votre description" value= "<?=$oldEvent->getDescription() ?>"  name="description" id="description" required/>
        </p>
 
        <p>
          <label for="Prix">Prix de billets</label> :
          <input type="number" min=10 max=1000  placeholder="Prix" step='any' value= "<?=$oldEvent->getPrix_billet()?>" name="prix" id="prix" required/>
        </p>

        <p>
          <label for="nombre">Nombre de billets</label>  :
          <input type="number" min=10  placeholder="nombre" name="nombre" value="<?=$oldEvent->getNombre_billet()?>" id="nombre" required/> 
        </p>


        <p>
          <label for="image">Image de l'événement</label> :
          <input type="file" placeholder="image"   name="image" id="image" />
        </p>

  
        <p>
          <?php if (!empty($oldEvent->getImage())) { ?>
            <label>Image actuelle :</label><br />
            <img src="<?= $oldEvent->getImage() ?>" width="200" /><br />
          <?php } ?>
        </p>
    
        <p>
          <input type="submit" value="Envoyer" />
        </p>

	</fieldset>
</form>