<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="/styles.css" />
	<title><?php echo $title; ?></title>
</head>

<body>
<div class="application_container">

<header>
<div class="inner_container">
<div class="company_header">
	<h1>The Room Rental <br> Company</h1>
	</div>
		<?php if (isset($_SESSION['username'])): ?>
		<li><a href="/logout">Log out</a></li>
		<?php require('admin/admin-panel.php') ?>
		<?php else: ?>
		<li><a href="/">Log in</a></li>
		<?php endif; ?>
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