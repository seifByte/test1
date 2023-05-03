<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href='./CSS/stylesheet.css' />
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<?php


if(isset($_SESSION['admin'])) {
  
  require_once($ROOT.$DS."view".$DS."headeradmin.php");
  
} else {

  require_once($ROOT.$DS."view".$DS."header.php");

}

// Déterminer la vue adéquate

/*  Si $controleur='voiture' et $view='readAll',
 alors $filepath=".../view/voiture/"
       $filename="viewReadAllVoiture.php";
 et on charge '.../view/voiture/viewReadAllVoiture.php'
$filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}";  */

// détermine le chemin de la vue en fonction du controller qu'on utilise
$filepath = $ROOT.$DS."view".$DS.$controller.$DS;

// détermine le nom du fichier
$filename = "view".ucfirst($view).ucfirst($controller).'.php'; 


require_once($filepath.$filename);

require_once($ROOT.$DS."view".$DS."footer.php");
?>
</body>
</html>