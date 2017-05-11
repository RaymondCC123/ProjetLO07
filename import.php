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
        $databasetable = "ele_formation";
        $databaseusername = "root";
        $databasepassword = "";

        // connect to the base donnees
        $conn = new mysqli($databasehost, $databaseusername, $databasepassword, $databasename);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected successfully<br>";
        }
        print'<br>-------------------------------------------------<br>';

        // insert student's data to the table 'etudiant'
        $sql1 = "insert ignore into etudiant(id, nom, prenom) values(" . $student['sid'] . ", '" . $student['nom'] . "', '" . $student['prenom'] . "')";
        if ($conn->query($sql1) === TRUE) {
            echo "Student's data inserted successfully";
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
        print'<br>-------------------------------------------------<br>';

        // insert cursus data to the table 'cursus'
        $sql2 = "insert into cursus(label_cursus, etu) values('EL', " . $student['sid'] . ")";
        if ($conn->query($sql2) === TRUE) {
            echo "Cursus data inserted successfully";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
        print'<br>-------------------------------------------------<br>';

        // insert data to the table "ele_formation"
        foreach ($eles as $line) {
            print_r($line);
            echo '<br>';
            $sql3 = "INSERT INTO `ele_formation` "
                    . "(`label_cursus`, `s_seq`, `s_label`, `sigle`, `categorie`, `affectation`, `utt`, `profil`, `credit`, `resultat`) "
                    . "VALUES ('EL', '" . $line['s_seq']
                    . "', '" . $line['s_label'] . "', '" . $line['sigle']
                    . "', '" . $line['categorie'] . "', '" . $line['affectation']
                    . "', '" . $line['utt'] . "', '" . $line['profil']
                    . "', '" . $line['credit'] . "', '" . $line['resultat'] . "')";
            if ($conn->query($sql3) === TRUE) {
                echo "Element Formation data inserted successfully";
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->error;
            }
            print'<br>-------------------------------------------------<br>';
        }
        
        $conn->close();

        /* $row = 1;
          if (($handle = fopen($_FILES["userfile_csv"]["name"], "r")) !== FALSE) {
          while (($data = fgetcsv($handle,100, ";")) !== FALSE) {
          $num = count($data);
          echo "<p> $num fields in line $row: <br /></p>\n";
          $row++;
          for ($c = 0; $c < $num; $c++) {
          echo $data[$c] . "<br />\n";
          }
          }
          echo $data;
          fclose($handle);
          } */

        /*

         * extract(filter_input_array(INPUT_POST));
          $fichier = $_FILES["userfile_csv"]["name"];
          if ($fichier) {//overture du fichier temporaire
          $fp = fopen($_FILES["userfile_csv"]["tmp_name"], "r");
          } else { //fichier inconnu
          ?>
          <p align="center">- Importation échouée -</p>
          <p align="center"><B>Chemin non valide</B></p>
          <?php
          exit();
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

         */
        ?>

    </body>
</html>
