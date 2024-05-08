<?php if(isset($row)) { ?>
    <?php if($row) { ?>
        <h1 style="color: black;">Bejelentkezett:</h1>
        <span style="color: black;">Azonosító: <strong><?= $row['id'] ?></strong><br><br></span>
        <span style="color: black;">Név: <strong><?= $row['csaladi_nev']." ".$row['uto_nev'] ?></strong></span>
    <?php } else { ?>
        <h1 style="color: black;">A bejelentkezés nem sikerült!</h1>
        <a href="?oldal=belepes" style="color: black;">Próbálja újra!</a>
    <?php } ?>
<?php } ?>
<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
