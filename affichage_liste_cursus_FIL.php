<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                <div class="col-sm-2 sidenav">

                </div>
                <div class="col-sm-8 text-left"> 
                    <h1>Votre cursus en filière de branche</h1>
                    <hr>
                </div>

            </div>
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

            <table class="table table-bordered">
                <thead>
                    <tr>                        
                        <th></th>            
                        <th>CS</th>
                        <th>TM</th>
                        <th>ST</th>
                        <th>EC</th>
                        <th>ME</th>
                        <th>CT</th>
                        <th>NPML</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT distinct s_label  FROM ele_formation WHERE affectation='FCBR';";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        print_r($result_cs);
                        while ($row = $result->fetch_assoc()) {
                            $semestre = $row["s_label"];
                            echo '
                            <tr>
                            <td>' . $semestre . '</td>';

                            $result_cs = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
                                AND categorie='CS' AND affectation='FCBR';");

                            echo '<td>';
                            while ($row_cs = $result_cs->fetch_assoc()) {
                                echo '                            
                                sigle : ' . $row_cs["sigle"] . ' | UTT : ' . $row_cs["utt"] . ' | '
                                . 'Profil : ' . $row_cs["profil"] . ' | Credit : ' . $row_cs["credit"] . ' | '
                                . 'Resultat : ' . $row_cs["resultat"] . '<br>';
                            }
                            echo '</td>';


                            $result_tm = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
                                AND categorie='TM' AND affectation='FCBR';");
                            echo '<td>';
                            while ($row_tm = $result_tm->fetch_assoc()) {
                                echo '                            
                                sigle : ' . $row_tm["sigle"] . ' | UTT : ' . $row_tm["utt"] . ' | '
                                . 'Profil : ' . $row_tm["profil"] . ' | Credit : ' . $row_tm["credit"] . ' | '
                                . 'Resultat : ' . $row_tm["resultat"] . '<br>';
                            }
                            echo '</td>';


                            $result_st = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
                                AND categorie='ST' AND affectation='FCBR';");
                            echo '<td>';
                            while ($row_st = $result_st->fetch_assoc()) {
                                echo '                            
                                sigle : ' . $row_st["sigle"] . ' | UTT : ' . $row_st["utt"] . ' | '
                                . 'Profil : ' . $row_st["profil"] . ' | Credit : ' . $row_st["credit"] . ' | '
                                . 'Resultat : ' . $row_st["resultat"] . '<br>';
                            }
                            echo '</td>';


                            $result_ec = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
                                AND categorie='EC' AND affectation='FCBR';");
                            echo '<td>';
                            while ($row_ec = $result_ec->fetch_assoc()) {
                                echo '                            
                                sigle : ' . $row_ec["sigle"] . ' | UTT : ' . $row_ec["utt"] . ' | '
                                . 'Profil : ' . $row_ec["profil"] . ' | Credit : ' . $row_ec["credit"] . ' | '
                                . 'Resultat : ' . $row_ec["resultat"] . '<br>';
                            }
                            echo '</td>';


                            $result_me = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
                                AND categorie='ME' AND affectation='FCBR';");
                            echo '<td>';
                            while ($row_me = $result_me->fetch_assoc()) {
                                echo '                            
                                sigle : ' . $row_me["sigle"] . ' | UTT : ' . $row_me["utt"] . ' | '
                                . 'Profil : ' . $row_me["profil"] . ' | Credit : ' . $row_me["credit"] . ' | '
                                . 'Resultat : ' . $row_me["resultat"] . '<br>';
                            }
                            echo '</td>';


                            $result_ct = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
                                AND categorie='CT' AND affectation='FCBR';");
                            echo '<td>';
                            while ($row_ct = $result_ct->fetch_assoc()) {
                                echo '                            
                                sigle : ' . $row_ct["sigle"] . ' | UTT : ' . $row_ct["utt"] . ' | '
                                . 'Profil : ' . $row_ct["profil"] . ' | Credit : ' . $row_ct["credit"] . ' | '
                                . 'Resultat : ' . $row_ct["resultat"] . '<br>';
                            }
                            echo '</td>';


                            $result_npml = $conn->query("SELECT  *  FROM ele_formation WHERE s_label='$semestre'
                                AND categorie='CT' AND affectation='FCBR';");
                            echo '<td>';
                            while ($row_npml = $result_npml->fetch_assoc()) {
                                echo '                            
                                sigle : ' . $row_npml["sigle"] . ' | UTT : ' . $row_npml["utt"] . ' | '
                                . 'Profil : ' . $row_npml["profil"] . ' | Credit : ' . $row_npml["credit"] . ' | '
                                . 'Resultat : ' . $row_npml["resultat"] . '<br>';
                            }
                            echo '</td>';


                            echo '</tr>';
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>

                </tbody>
            </table>            
        </div>
    </body>
</html>
