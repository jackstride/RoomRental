<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="/styles.css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<title><?php echo $title; ?></title>
</head>

<body>
<div class="application_container">

<header>
	<div class="inner_container">
	<?php if (isset($_SESSION['username'])): ?>
	<?php require('admin/admin-panel.php') ?>
	<?php endif; ?>
			<div class="nav_footer">
				<?php if (isset($_SESSION['username'])): ?>
				<li><a href="/logout">Log out</a></li>
				<?php else: ?>
				<li><a href="/">Log in</a></li>
				<?php endif; ?>
			</div>
	</div>

		
	</header>



	<main class="admin">
	<div class="template_heading">
	<h2><?= $heading ?></h2>
	
	<?= $buttons['enabled'] ?
	"<ul>"
	 . "<li><a href='" . $buttons['addLink'] . "'>Add</a></li>" 
	: null ?>
	
	</div>
	<section class="right">
		<?= $output ?>
		</section>
	</main>
	</div>	
	<footer>
	</footer>
</body>

</html>