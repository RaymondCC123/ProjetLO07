<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // connect to the base donnees
        $databasehost = "localhost";
        $databasename = "projet_lo07";
        $databaseusername = "root";
        $databasepassword = "123456";
        $conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected successfully<br>";
        }
        print'<br>-------------------------------------------------<br>';

        //check if the student exists or no 
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
            echo "Cursus data inserted successfully";
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
            echo "Element Formation data inserted successfully";
        } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        }
        print'<br>-------------------------------------------------<br>';
        ?>
    </body>
</html>
