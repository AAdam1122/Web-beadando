<?php
if (isset($_SESSION['login'])) {
    try {

        $dbh = new PDO('mysql:host=localhost;dbname=web', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');


        $sqlSelect = "SELECT uzenet FROM kapcsolat WHERE nev = :nev";
        $stmt = $dbh->prepare($sqlSelect);
        $stmt->execute(array(':nev' => $_SESSION['login']));
        $messages = $stmt->fetchAll(PDO::FETCH_COLUMN);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}