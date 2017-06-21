<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>ajouter cursus</title>
		
		
		<style>
	/* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 3000px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
		
    </head>
    <body>

		<nav class="navbar navbar-inverse" style="background-color:Black;">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <img border="0" src="logo-utt.jpg" width="120" height="60">
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="#">Liste des cursus</a></li>
					<li><a href="form_etu.html">Nouveau profil</a></li>
					<li><a href="#">Règlement des études</a></li>
				   </ul>
				</div>
			  </div>
			</nav>
		  
			<div class="container-fluid text-center">    
				<div class="row content">
					<div class="col-sm-2 sidenav" style="background-color:MediumTurquoise;">
					</div>
			
					<div class="col-sm-8 text-left"> 
					 <div class="text-left"> 
						<h1>Ajouter un cursus</h1>
						<hr>
					  </div>	
	
	
	<?php
	// connection  la base de donnees
	$databasehost = "localhost";
	$databasename = "projet_lo07";
	$databaseusername = "root";
	$databasepassword = "123456";
	$conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);
	if ($conn->connect_error) {
		die("Echec de la connexion: " . $conn->connect_error);
	} else {
		echo "La connexion a réussi<br>";
	}
	print'<br>-------------------------------------------------<br>';

	//check if the student exists or not 
	function check_etuID() {
		$sql_etuID_exist = "SELECT * FROM `etudiant` WHERE `id` =" . $_GET['id'] . "";            
		$result = $GLOBALS['conn']->query($sql_etuID_exist);
		if (!$result->num_rows) {
			exit("L'étudiant n'existe pas");
		}
	}
	check_etuID();
	print'<br>-------------------------------------------------<br>';


	// insert cursus data to the table 'cursus'
	$sql2 = "insert into cursus(label, etu) values(NULL, " . $_GET['id'] . ")";
	if ($conn->query($sql2) === TRUE) {
		echo "Les élements du cursus ont été insérés";
	} else {
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
	print'<br>-------------------------------------------------<br>';


	// insert data to the table "ele_formation"
	$sql3 = "INSERT INTO `ele_formation` "
			. "(`cursus_label`, `s_seq`, `s_label`, `sigle`, `categorie`, `affectation`, `utt`, `profil`, `credit`, `resultat`) "
			. "VALUES ((SELECT cursus.label from cursus WHERE cursus.etu=" . $_GET['id'] . "), '" . $_GET['sem_seq']
			. "', '" . $_GET['label'] . "', '" . $_GET['sigle']
			. "', '" . $_GET['categorie'] . "', '" . $_GET['affectation']
			. "', '" . $_GET['utt'] . "', '" . $_GET['profil']
			. "', '" . $_GET['credit'] . "', '" . $_GET['resultat'] . "')";
	if ($conn->query($sql3) === TRUE) {
		echo "L'élement de formation a été inséré correctement";
	} else {
		echo "Error: " . $sql3 . "<br>" . $conn->error;
	}
	print'<br>-------------------------------------------------<br>';
	?>
		
				</div>
			
			<div class="col-sm-2 sidenav" style="background-color:MediumTurquoise;">
			</div>
		  </div>
		</div>
    </body>
</html>
