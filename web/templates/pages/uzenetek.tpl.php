<?php
if(isset($_SESSION['login'])) {
    $defaultName = $_SESSION['csn']." ".$_SESSION['un'];
} else {
    $defaultName = "Vendég";
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

</head>
<body style="color: black;">
    <div class="container">
    <?php
    if (count($messages) > 0) {
        echo "<h2>Itt láthatóak az üzeneteid:<br></h2>";
        foreach ($messages as $index => $message) {
            $backgroundColor = $index % 2 === 0 ? 'rgba(211, 231, 151, 0.6)' : 'rgba(151, 231, 151, 0.6)';
            echo "<p style=\"background-color: $backgroundColor;\"><strong>$message</strong></p>";
        }
        } else {
            echo "<h1><a href='index.php?oldal=kapcsolat'>Nincs beküldött üzenete</a></h1>";
        }
    ?>
    </div>
</body>
</html>
