<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register - Pigeonhole</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	/* CSS Reset START */

	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td,
	article, aside, canvas, details, embed, 
	figure, figcaption, footer, header, hgroup, 
	menu, nav, output, ruby, section, summary,
	time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}
	/* HTML5 display-role reset for older browsers */
	article, aside, details, figcaption, figure, 
	footer, header, hgroup, menu, nav, section {
		display: block;
	}
	body {
		line-height: 1;
	}
	ol, ul {
		list-style: none;
	}
	blockquote, q {
		quotes: none;
	}
	blockquote:before, blockquote:after,
	q:before, q:after {
		content: '';
		content: none;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

/* CSS Reset END */

	body {
		background-color: #806666;
		color: #fff;
		font-family: "lev";
		font-size: 14px;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	@font-face {
		font-family: "lev";
		src: url('../../assets/fonts/levserif.otf');
	}

	h1, h2, h3, h4 {
		font-family: "lev";
	}

	.container {
		margin: 0 auto;
		width: 507px;
	}

	header {
		margin-top: 20px;
	}

	form {
		margin-top: 30px;
		margin-left: 90px;
	}

	input[type=text], input[type=password] {
		border: 2px solid #df7619;
		height: 40px;
		width: 300px;
		font-family: "lev";
		font-size: 22px;
		color: #806666;
		padding-left: 10px;

	}

	input[type=submit] {
		background: rgb(128,102,102); /* Old browsers */
		background: -moz-linear-gradient(top,  rgba(128,102,102,1) 0%, rgba(71,57,57,1) 99%, rgba(40,32,32,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(128,102,102,1)), color-stop(99%,rgba(71,57,57,1)), color-stop(100%,rgba(40,32,32,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(128,102,102,1) 0%,rgba(71,57,57,1) 99%,rgba(40,32,32,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(128,102,102,1) 0%,rgba(71,57,57,1) 99%,rgba(40,32,32,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(128,102,102,1) 0%,rgba(71,57,57,1) 99%,rgba(40,32,32,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(128,102,102,1) 0%,rgba(71,57,57,1) 99%,rgba(40,32,32,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#806666', endColorstr='#282020',GradientType=0 ); /* IE6-9 */
		width: 312px;
		height: 60px;
		border: 1px solid black;
		border-radius: 7px;
		font-family: "lev";
		font-size: 24px;
		color: #fff;
		
	}

	header img {
		width: 400px;
		margin-left: 40px;
	}

	strong {
		text-shadow: 1px 1px 1px #333;
	}


	h1 {
		font-size: 48px;
		line-height: 90px;
		color: #df7619;
		text-shadow: 1px 1px 3px #222;
	}



	
	</style>
</head>
<body>

<div class="container">
	<header>

	</header>
	<section>
		
		<h1>Create an Employee</h1>
		<?php echo form_open('register/employee'); ?>
		<br />
		<strong>Employee ID:</strong><br />
		<?php echo form_input('employeeId', ''); ?><br /><br />
		<strong>Start Date:</strong><br />
		<?php echo form_input('startDate', date('Y-m-d')); ?><br /><br />
		<strong>E-Mail Address:</strong><br />
		<?php echo form_input('email', ''); ?><br /><br />
		<strong>First Name:</strong><br />
		<?php echo form_input('firstName', ''); ?><br /><br />
		<strong>Last Name:</strong><br />
		<?php echo form_input('lastName', ''); ?><br /><br />
		<?php echo form_submit('register', 'Register'); ?>
		<?php echo form_close(); ?>



	</section>
</div>

</body>
</html>