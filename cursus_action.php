<!DOCTYPE html>
<?php
ini_set ('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

 ?>
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>formulaire et affichage</title>
    </head>
    <body>
 <?php
	define ('USER', 'caocheng');
	define ('PASSWORD', 'Hbm4h9VQ');
	define ('HOST', 'dev-isi.utt.fr')
	define ('DB_NAME', 'caocheng');
	
	$base = mysqli_connect (HOST, USER, PASSWORD, DB_NAME) 
	or die ('impossible de se connecter :' + mysqli_connect_error());
	echo " conection ca marche";
	
?> 
     
	
       
    </body>
</html>
