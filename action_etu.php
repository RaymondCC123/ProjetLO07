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

        // insert student's data to the table 'etudiant'
        $sql1 = "insert ignore into etudiant(id, nom, prenom, admission, filiere) values(" . $_GET['id'] . ", '" . $_GET['nom'] . "', "
                . "'" . $_GET['prenom'] . "', '" . $_GET['ad'] . "', '" . $_GET['fi'] . "')";
        if ($conn->query($sql1) === TRUE) {
            echo "Student's data inserted successfully";
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
        print'<br>-------------------------------------------------<br>';
        ?>
    </body>
</html>
