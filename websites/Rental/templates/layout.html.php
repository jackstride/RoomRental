<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="/styles.css" />
	<title><?php echo $title; ?></title>
</head>

<body>
	<header>
		<?php if (isset($_SESSION['username'])): ?>
		<li><a href="/logout">Log out</a>
		<li><a href="/admin">Admin Panel</a>
		</li>
		<?php else: ?>
		<li><a href="/">Log in</a></li>
		<?php endif; ?>

	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/furniture">Our Furniture</a></li>
		</ul>
	</nav>
	<main class="<?= $class ?>">
		<?= $output ?>
	</main>
	<footer>

	</footer>
</body>

</html>