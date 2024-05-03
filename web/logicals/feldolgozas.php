<?php
if (isset($_POST['name'])&& isset($_POST['message'])) {
    try {

        $dbh = new PDO('mysql:host=localhost;dbname=web', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sqlInsert = "INSERT INTO kapcsolat (nev, email, uzenet) VALUES (:nev, :email, :uzenet)";
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->execute(array(':nev' => $_POST['name'], ':email' => $_POST['email'], ':uzenet' => $_POST['message']));

        $count = $stmt->rowCount();
        if ($count) {
            $newid = $dbh->lastInsertId();
            $uzenet = "Az űrlap beküldése sikeres volt.";
            $ujra = false;
        } else {
            $uzenet = "Az ürlap beküldése nem sikerült.";
            $ujra = true;
        }
    } catch (PDOException $e) {
        $uzenet = "Hiba: " . $e->getMessage();
        $ujra = true;
    }
}
?>