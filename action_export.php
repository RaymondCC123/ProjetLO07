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
}


// export a un csv

$f = fopen('php://memory', 'w');

//select info_etu in the SQL
$select_info_etu = "SELECT * FROM etudiant WHERE id=" . $_GET['id_etu'] . "";
$result_info_etu = $conn->query($select_info_etu);
if ($result_info_etu->num_rows > 0) {
//echo "Select the cursus of this student successfully";
} else {
    exit("Error: " . "Ne peut pas trouver l'etudiant<br>" . $conn->error);
}
$row_info_etu = $result_info_etu->fetch_row();
// write info_etu in the CSV
$id_etu = array('ID', $row_info_etu[0], '', '', '', '', '', '', '', '');
fputcsv($f, $id_etu, ";");
$nom_etu = array('NO', $row_info_etu[1], '', '', '', '', '', '', '', '');
fputcsv($f, $nom_etu, ";");
$prenom_etu = array('PR', $row_info_etu[2], '', '', '', '', '', '', '', '');
fputcsv($f, $prenom_etu, ";");
$ad_etu = array('AD', $row_info_etu[3], '', '', '', '', '', '', '', '');
fputcsv($f, $ad_etu, ";");
$fi_etu = array('FI', $row_info_etu[4], '', '', '', '', '', '', '', '');
fputcsv($f, $fi_etu, ";");

//select info_cursus in the SQL
$select = "SELECT e.* "
        . "FROM ele_formation e, cursus c "
        . "WHERE e.cursus_label=c.label AND c.etu=" . $_GET['id_etu'] . "";
$result = $conn->query($select);
if ($result->num_rows > 0) {
//echo "Select the cursus of this student successfully";
} else {
    exit("Error: " . "Ne peut pas trouver l'etudiant ou il/elle n'a aucun cursus<br>" . $conn->error);
}


// write fields_ele_formation in the csv
$noms_fields = array(
    '==', $result->fetch_field_direct(1)->name,
    $result->fetch_field_direct(2)->name, $result->fetch_field_direct(3)->name,
    $result->fetch_field_direct(4)->name, $result->fetch_field_direct(5)->name,
    $result->fetch_field_direct(6)->name, $result->fetch_field_direct(7)->name,
    $result->fetch_field_direct(8)->name, $result->fetch_field_direct(9)->name);
fputcsv($f, $noms_fields, ";");


//write rows_ele_formation in the csv
while ($row = $result->fetch_row()) {
    $row[0] = 'EL';
    fputcsv($f, $row, ";");

//    $line = '';
//    foreach ($row as $value) {
//        if ((!isset($value) ) || ( $value == "" )) {
//            $value = "";
//        } else {
//            $value = $value . ";";
//            fputcsv($f, $line, $delimiter);
//        }
//        $line .= $value;
//    }
//    $data .= trim($line);
//    $data = substr($data, 0, strlen($data) - 1) . "\n";
}


// write "END" in the csv
$end = array('END', '', '', '', '', '', '', '', '', '');
fputcsv($f, $end, ";");

//if ($data == "") {
//    $data = "\n(0) Records Found!\n";
//}
// reset the file pointer to the start of the file
fseek($f, 0);
// tell the browser it's going to be a csv file
header('Content-Type: application/csv');
// tell the browser we want to save it instead of displaying it
header('Content-Disposition: attachment; filename=NOM_Prenom.csv;');
// make php send the generated csv lines to the browser
fpassthru($f);

//close csv
fclose($f);

//close the connection
$conn->close();
?>

