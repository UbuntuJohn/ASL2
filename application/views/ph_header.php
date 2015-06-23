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
			<h2>Welcome, <?php echo $_SESSION['firstName']; ?> 
				<a href='profile/<?php echo $_SESSION['employeeId']; ?>'
					<span class='edit_profile'>Edit Profile</span>
				</a></h2>
			<h4><?php echo unix_to_human(time(), TRUE, 'us'); ?></h4>
			<a href='logout'><h4 class='logout'>Logout</h4></a>
		</div>
	</header>
</div>