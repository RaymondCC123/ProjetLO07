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
        //database
        $databasehost = "localhost";
        $databasename = "projet_lo07";        
        $databaseusername = "root";
        $databasepassword = "123456";

        // connect to the base donnees
        $conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected successfully<br>";
        }
        print'<br>-------------------------------------------------<br>';
        
        
        //list out one cursus
        $liste_cursus=""
        ?>
    </body>
</html>
