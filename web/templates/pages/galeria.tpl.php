<?php
      
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false)
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK))
                $kepek[$fajl] = filemtime($MAPPA.$fajl);            
        }
    closedir($olvaso);
    
?>

<?php
    $uzenet = array();   

    if (isset($_POST['kuld'])) {
        foreach($_FILES as $fajl) {
            if ($fajl['error'] == 4);
            elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
                 $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
            elseif ($fajl['error'] == 1
                         or $fajl['error'] == 2
                         or $fajl['size'] > $MAXMERET) 
                 $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
            else {
                $vegsohely = $MAPPA.strtolower($fajl['name']);
                if (file_exists($vegsohely))
                    $uzenet[] = " Már létezik: " . $fajl['name'];
                else {
                    move_uploaded_file($fajl['tmp_name'], $vegsohely);
                    $uzenet[] = ' Ok: ' . $fajl['name'];
                }
            }
        }        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        label { display: block; }
    </style>
    <style>
        .img-fluid{
            max-width: 75%; 
            height: auto;
        }
        p{
            border-radius:5px;
            width: 250px
        }
    </style>

</head>
<body style="color: black;">
    <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <?php if(isset($_SESSION['login'])) { ?>
                        <h1>Feltöltés a galériába:</h1>
                        <?php
                            if (!empty($uzenet))
                            {
                                echo '<ul>';
                                foreach($uzenet as $u)
                                    echo "<li>$u</li>";
                                echo '</ul>';
                            }
                        ?>
                            <form action="?oldal=galeria" method="post"
                                        enctype="multipart/form-data">
                                <label>Kép:</label>
                                <input type="file" name="elso" required>
                                <br>     
                                <input type="submit" name="kuld">
                            </form>
                    <?php }?>
                </div>
            </div>
        </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            arsort($kepek);
            foreach($kepek as $fajl => $datum)
            {
            ?>
                <div class="col-lg-4 col-md-6 col-12 text-center">
                    <a href="<?php echo $MAPPA.$fajl ?>">
                        <img src="<?php echo $MAPPA.$fajl ?>" class="img-fluid" alt="Responsive image">
                    </a>            
                    <p class="bg-success" style="display: inline-block"><strong>Név:  <?php echo $fajl; ?></strong></p>
                    <br>
                    <p class="bg-success" style="display: inline-block"><strong>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></strong></p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
