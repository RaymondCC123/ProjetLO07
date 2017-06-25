<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		  <a href="accueil.html"><img border="0" src="logo-utt.jpg" width="120" height="60"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li><a href="affichage_liste_cursus_index.html">Liste des cursus</a></li>
			<li><a href="form_etu.html">Nouveau profil</a></li>
			<li><a href="nouveau_cursus_choix.html">Nouveau cursus</a></li>
			<li><a href="form_export.html">Exporter</a></li>
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
					<h1>Ajouter un profil d'étudiant</h1>
					<hr>
				  </div>
	<?php
	// connect to the base donnees
	$databasehost = "localhost";
	$databasename = "projet_lo07";        
	$databaseusername = "root";
	$databasepassword = "123456";
	
	$conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);
	if ($conn->connect_error) {
		die("La connexion a échoué " . $conn->connect_error);
	} else {
		echo "Connection réussie<br>";
	}
	print'<br>-------------------------------------------------<br>';

	// insert student's data to the table 'etudiant'
	$sql1 = "insert ignore into etudiant(id, nom, prenom, admission, filiere) values(" . $_GET['id'] . ", '" . $_GET['nom'] . "', "
			. "'" . $_GET['prenom'] . "', '" . $_GET['ad'] . "', '" . $_GET['fi'] . "')";
	if ($conn->query($sql1) === TRUE) {
		echo "L'étudiant a été inséré correctement dans la base de données";
	} else {
		echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
	print'<br>-------------------------------------------------<br>';
	?>
	
	<p ALIGN="CENTER"> <a class="btn btn-primary btn-lg btn-block" href="nouveau_cursus_choix.html" role="button">Ajouter un cursus associé à ce numéro d'étudiant</a> 
	</p>
	
			</div>
			
			<div class="col-sm-2 sidenav" style="background-color:MediumTurquoise;">
			</div>
		  </div>
		</div>
    </body>
</html>

