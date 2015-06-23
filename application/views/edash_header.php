<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard - Pigeonhole</title>
	<link rel="stylesheet" type="text/css" href="../../assets/js/jquery-ui/jquery-ui.css" />
	<style type="text/css">

	</style>
</head>
<body>

<div class="container">
	<header>
		<div id="logo">
			<img src='../../assets/images/logo.png' />
		</div>
		<div id="user-data">
			<h2>Welcome, <?php echo $_SESSION['efirstName']; ?></h2>
			<a href='logout'><h4 class='logout'>Logout</h4></a>
		</div>
	</header>
</div>