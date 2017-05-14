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

        
        $select = "SELECT e.* "
                . "FROM ele_formation e, cursus c "
                . "WHERE e.cursus_label=c.label AND c.etu=" . $_GET['id_etu'] . "";
        $result = $conn->query($select);
        if ($result->num_rows > 0) {
            echo "Select the cursus of this student successfully";
        } else {
            exit("Error: " . "Can not find the student or he/she has not any cursus" . "<br>" . $conn->error);
        }
        print'<br>-------------------------------------------------<br>';

        
        $fields = $conn->field_count($result);
        print_r($fields);
        for ($i = 0; $i < $fields; $i++) {
            $finfo = $result->fetch_field_direct($i);
            $header .= $finfo->name . "\t";
        }

        while ($row = $result->fetch_row()) {
            $line = '';
            foreach ($row as $value) {
                if ((!isset($value) ) || ( $value == "" )) {
                    $value = "\t";
                } else {
                    $value = str_replace('"', '""', $value);
                    $value = '"' . $value . '"' . "\t";
                }
                $line .= $value;
            }
            $data .= trim($line) . "\n";
        }
        $data = str_replace("\r", "", $data);

        if ($data == "") {
            $data = "\n(0) Records Found!\n";
        }

        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=your_desired_name.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        print "$header\n$data";



        //close the connection
        $conn->close();
        ?>
    </body>
</html>
