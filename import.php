<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
        /*
        extract(filter_input_array(INPUT_POST));
        $fichier = $_FILES["userfile_csv"]["name"];
        if ($fichier) {//overture du fichier temporaire
            $fp = fopen($_FILES["userfile_csv"]["tmp_name"], "r");
        } else { //fichier inconnu  
            ?>
            <p align="center">- Importation échouée -</p>
            <p align="center"><B>Chemin non valide</B></p>
            <?php exit();
        }
        ?> 

        <p align="center">- Importation réussie -</p>

        <?php
        //importation
        while (!feof($fp)) {
            $ligne = fgets($fp, 4096);
            $db = new mysqli('dev-isi.utt.fr', 'Hbm4h9VQ', 'caocheng';
            $sql = ("INSERT INTO cursus(....) VALUES ('$ligne')");
            $result = $db->query($sql);
        }

        fclose($fp);        
         */
        ?>






        <?php
        
       
        $databasehost = "localhost";
        $databasename = "projet_lo07";
        $databasetable = "cursus";
        $databaseusername = "caocheng";
        $databasepassword = 123;
        $csvfile = $_FILES["userfile_csv"]["name"];

        // check the exitance of the CSV file
        if (!file_exists($csvfile)) {
            die("File not found. Make sure you specified the correct path.");
        }

        // connect to the base donnees
        $conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected successfully<br>";
        }

        // write the SQL 
        $sql = "LOAD DATA LOCAL INFILE '$csvfile'  
                INTO TABLE cursus 
                FIELDS TERMINATED BY ';' 
                LINES TERMINATED BY '\r\n'
                IGNORE 6 LINES";

        // excuter the SQL 
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>

    </body>
</html>
