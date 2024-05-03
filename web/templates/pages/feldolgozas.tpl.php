<!DOCTYPE html>
<html>
    <head>
        <title>Kapcsolat ürlap</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($uzenet)) { ?>
            <h1><?= $uzenet ?></h1>
            <?php if($ujra) { ?>
                <a href="index.php?oldal=kapcsolat">Próbálja újra!</a>
            <?php } ?>
        <?php } ?>
    </body>  
</html>