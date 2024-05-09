<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<style>
	.bg{
		background-image: url("images/bg.webp");
		background-size: cover;
		background-position: center top;
		color: #ffffff;
	}
	</style>
</head>
<body class= "bg">
	<header class="header text-dark">
		<h1 class="jumbotron text-center" style="margin-bottom:0"><?= $fejlec['cim'] ?></h1>
		<?php if (isset($fejlec['motto'])) { ?><h2 class="jumbotron text-center" style="margin-bottom:0"><?= $fejlec['motto'] ?></h2><?php } ?>
		<?php if(isset($_SESSION['login'])) { ?>Bejelentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong><?php } ?>
	</header>


	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<?php foreach ($oldalak as $url => $oldal) { ?>
					<?php if ((!isset($_SESSION['login']) && $oldal['menun'][0]) || (isset($_SESSION['login']) && $oldal['menun'][1])) { ?>
						<li class="nav-item<?= (($oldal == $keres) ? ' active' : '') ?>">
							<a class="nav-link" href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
								<?= $oldal['szoveg'] ?>
							</a>
						</li>
					<?php } ?>
					<?php } ?>
				</ul>
			</div>
  		</div>
	</nav>

	<div id="content">
		<?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
	</div>

    <footer class="fixed-bottom" style="color: black;">
        <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
    </footer>
</body>
</html>
