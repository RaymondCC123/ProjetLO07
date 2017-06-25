<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html >
    <head>
        <title>import</title>
        <meta charset="utf-8">
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
                        <h1>Import</h1>
                        <hr>
                    </div>
                    <?php
                    $csv = $_FILES['csv'];
                    $csv = file_get_contents($csv['tmp_name']);
                    $csv = addslashes($csv);

                    $attri = array('s_seq', 's_label', 'sigle', 'categorie', 'affectation', 'utt', 'profil', 'credit', 'resultat');


                    $preg = "/[\r,\n,\r\n,;]+/";

                    $data = preg_split("$preg", $csv);

                    $i = 0;
                    $j = 0;
                    $student = array();
                    $eles = array();
                    while ($data[$i] != 'END' && $i <= count($data)) {
                        switch ($data[$i]) {
                            case 'ID':
                                $student['sid'] = $data[++$i];
                                break;
                            case 'NO':
                                $student['nom'] = $data[++$i];
                                break;
                            case 'PR':
                                $student['prenom'] = $data[++$i];
                                break;
                            case 'AD':
                                $student['admission'] = $data[++$i];
                                break;
                            case 'FI':
                                $student['filiere'] = $data[++$i];
                                break;
                            case 'EL':
                                for ($k = 0; $k < count($attri); $k++) {
                                    $att = $attri[$k];
                                    $eles[$j]["$att"] = $data[++$i];
                                }
                                $j++;
                                break;
                        }
                        $i++;
                    }

                    if ($data[$i] != 'END' || $j == 0) {
                        throw new Exception("ERROR_CSV_FORMAT_ERROR", 1);
                    }

                    print_r($student);
                    print'<br>-------------------------------------------------<br>';
                    //print_r($eles);
                    print'<br>-------------------------------------------------<br>';

                    //database
                    $databasehost = "localhost";
                    $databasename = "projet_lo07";
                    $databaseusername = "root";
                    $databasepassword = "123456";

                    // connect to the base donnees
                    $conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);
                    if ($conn->connect_error) {
                        die("Echec de la connexion: " . $conn->connect_error);
                    } else {
                        echo "Connexion réussie<br>";
                    }
                    print'<br>-------------------------------------------------<br>';

                    // insert student's data to the table 'etudiant'
                    $sql1 = "insert ignore into etudiant(id, nom, prenom, admission, filiere) values(" . $student['sid'] . ", '" . $student['nom'] . "', "
                            . "'" . $student['prenom'] . "', '" . $student['admission'] . "', '" . $student['filiere'] . "')";
                    if ($conn->query($sql1) === TRUE) {
                        echo "Etudiant inséré correctement dans la base de données";
                    } else {
                        echo "Error: " . $sql1 . "<br>" . $conn->error;
                    }
                    print'<br>-------------------------------------------------<br>';

                    // insert cursus data to the table 'cursus'
                    $sql2 = "insert into cursus(label, etu) values(NULL, " . $student['sid'] . ")";
                    if ($conn->query($sql2) === TRUE) {
                        echo "Cursus inséré correctement dans la base de données";
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }
                    print'<br>-------------------------------------------------<br>';

                    // insert data to the table "ele_formation"
                    foreach ($eles as $line) {
                        print_r($line);
                        echo '<br>';
                        $sql3 = "INSERT INTO `ele_formation` "
                                . "(`cursus_label`, `s_seq`, `s_label`, `sigle`, `categorie`, `affectation`, `utt`, `profil`, `credit`, `resultat`) "
                                . "VALUES ((SELECT cursus.label from cursus WHERE cursus.etu=" . $student['sid'] . " ORDER BY cursus.label DESC LIMIT 1), '" . $line['s_seq']
                                . "', '" . $line['s_label'] . "', '" . $line['sigle']
                                . "', '" . $line['categorie'] . "', '" . $line['affectation']
                                . "', '" . $line['utt'] . "', '" . $line['profil']
                                . "', '" . $line['credit'] . "', '" . $line['resultat'] . "')";
                        if ($conn->query($sql3) === TRUE) {
                            echo "Element de Formation inséré correctement dans la base de données";
                        } else {
                            echo "Error: " . $sql3 . "<br>" . $conn->error;
                        }
                        print'<br>-------------------------------------------------<br>';
                    }

                    $conn->close();
                    ?>
                </div>

                <div class="col-sm-2 sidenav" style="background-color:MediumTurquoise;">
                </div>
            </div>
        </div>



    </body>
</html>
