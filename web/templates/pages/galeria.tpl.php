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
        div#galeria {margin: 0 auto; width: 620px;}
        div.kep { display: inline-block; }
        div.kep img { width: 200px; }
    </style>
    <style type="text/css">
        label { display: block; }
    </style>
</head>
<body style="color: black;">
    <br>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
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
    <div id="galeria">
        <?php
        arsort($kepek);
        foreach($kepek as $fajl => $datum)
        {
        ?>
            <div class="kep">
                <a href="<?php echo $MAPPA.$fajl ?>">
                    <img src="<?php echo $MAPPA.$fajl ?>">
                </a>            
                <p>Név:  <?php echo $fajl; ?></p>
                <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
