<?php // index.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Webpack</title>
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/minamoto-webpack/dist/css/style.css">
</head>
<body class="">
<div id="root" class="root">
	<header class="header">
		<h1 role="banner"><a href="" rel="home">Webpack</a></h1>
		<nav role="navigation">
			<ul>
				<li><a href="#">Test 1</a></li>
				<li><a href="#">Test 2</a></li>
				<li><a href="#">Test 3</a></li>
			</ul>
		</nav>
	</header>
	<main id="mian" class="main" role="main">
		<h1>Test heading</h1>
		<h2>This is H2 heading</h2>
		{% block content %}Sorry, no content.{% endblock %}
	</main>
	<footer class="footer">
		<p>Footer</p>
	</footer>
</div><!-- #root.root -->
<script src="/wp-content/themes/minamoto-webpack/dist/js/main.bundle.js"></script>
<script src="/wp-content/themes/minamoto-webpack/dist/js/style.bundle.js"></script>
</body>
</html>