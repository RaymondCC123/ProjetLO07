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
                            exit("L'étudiant " . $_GET['id'] . " n'existe pas");
                        } else {
                            echo ("L'étudiant " . $_GET['id'] . " existe");
                        }
                    }

                    check_etuID();
                    print'<br>-------------------------------------------------<br>';

                    //check if the cursus exists or not 
                    function check_cursus_label() {
                        $sql_cursus_label_exist = "SELECT * FROM `cursus` WHERE `etu` =" . $_GET['id'] . "";
                        $result = $GLOBALS['conn']->query($sql_cursus_label_exist);
                        if (!$result->num_rows) {
                            echo ("Le cursus de " . $_GET['id'] . " n'existe pas<br>");
                            new_cursus();
                        } else {
                            echo ("Le cursus de " . $_GET['id'] . " existe");
                        }
                    }

                    check_cursus_label();
                    print'<br>-------------------------------------------------<br>';

                    // insert un nouveau cursus to the table 'cursus'                    
                    function new_cursus() {
                        $sql_new_cursus = "insert into cursus(label, etu) values(NULL, " . $_GET['id'] . ")";
                        if ($GLOBALS['conn']->query($sql_new_cursus) === TRUE) {
                            echo "Mais un nouveau cursus pour " . $_GET['id'] . " vient d'être créé";
                        } else {
                            echo "Error: " . $sql2 . "<br>" . $conn->error;
                        }
                    }

                    // insert data to the table "ele_formation"
                    $sql3 = "INSERT INTO `ele_formation` "
                            . "(`cursus_label`, `s_seq`, `s_label`, `sigle`, `categorie`, `affectation`, `utt`, `profil`, `credit`, `resultat`) "
                            . "VALUES ((SELECT cursus.label from cursus WHERE cursus.etu=" . $_GET['id'] . " ORDER BY cursus.label DESC LIMIT 1), '" . $_GET['sem_seq']
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
