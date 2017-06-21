<!DOCTYPE html>
<html lang="en">
    <head>
        <title>affichage liste</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>


            function R_ACTUEL_BR() {
                var alert = "";//global var
                //window.alert(alert);
                R01();
                R02();
                R03();
                R04();
                R05();
                R06();
                R07();
                R08();
                R09();
                R10();
                R11();
                R12();
                R13();
                R14();
                if (alert === "") {
                    window.alert("Felicitations ! Vous pouvez obtenir votre diplome de l'UTT maintenant !");
                } else {
                    window.alert(alert);
                }

                function R01() {

                    var total_cs_tm_TCBR = (document.getElementById('total_cs_tm_TCBR').innerHTML);
                    var seuil_cs_tm_TCBR = 54;
                    if (total_cs_tm_TCBR < seuil_cs_tm_TCBR) {
                        alert += "Vous n'avez pas assez de credits CS ou TM pour valider votre Tronc Commun de Branche\n";
                        return false;
                    }
                }

                function R02() {
                    var total_cs_tm_FCBR = document.getElementById("total_cs_tm_FCBR").innerHTML;
                    var seuil_cs_tm_FCBR = 30;
                    if (total_cs_tm_FCBR < seuil_cs_tm_FCBR) {
                        alert += "Vous n'avez pas assez de credits CS ou TM pour valider votre Filiere\n";
                        return false;
                    }
                }

                function R03() {
                    var total_cs_TCBR = parseInt(document.getElementById("total_cs_TCBR").innerHTML, 10);
                    var total_cs_FCBR = parseInt(document.getElementById("total_cs_FCBR").innerHTML, 10);
                    var total_cs_BR = total_cs_TCBR + total_cs_FCBR;
                    var seuil_cs_BR = 30;
                    if (total_cs_BR < seuil_cs_BR) {
                        alert += "Vous n'avez pas assez de credits CS pour valider votre Branche\n";
                        return false;
                    }
                }

                function R04() {
                    var total_cs_TCBR = parseInt(document.getElementById("total_tm_TCBR").innerHTML, 10);
                    var total_cs_FCBR = parseInt(document.getElementById("total_tm_FCBR").innerHTML, 10);
                    var total_tm_BR = total_cs_TCBR + total_cs_FCBR;
                    var seuil_tm_BR = 30;
                    if (total_tm_BR < seuil_tm_BR) {
                        alert += "Vous n'avez pas assez de credits TM pour valider votre Branche\n";
                        return false;
                    }
                }

                function R05() {
                    var total_st_TCBR = document.getElementById("total_st_TCBR").innerHTML;
                    var seuil_st_TCBR = 30;
                    if (total_st_TCBR < seuil_st_TCBR) {
                        alert += "Vous n'avez pas encore faites le stage pour valider votre Tronc Commun de Branche\n";
                        return false;
                    }
                }

                function R06() {
                    var total_st_FCBR = document.getElementById("total_st_FCBR").innerHTML;
                    var seuil_st_FCBR = 30;
                    if (total_st_FCBR < seuil_st_FCBR) {
                        alert += "Vous n'avez pas encore faites le stage pour valider votre Filiere\n";
                        return false;
                    }
                }

                function R07() {
                    var total_ec_TCBR = parseInt(document.getElementById("total_ec_TCBR").innerHTML, 10);
                    var total_ec_FCBR = parseInt(document.getElementById("total_ec_FCBR").innerHTML, 10);
                    var total_ec_BR = total_ec_TCBR + total_ec_FCBR;
                    var seuil_ec_BR = 12;
                    if (total_ec_BR < seuil_ec_BR) {
                        alert += "Vous n'avez pas assez de credits EC pour valider votre Branche\n";
                        return false;
                    }
                }

                function R08() {
                    var total_me_TCBR = parseInt(document.getElementById("total_me_TCBR").innerHTML, 10);
                    var total_me_FCBR = parseInt(document.getElementById("total_me_FCBR").innerHTML, 10);
                    var total_me_BR = total_me_TCBR + total_me_FCBR;
                    var seuil_me_BR = 4;
                    if (total_me_BR < seuil_me_BR) {
                        alert += "Vous n'avez pas assez de credits ME pour valider votre Branche\n";
                        return false;
                    }
                }

                function R09() {
                    var total_ct_TCBR = parseInt(document.getElementById("total_ct_TCBR").innerHTML, 10);
                    var total_ct_FCBR = parseInt(document.getElementById("total_ct_FCBR").innerHTML, 10);

                    var total_ct_BR = total_ct_TCBR + total_ct_FCBR;
                    var seuil_ct_BR = 4;
                    if (total_ct_BR < seuil_ct_BR) {
                        alert += "Vous n'avez pas assez de credits CT pour valider votre Branche\n";
                        return false;
                    }
                }

                function R10() {
                    var total_me_ct_BR = parseInt(document.getElementById("total_me_TCBR").innerHTML, 10)
                            + parseInt(document.getElementById("total_me_FCBR").innerHTML, 10)
                            + parseInt(document.getElementById("total_ct_TCBR").innerHTML, 10)
                            + parseInt(document.getElementById("total_ct_FCBR").innerHTML, 10);
                    //window.alert(total_me_ct_BR);        
                    var seuil_me_ct_BR = 16;
                    if (total_me_ct_BR < seuil_me_ct_BR) {
                        alert += "Vous n'avez pas assez de credits ME ou CT pour valider votre Branche\n";
                        return false;
                    }
                }

                function R11() {
                    var total_cs_tm_BR_utt = parseInt(document.getElementById("total_cs_tm_TCBR_utt").innerHTML, 10)
                            + parseInt(document.getElementById("total_cs_tm_FCBR_utt").innerHTML, 10);
                    //window.alert(total_cs_tm_BR_utt);                       
                    var seuil_cs_tm_BR_utt = 60;
                    if (total_cs_tm_BR_utt < seuil_cs_tm_BR_utt) {
                        alert += "Vous n'avez pas assez de credits CS ou TM à l'UTT pour valider votre Branche\n";
                        return false;
                    }
                }

                function R12() {
                    var total_se = parseInt(document.getElementById("total_se_TC").innerHTML, 10)
                            + parseInt(document.getElementById("total_se_TCBR").innerHTML, 10)
                            + parseInt(document.getElementById("total_se_FCBR").innerHTML, 10);
                    //window.alert(total_se);
                    if (total_se === 0) {
                        alert += "Vous n'avez pas passé le SE\n";
                        return false;
                    }
                }

                function R13() {
                    var total_npml = parseInt(document.getElementById("total_npml_TC").innerHTML, 10)
                            + parseInt(document.getElementById("total_npml_TCBR").innerHTML, 10)
                            + parseInt(document.getElementById("total_npml_FCBR").innerHTML, 10);
                    //window.alert(total_npml);                    
                    if (total_npml === 0) {
                        alert += "Vous n'avez pas passé le NPML\n";
                        return false;
                    }
                }

                function R14() {
                    var total = parseInt(document.getElementById("total_TC").innerHTML, 10)
                            + parseInt(document.getElementById("total_TCBR").innerHTML, 10)
                            + parseInt(document.getElementById("total_FCBR").innerHTML, 10);
                    //window.alert(total);                                                            
                    var seuil = 180;
                    if (total < seuil) {
                        alert += "Vous n'avez pas assez de credits pour obtenir le diplôme de l'UTT\n";
                        return false;
                    }
                }
            }

            function R_FUTUR_BR() {
                var alert = "";//global var                

                var total_cs_tm_TCBR = parseInt(document.getElementById('total_cs_tm_TCBR').innerHTML, 10);
                var seuil_cs_tm_TCBR = 42;//R01

                var total_cs_tm_FCBR = parseInt(document.getElementById("total_cs_tm_FCBR").innerHTML, 10);
                var seuil_cs_tm_FCBR = 18;//R02

                var total_cs_TCBR = parseInt(document.getElementById("total_cs_TCBR").innerHTML, 10);
                var total_cs_FCBR = parseInt(document.getElementById("total_cs_FCBR").innerHTML, 10);
                var total_cs_BR = total_cs_TCBR + total_cs_FCBR;
                var seuil_cs_BR = 24;//R03

                var total_tm_TCBR = parseInt(document.getElementById("total_tm_TCBR").innerHTML, 10);
                var total_tm_FCBR = parseInt(document.getElementById("total_tm_FCBR").innerHTML, 10);
                var total_tm_BR = total_tm_TCBR + total_tm_FCBR;
                var seuil_tm_BR = 24;//R04

                var total_cs_tm_BR = total_cs_tm_TCBR + total_cs_tm_FCBR;
                var seuil_cs_tm_BR = 84;//R05

                var total_st_TCBR = document.getElementById("total_st_TCBR").innerHTML;
                var seuil_st_TCBR = 30;//R06

                var total_st_FCBR = document.getElementById("total_st_FCBR").innerHTML;
                var seuil_st_FCBR = 30;//R07

                var total_ec_TCBR = parseInt(document.getElementById("total_ec_TCBR").innerHTML, 10);
                var total_ec_FCBR = parseInt(document.getElementById("total_ec_FCBR").innerHTML, 10);
                var total_ec_BR = total_ec_TCBR + total_ec_FCBR;
                var seuil_ec_BR = 12;//R08

                var total_me_TCBR = parseInt(document.getElementById("total_me_TCBR").innerHTML, 10);
                var total_me_FCBR = parseInt(document.getElementById("total_me_FCBR").innerHTML, 10);
                var total_me_BR = total_me_TCBR + total_me_FCBR;
                var seuil_me_BR = 4;//R09

                var total_ct_TCBR = parseInt(document.getElementById("total_ct_TCBR").innerHTML, 10);
                var total_ct_FCBR = parseInt(document.getElementById("total_ct_FCBR").innerHTML, 10);
                var total_ct_BR = total_ct_TCBR + total_ct_FCBR;
                var seuil_ct_BR = 4;//R10

                var total_me_ct_BR = total_me_BR + total_ct_BR;
                var seuil_me_ct_BR = 16;//R11

                var total_cs_tm_BR_utt = parseInt(document.getElementById("total_cs_tm_TCBR_utt").innerHTML, 10)
                        + parseInt(document.getElementById("total_cs_tm_FCBR_utt").innerHTML, 10);
                var seuil_cs_tm_BR_utt = 60;//R12

                var total_se = parseInt(document.getElementById("total_se_TC").innerHTML, 10)
                        + parseInt(document.getElementById("total_se_TCBR").innerHTML, 10)
                        + parseInt(document.getElementById("total_se_FCBR").innerHTML, 10);//R13

                var total_npml = parseInt(document.getElementById("total_npml_TC").innerHTML, 10)
                        + parseInt(document.getElementById("total_npml_TCBR").innerHTML, 10)
                        + parseInt(document.getElementById("total_npml_FCBR").innerHTML, 10);//R14

                var total = parseInt(document.getElementById("total_TC").innerHTML, 10)
                        + parseInt(document.getElementById("total_TCBR").innerHTML, 10)
                        + parseInt(document.getElementById("total_FCBR").innerHTML, 10);
                var seuil = 180;//R15

                R01();
                R02();
                R03();
                R04();
                R05();
                R06();
                R07();
                R08();
                R09();
                R10();
                R11();
                R12();
                R13();
                R14();
                R15();
                if (alert === "") {
                    window.alert("Felicitations ! Vous pouvez obtenir votre diplome de l'UTT maintenant !");
                } else {
                    window.alert(alert);
                }

                function R01() {
                    if (total_cs_tm_TCBR < seuil_cs_tm_TCBR) {
                        alert += "Vous n'avez pas assez de credits CS ou TM pour valider votre Tronc Commun de Branche\n";
                    }
                }

                function R02() {
                    if (total_cs_tm_FCBR < seuil_cs_tm_FCBR) {
                        alert += "Vous n'avez pas assez de credits CS ou TM pour valider votre Filiere\n";
                    }
                }

                function R03() {
                    if (total_cs_BR < seuil_cs_BR) {
                        alert += "Vous n'avez pas assez de credits CS pour valider votre Branche\n";
                    }
                }

                function R04() {
                    if (total_tm_BR < seuil_tm_BR) {
                        alert += "Vous n'avez pas assez de credits TM pour valider votre Branche\n";
                    }
                }

                function R05() {
                    if (total_st_TCBR < seuil_st_TCBR) {
                        alert += "Vous n'avez pas encore faites le stage pour valider votre Tronc Commun de Branche\n";
                    }
                }

                function R06() {
                    if (total_st_TCBR < seuil_st_TCBR) {
                        alert += "Vous n'avez pas encore faites le stage pour valider votre Tronc Commun de Branche\n";
                    }
                }

                function R07() {
                    if (total_st_FCBR < seuil_st_FCBR) {
                        alert += "Vous n'avez pas encore faites le stage pour valider votre Filiere\n";
                    }
                }

                function R08() {
                    if (total_ec_BR < seuil_ec_BR) {
                        alert += "Vous n'avez pas assez de credits EC pour valider votre Branche\n";
                    }
                }

                function R09() {
                    if (total_me_BR < seuil_me_BR) {
                        alert += "Vous n'avez pas assez de credits ME pour valider votre Branche\n";
                    }
                }

                function R10() {
                    if (total_ct_BR < seuil_ct_BR) {
                        alert += "Vous n'avez pas assez de credits CT pour valider votre Branche\n";
                    }
                }

                function R11() {
                    if (total_me_ct_BR < seuil_me_ct_BR) {
                        alert += "Vous n'avez pas assez de credits ME ou CT pour valider votre Branche\n";
                    }
                }

                function R12() {
                    if (total_cs_tm_BR_utt < seuil_cs_tm_BR_utt) {
                        alert += "Vous n'avez pas assez de credits CS ou TM à l'UTT pour valider votre Branche\n";
                    }
                }

                function R13() {
                    if (total_se === 0) {
                        alert += "Vous n'avez pas passé le SE\n";
                    }
                }

                function R14() {
                    if (total_npml === 0) {
                        alert += "Vous n'avez pas passé le NPML\n";
                    }
                }

                function R15() {
                    if (total < seuil) {
                        alert += "Vous n'avez pas assez de credits pour obtenir le diplôme de l'UTT\n";
                    }
                }
            }
        </script>

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
        <nav class="navbar navbar-inverse">
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
                <div class="col-sm-1 sidenav" style="background-color:MediumTurquoise;">
                </div>

                <div class="col-sm-10 text-left"> 
                    <div class="text-left"> 
                        <h1>Votre cursus en tronc commun</h1>
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
                        echo "Connection à BD réussie<br>";
                    }
                    ?>
                    <div class="container">
                        <h2>Tronc Commun</h2>

                        <?php
                        $id_Etu = $_POST["text_idETU1"];
                        echo 'Etudiant : ' . $id_Etu . '<br>';
                        echo 'Les suivants sont tous votre cursus<br>';
                        echo '-----------------------------------------------------------------------------<br>';
                        $result_etu_cursus = $conn->query("SELECT  *  FROM cursus where etu='$id_Etu';");
                        if ($result_etu_cursus->num_rows > 0) {
                            // output data of each row
                            while ($row_cursus = $result_etu_cursus->fetch_assoc()) {
                                $cursus_label = $row_cursus["label"];
                                echo '    
				<table class="table table-bordered">                    
				<button onclick="R_ACTUEL_BR()">R_ACTUEL_BR</button>
				<button onclick="R_FUTUR_BR()">R_FUTUR_BR</button>
				<thead>
				<tr>                        
					<th>Cursus_label : ' . $cursus_label . '</th>            
					<th>CS</th>
					<th>TM</th>
					<th>ST</th>
					<th>EC</th>
					<th>ME</th>
					<th>CT</th>
					<th>HP</th>
					<th>NPML</th>
					<th>SE</th>

				</tr>
				</thead>
				<tbody>
				';

                                $sql = "SELECT distinct s_label  FROM ele_formation WHERE affectation='TC' "
                                        . "AND cursus_label='$cursus_label';";
                                $result = $conn->query($sql);
                                $total_cs = 0;
                                $total_cs_utt = 0;
                                $total_tm = 0;
                                $total_tm_utt = 0;
                                $total_st = 0;
                                $total_ec = 0;
                                $total_me = 0;
                                $total_ct = 0;
                                $total_hp = 0;
                                $total_npml = 0;
                                $total_se = 0;
                                if ($result->num_rows > 0) {

                                    // output data of each row                        
                                    while ($row = $result->fetch_assoc()) {
                                        $semestre = $row["s_label"];
                                        echo '
						<tr>
						<td>' . $semestre . '</td>';

                                        $result_cs = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='CS' AND affectation='TC' AND cursus_label='$cursus_label';");

                                        echo '<td>';
                                        while ($row_cs = $result_cs->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_cs["sigle"] . ' | UTT : ' . $row_cs["utt"] . ' | '
                                            . 'Profil : ' . $row_cs["profil"] . ' | Credit : ' . $row_cs["credit"] . ' | '
                                            . 'Resultat : ' . $row_cs["resultat"] . '<br><br>';
                                            $total_cs += $row_cs["credit"];
                                            if ($row_cs["utt"] == 'Y') {
                                                $total_cs_utt += $row_cs["credit"];
                                            }
                                        }
                                        echo '</td>';


                                        $result_tm = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='TM' AND affectation='TC' AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_tm = $result_tm->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_tm["sigle"] . ' | UTT : ' . $row_tm["utt"] . ' | '
                                            . 'Profil : ' . $row_tm["profil"] . ' | Credit : ' . $row_tm["credit"] . ' | '
                                            . 'Resultat : ' . $row_tm["resultat"] . '<br><br>';
                                            $total_tm += $row_tm["credit"];
                                            if ($row_tm["utt"] == 'Y') {
                                                $total_tm_utt += $row_tm["credit"];
                                            }
                                        }
                                        echo '</td>';


                                        $result_st = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='ST' AND affectation='TC' AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_st = $result_st->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_st["sigle"] . ' | UTT : ' . $row_st["utt"] . ' | '
                                            . 'Profil : ' . $row_st["profil"] . ' | Credit : ' . $row_st["credit"] . ' | '
                                            . 'Resultat : ' . $row_st["resultat"] . '<br><br>';
                                            $total_st += $row_st["credit"];
                                        }
                                        echo '</td>';


                                        $result_ec = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='EC' AND affectation='TC' AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_ec = $result_ec->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_ec["sigle"] . ' | UTT : ' . $row_ec["utt"] . ' | '
                                            . 'Profil : ' . $row_ec["profil"] . ' | Credit : ' . $row_ec["credit"] . ' | '
                                            . 'Resultat : ' . $row_ec["resultat"] . '<br><br>';
                                            $total_ec += $row_ec["credit"];
                                        }
                                        echo '</td>';


                                        $result_me = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='ME' AND affectation='TC' AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_me = $result_me->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_me["sigle"] . ' | UTT : ' . $row_me["utt"] . ' | '
                                            . 'Profil : ' . $row_me["profil"] . ' | Credit : ' . $row_me["credit"] . ' | '
                                            . 'Resultat : ' . $row_me["resultat"] . '<br><br>';
                                            $total_me += $row_me["credit"];
                                        }
                                        echo '</td>';


                                        $result_ct = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='CT' AND affectation='TC' AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_ct = $result_ct->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_ct["sigle"] . ' | UTT : ' . $row_ct["utt"] . ' | '
                                            . 'Profil : ' . $row_ct["profil"] . ' | Credit : ' . $row_ct["credit"] . ' | '
                                            . 'Resultat : ' . $row_ct["resultat"] . '<br><br>';
                                            $total_ct += $row_ct["credit"];
                                        }
                                        echo '</td>';


                                        $result_hp = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='HP' AND affectation='TC' AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_hp = $result_hp->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_hp["sigle"] . ' | UTT : ' . $row_hp["utt"] . ' | '
                                            . 'Profil : ' . $row_hp["profil"] . ' | Credit : ' . $row_hp["credit"] . ' | '
                                            . 'Resultat : ' . $row_hp["resultat"] . '<br><br>';
                                            $total_hp += $row_hp["credit"];
                                        }
                                        echo '</td>';


                                        $result_npml = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='NPML' AND affectation='TC' AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_npml = $result_npml->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_npml["sigle"] . ' | UTT : ' . $row_npml["utt"] . ' | '
                                            . 'Profil : ' . $row_npml["profil"] . ' | Credit : ' . $row_npml["credit"] . ' | '
                                            . 'Resultat : ' . $row_npml["resultat"] . '<br><br>';
                                            if ($row_npml["resultat"] == 'ADM') {
                                                $total_npml++;
                                            }
                                        }
                                        echo '</td>';


                                        $result_se = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='SE' AND affectation='TC' AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_se = $result_se->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_se["sigle"] . ' | UTT : ' . $row_se["utt"] . ' | '
                                            . 'Profil : ' . $row_se["profil"] . ' | Credit : ' . $row_se["credit"] . ' | '
                                            . 'Resultat : ' . $row_se["resultat"] . '<br><br>';
                                            if ($row_se["resultat"] == 'ADM') {
                                                $total_se++;
                                            }
                                        }
                                        echo '</td>';


                                        echo '</tr>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $total_cs_tm_TC = $total_cs + $total_tm;
                                $total_cs_tm_TC_utt = $total_cs_utt + $total_tm_utt;
                                $total_TC = $total_cs + $total_tm + $total_st + $total_ec + $total_me + $total_ct;
                                echo '
						<tr>
						<td>Total TC</td>
						<td>' . $total_cs . '</td>
						<td>' . $total_tm . '</td>
						<td>' . $total_st . '</td>
						<td>' . $total_ec . '</td>
						<td>' . $total_me . '</td>
						<td>' . $total_ct . '</td>
						<td></td>
						<td id="total_npml_TC">' . $total_npml . '</td>
						<td id="total_se_TC">' . $total_se . '</td>                                                            
						</tr>
						
						<tr>
						<td>CS + TM (TC)</td>
						<td>' . $total_cs_tm_TC . '</td>
						<td>CS + TM (TC) [UTT]</td>
						<td id="total_cs_tm_TC_utt">' . $total_cs_tm_TC_utt . '</td>
						<td>Total TC</td>
						<td id="total_TC">' . $total_TC . '</td>
						</tr>
						';
                            }
                        }
                        echo '        
		</tbody>
		</table>
		';
                        ?>
                    </div>


                    <div class="text-left"> 
                        <h1>Votre cursus en tronc commun de branche</h1>
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
                        echo "Connection à BD réussie<br>";
                    }
                    ?>
                    <div class="container">
                        <h2>Tronc Commun de Branche</h2>

                        <?php
                        //$id_Etu = $_POST["etu1"];
                        echo 'Etudiant : ' . $id_Etu . '<br>';
                        echo 'Les suivants sont tous votre cursus<br>';
                        echo '-----------------------------------------------------------------------------<br>';
                        $result_etu_cursus = $conn->query("SELECT  *  FROM cursus where etu='$id_Etu';");
                        if ($result_etu_cursus->num_rows > 0) {
                            // output data of each row
                            while ($row_cursus = $result_etu_cursus->fetch_assoc()) {
                                $cursus_label = $row_cursus["label"];

                                echo '    
			
			<table class="table table-bordered">
			<button onclick="R_ACTUEL_BR()">R_ACTUEL_BR</button>
			<button onclick="R_FUTUR_BR()">R_FUTUR_BR</button>                    
			<thead>
			<tr>                        
				<th>Cursus_label : ' . $cursus_label . '</th>            
				<th>CS</th>
				<th>TM</th>
				<th>ST</th>
				<th>EC</th>
				<th>ME</th>
				<th>CT</th>
				<th>HP</th>
				<th>NPML</th>
				<th>SE</th>

			</tr>
			</thead>
			<tbody>
			';

                                $sql = "SELECT distinct s_label  FROM ele_formation WHERE affectation='TCBR' "
                                        . "AND cursus_label='$cursus_label';";
                                $result = $conn->query($sql);
                                $total_cs = 0;
                                $total_cs_utt = 0;
                                $total_tm = 0;
                                $total_tm_utt = 0;
                                $total_st = 0;
                                $total_ec = 0;
                                $total_me = 0;
                                $total_ct = 0;
                                $total_hp = 0;
                                $total_npml = 0;
                                $total_se = 0;

                                if ($result->num_rows > 0) {

                                    // output data of each row                        
                                    while ($row = $result->fetch_assoc()) {
                                        $semestre = $row["s_label"];
                                        echo '
					<tr>
					<td>' . $semestre . '</td>';


                                        $result_cs = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='CS' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_cs = $result_cs->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_cs["sigle"] . ' | UTT : ' . $row_cs["utt"] . ' | '
                                            . 'Profil : ' . $row_cs["profil"] . ' | Credit : ' . $row_cs["credit"] . ' | '
                                            . 'Resultat : ' . $row_cs["resultat"] . '<br><br>';
                                            $total_cs += $row_cs["credit"];
                                            if ($row_cs["utt"] == 'Y') {
                                                $total_cs_utt += $row_cs["credit"];
                                            }
                                        }
                                        echo '</td>';


                                        $result_tm = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='TM' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_tm = $result_tm->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_tm["sigle"] . ' | UTT : ' . $row_tm["utt"] . ' | '
                                            . 'Profil : ' . $row_tm["profil"] . ' | Credit : ' . $row_tm["credit"] . ' | '
                                            . 'Resultat : ' . $row_tm["resultat"] . '<br><br>';
                                            $total_tm += $row_tm["credit"];
                                            if ($row_tm["utt"] == 'Y') {
                                                $total_tm_utt += $row_tm["credit"];
                                            }
                                        }
                                        echo '</td>';


                                        $result_st = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='ST' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_st = $result_st->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_st["sigle"] . ' | UTT : ' . $row_st["utt"] . ' | '
                                            . 'Profil : ' . $row_st["profil"] . ' | Credit : ' . $row_st["credit"] . ' | '
                                            . 'Resultat : ' . $row_st["resultat"] . '<br><br>';
                                            $total_st += $row_st["credit"];
                                        }
                                        echo '</td>';


                                        $result_ec = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='EC' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_ec = $result_ec->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_ec["sigle"] . ' | UTT : ' . $row_ec["utt"] . ' | '
                                            . 'Profil : ' . $row_ec["profil"] . ' | Credit : ' . $row_ec["credit"] . ' | '
                                            . 'Resultat : ' . $row_ec["resultat"] . '<br><br>';
                                            $total_ec += $row_ec["credit"];
                                        }
                                        echo '</td>';


                                        $result_me = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='ME' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_me = $result_me->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_me["sigle"] . ' | UTT : ' . $row_me["utt"] . ' | '
                                            . 'Profil : ' . $row_me["profil"] . ' | Credit : ' . $row_me["credit"] . ' | '
                                            . 'Resultat : ' . $row_me["resultat"] . '<br><br>';
                                            $total_me += $row_me["credit"];
                                        }
                                        echo '</td>';


                                        $result_ct = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='CT' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_ct = $result_ct->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_ct["sigle"] . ' | UTT : ' . $row_ct["utt"] . ' | '
                                            . 'Profil : ' . $row_ct["profil"] . ' | Credit : ' . $row_ct["credit"] . ' | '
                                            . 'Resultat : ' . $row_ct["resultat"] . '<br><br>';
                                            $total_ct += $row_ct["credit"];
                                        }
                                        echo '</td>';


                                        $result_hp = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='HP' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_hp = $result_hp->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_hp["sigle"] . ' | UTT : ' . $row_hp["utt"] . ' | '
                                            . 'Profil : ' . $row_hp["profil"] . ' | Credit : ' . $row_hp["credit"] . ' | '
                                            . 'Resultat : ' . $row_hp["resultat"] . '<br><br>';
                                            $total_hp += $row_hp["credit"];
                                        }
                                        echo '</td>';


                                        $result_npml = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='NPML' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_npml = $result_npml->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_npml["sigle"] . ' | UTT : ' . $row_npml["utt"] . ' | '
                                            . 'Profil : ' . $row_npml["profil"] . ' | Credit : ' . $row_npml["credit"] . ' | '
                                            . 'Resultat : ' . $row_npml["resultat"] . '<br><br>';
                                            if ($row_npml["resultat"] == 'ADM') {
                                                $total_npml++;
                                            }
                                        }
                                        echo '</td>';


                                        $result_se = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
						AND categorie='SE' AND (affectation='TCBR' or affectation='BR') 
						AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_se = $result_se->fetch_assoc()) {
                                            echo '                            
						sigle : ' . $row_se["sigle"] . ' | UTT : ' . $row_se["utt"] . ' | '
                                            . 'Profil : ' . $row_se["profil"] . ' | Credit : ' . $row_se["credit"] . ' | '
                                            . 'Resultat : ' . $row_se["resultat"] . '<br><br>';
                                            if ($row_se["resultat"] == 'ADM') {
                                                $total_se++;
                                            }
                                        }
                                        echo '</td>';


                                        echo '</tr>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $total_cs_tm_TCBR = $total_cs + $total_tm;
                                $total_cs_tm_TCBR_utt = $total_cs_utt + $total_tm_utt;
                                $total_TCBR = $total_cs + $total_tm + $total_st + $total_ec + $total_me + $total_ct;
                                echo '
					<tr>
					<td>Total TCBR</td>
					<td id="total_cs_TCBR">' . $total_cs . '</td>
					<td id="total_tm_TCBR">' . $total_tm . '</td>
					<td id="total_st_TCBR">' . $total_st . '</td>
					<td id="total_ec_TCBR">' . $total_ec . '</td>
					<td id="total_me_TCBR">' . $total_me . '</td>
					<td id="total_ct_TCBR">' . $total_ct . '</td>
					<td></td>
					<td id="total_npml_TCBR">' . $total_npml . '</td>
					<td id="total_se_TCBR">' . $total_se . '</td>
					</tr>
					
					<tr>
					<td>CS + TM (TCBR)</td>
					<td id="total_cs_tm_TCBR">' . $total_cs_tm_TCBR . '</td>                             
					<td>CS + TM (TCBR) [UTT]</td>
					<td id="total_cs_tm_TCBR_utt">' . $total_cs_tm_TCBR_utt . '</td>
					<td>Total TCBR</td>
					<td id="total_TCBR">' . $total_TCBR . '</td>
					</tr>
					';
                            }
                        }
                        echo '        
	</tbody>
	</table>
	';
                        ?>
                    </div>

                    <div class="text-left"> 
                        <h1>Votre cursus en filière de branche</h1>
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
                        echo "Connection à BD réussie<br>";
                    }
                    ?>
                    <div class="container">
                        <h2>Filiere</h2>

                        <?php
                        //$id_Etu = $_POST["etu2"];
                        echo 'Etudiant : ' . $id_Etu . '<br>';
                        echo 'Les suivants sont tous votre cursus<br>';
                        echo '-----------------------------------------------------------------------------<br>';
                        $result_etu_cursus = $conn->query("SELECT  *  FROM cursus where etu='$id_Etu';");
                        if ($result_etu_cursus->num_rows > 0) {
                            // output data of each row
                            while ($row_cursus = $result_etu_cursus->fetch_assoc()) {
                                $cursus_label = $row_cursus["label"];
                                echo '    
				<table class="table table-bordered">
				<button onclick="R_ACTUEL_BR()">R_ACTUEL_BR</button>
				<button onclick="R_FUTUR_BR()">R_FUTUR_BR</button>
				<thead>
				<tr>                        
					<th>Cursus_label : ' . $cursus_label . '</th>            
					<th>CS</th>
					<th>TM</th>
					<th>ST</th>
					<th>EC</th>
					<th>ME</th>
					<th>CT</th>
					<th>HP</th>
					<th>NPML</th>
					<th>SE</th>
				</tr>
				</thead>
				<tbody>
				';

                                $sql = "SELECT distinct s_label  FROM ele_formation WHERE affectation='FCBR' "
                                        . "AND cursus_label='$cursus_label';";
                                $result = $conn->query($sql);

                                $total_cs = 0;
                                $total_cs_utt = 0;
                                $total_tm = 0;
                                $total_tm_utt = 0;
                                $total_st = 0;
                                $total_ec = 0;
                                $total_me = 0;
                                $total_ct = 0;
                                $total_hp = 0;
                                $total_npml = 0;
                                $total_se = 0;

                                if ($result->num_rows > 0) {

                                    // output data of each row                        
                                    while ($row = $result->fetch_assoc()) {
                                        $semestre = $row["s_label"];
                                        echo '
						<tr>
						<td>' . $semestre . '</td>';


                                        $result_cs = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='CS' AND (affectation='FCBR' or affectation='BR')
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_cs = $result_cs->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_cs["sigle"] . ' | UTT : ' . $row_cs["utt"] . ' | '
                                            . 'Profil : ' . $row_cs["profil"] . ' | Credit : ' . $row_cs["credit"] . ' | '
                                            . 'Resultat : ' . $row_cs["resultat"] . '<br><br>';
                                            $total_cs += $row_cs["credit"];
                                            if ($row_cs["utt"] == 'Y') {
                                                $total_cs_utt += $row_cs["credit"];
                                            }
                                        }
                                        echo '</td>';


                                        $result_tm = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='TM' AND (affectation='FCBR' or affectation='BR')
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_tm = $result_tm->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_tm["sigle"] . ' | UTT : ' . $row_tm["utt"] . ' | '
                                            . 'Profil : ' . $row_tm["profil"] . ' | Credit : ' . $row_tm["credit"] . ' | '
                                            . 'Resultat : ' . $row_tm["resultat"] . '<br><br>';
                                            $total_tm += $row_tm["credit"];
                                            if ($row_tm["utt"] == 'Y') {
                                                $total_tm_utt += $row_tm["credit"];
                                            }
                                        }
                                        echo '</td>';


                                        $result_st = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='ST' AND (affectation='FCBR' or affectation='BR')
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_st = $result_st->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_st["sigle"] . ' | UTT : ' . $row_st["utt"] . ' | '
                                            . 'Profil : ' . $row_st["profil"] . ' | Credit : ' . $row_st["credit"] . ' | '
                                            . 'Resultat : ' . $row_st["resultat"] . '<br><br>';
                                            $total_st += $row_st["credit"];
                                        }
                                        echo '</td>';


                                        $result_ec = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='EC' AND (affectation='FCBR' or affectation='BR')
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_ec = $result_ec->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_ec["sigle"] . ' | UTT : ' . $row_ec["utt"] . ' | '
                                            . 'Profil : ' . $row_ec["profil"] . ' | Credit : ' . $row_ec["credit"] . ' | '
                                            . 'Resultat : ' . $row_ec["resultat"] . '<br><br>';
                                            $total_ec += $row_ec["credit"];
                                        }
                                        echo '</td>';


                                        $result_me = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='ME' AND (affectation='FCBR' or affectation='BR')
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_me = $result_me->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_me["sigle"] . ' | UTT : ' . $row_me["utt"] . ' | '
                                            . 'Profil : ' . $row_me["profil"] . ' | Credit : ' . $row_me["credit"] . ' | '
                                            . 'Resultat : ' . $row_me["resultat"] . '<br><br>';
                                            $total_me += $row_me["credit"];
                                        }
                                        echo '</td>';


                                        $result_ct = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='CT' AND (affectation='FCBR' or affectation='BR')
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_ct = $result_ct->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_ct["sigle"] . ' | UTT : ' . $row_ct["utt"] . ' | '
                                            . 'Profil : ' . $row_ct["profil"] . ' | Credit : ' . $row_ct["credit"] . ' | '
                                            . 'Resultat : ' . $row_ct["resultat"] . '<br><br>';
                                            $total_ct += $row_ct["credit"];
                                        }
                                        echo '</td>';


                                        $result_hp = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='HP' AND (affectation='FCBR' or affectation='BR') 
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_hp = $result_hp->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_hp["sigle"] . ' | UTT : ' . $row_hp["utt"] . ' | '
                                            . 'Profil : ' . $row_hp["profil"] . ' | Credit : ' . $row_hp["credit"] . ' | '
                                            . 'Resultat : ' . $row_hp["resultat"] . '<br><br>';
                                            $total_hp += $row_hp["credit"];
                                        }
                                        echo '</td>';


                                        $result_npml = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='NPML' AND (affectation='FCBR' or affectation='BR')
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_npml = $result_npml->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_npml["sigle"] . ' | UTT : ' . $row_npml["utt"] . ' | '
                                            . 'Profil : ' . $row_npml["profil"] . ' | Credit : ' . $row_npml["credit"] . ' | '
                                            . 'Resultat : ' . $row_npml["resultat"] . '<br><br>';
                                            if ($row_npml["resultat"] == 'ADM') {
                                                $total_npml++;
                                            }
                                        }
                                        echo '</td>';


                                        $result_se = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
							AND categorie='SE' AND (affectation='FCBR' or affectation='BR')
							AND cursus_label='$cursus_label';");
                                        echo '<td>';
                                        while ($row_se = $result_se->fetch_assoc()) {
                                            echo '                            
							sigle : ' . $row_se["sigle"] . ' | UTT : ' . $row_se["utt"] . ' | '
                                            . 'Profil : ' . $row_se["profil"] . ' | Credit : ' . $row_se["credit"] . ' | '
                                            . 'Resultat : ' . $row_se["resultat"] . '<br><br>';
                                            if ($row_se["resultat"] == 'ADM') {
                                                $total_se++;
                                            }
                                        }
                                        echo '</td>';


                                        echo '</tr>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $total_cs_tm_FCBR = $total_cs + $total_tm;
                                $total_cs_tm_FCBR_utt = $total_cs_utt + $total_tm_utt;
                                $total_FCBR = $total_cs + $total_tm + $total_st + $total_ec + $total_me + $total_ct;
                                echo '
						<tr>
						<td>Total FCBR</td>
						<td id="total_cs_FCBR">' . $total_cs . '</td>
						<td id="total_tm_FCBR">' . $total_tm . '</td>
						<td id="total_st_FCBR">' . $total_st . '</td>
						<td id="total_ec_FCBR">' . $total_ec . '</td>
						<td id="total_me_FCBR">' . $total_me . '</td>
						<td id="total_ct_FCBR">' . $total_ct . '</td>
						<td></td>
						<td id="total_npml_FCBR">' . $total_npml . '</td>
						<td id="total_se_FCBR">' . $total_se . '</td>
						</tr>
						
						<tr>
						<td>CS + TM (FCBR)</td>
						<td id="total_cs_tm_FCBR">' . $total_cs_tm_FCBR . '</td>
						<td>CS + TM (FCBR) [UTT]</td>
						<td id="total_cs_tm_FCBR_utt">' . $total_cs_tm_FCBR_utt . '</td>
						<td>Total FCBR</td>
						<td id="total_FCBR">' . $total_FCBR . '</td>
						</tr>
						';
                            }
                        }
                        echo '        
		</tbody>
		</table>
		';
                        ?>
                    </div>

                </div>

                <div class="col-sm-1 sidenav" style="background-color:MediumTurquoise;">
                </div>
            </div>
        </div>
    </body>
</html>
