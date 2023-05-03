

<h1 class="titre-achat">Confirmation de commande</h1>
<?php $id=$evenement->getId_event();?>
<table>
    <tr>
        <th>ID de commande</th>
        <th>Nom evenement</th>
        <th>Prix total</th>
        <th>État</th>
        <th>Date de commande</th>
        <th>Nombres de billets</th>
    </tr>
    <tr>
        <td><?php echo $commande->getId_commande(); ?></td>
        <td><?php echo $evenement->getNom(); ?></td>
        <td><?php echo $commande->getPrix_total(); ?> DT</td>
        <td><?php echo $commande->getEtat(); ?></td>
        <td><?php echo $commande->getDate_commande(); ?></td>
        <td><?php echo $_POST["nb_billets"] ; ?></td>
       
    </tr>
</table>
                <div class='button-container'>
                    <form method="post" action="index.php?controller=commande&action=delete&id_commande=<?php echo $commande->getId_commande(); ?>">
                        <input type="submit"  name="annuler_commande" value="Annuler la commande"> 
                    </form>

                    <form method="post" action="index.php?controller=billet&action=confirmer_commande&id_commande=<?= $commande->getId_commande(); ?>&nbr_billets=<?=$_POST["nb_billets"]?>&id_event=<?=$id?>">
                        <input type="submit"  name="confirmer_commande" value="Confirmer la commande">
                    </form>
                </div>