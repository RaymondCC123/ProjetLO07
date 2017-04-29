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
        <title>import_action</title>
    </head>
    <body>
<?php
extract(filter_input_array(INPUT_POST));
$fichier=$_FILES["userfile_csv"]["name"];
	if ($fichier) {//overture du fichier temporaire
	$fp = fopen ($_FILES["userfile_csv"]["tmp_name"], "r");}
	else{ //fichier inconnu  
?>
		<p align="center">- Importation échouée -</p>
		<p align="center"><B>Chemin non valide</B></p>
<?php exit();} ?> 

		<p align="center">- Importation réussie -</p>

<?php //importation
while(!feof($fp)){
	$ligne = fgets($fp, 4096);
	$db = new mysqli('dev-isi.utt.fr', 'Hbm4h9VQ', 'caocheng';
	$sql =("INSERT INTO cursus(....) VALUES ('$ligne')");
	$result = $db-> query($sql);
}

fclose($fp);
?>
	
	

     
	
       
    </body>
</html>
