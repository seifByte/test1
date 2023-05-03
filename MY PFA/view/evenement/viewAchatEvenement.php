
<h1 class="titre-achat">Acheter un billet pour <?php echo $evenement->getNom(); ?></h1>

    <p>Prix du billet : <?php echo $evenement->getPrix_billet(); ?> DT </p>

    <p>Nombre de billets restants : <?php echo $evenement->getNombre_billet();?></p>

      
    <!--si l'utilisateur n'est pas connecté il va etre rediriger vers la page de connexion-->
     
    <?php 
            $action = '';
            if(isset($_SESSION['id_utilisateur'])) {
                $action = "index.php?controller=commande&action=commande&id=".$evenement->getId_event();
            } else {
                $action = 'index.php?controller=utilisateur&action=connect';
            }
    ?>


<form method="post" action="<?php echo $action; ?>">
        <label for="nb_billets">Nombre de billets :</label>
        
        <input type="number"  name="nb_billets" min=1  max="<?php echo $evenement->getNombre_billet(); ?>"  id="nb_billets" required>

        <input class='achat' type="submit" name="acheter_billet" value="Acheter billet">
    </form>