

<table>
  <thead>
    <tr>
      <th>Commande ID</th>
      <th>Prix total</th>
      <th>Date commande</th>
      <th>Evenement ID</th>
      <th>Nom de l'evenement</th>
      <th>Prix du billet</th>
      <th>Quantité</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($infos as $info){

        $id_commande=$info->getId_commande();
        $id_event=$info->getId_event();
        $commande=ModelCommande::selectid($id_commande);
        $evenement=ModelEvenement::selectid($id_event);
    ?>
      <tr>
        <td><?php echo $info->getId_commande(); ?></td>
        <td><?php echo $commande->getPrix_total(); ?></td>
        <td><?php echo $commande->getDate_commande(); ?></td>
        <td><?php echo $evenement->getId_event(); ?></td>
        <td><?php echo $evenement->getNom(); ?></td>
        <td><?php echo $evenement->getPrix_billet(); ?></td>
        <td><?php echo $info->getQuantite(); ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
