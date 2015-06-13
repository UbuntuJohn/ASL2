<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard - Pigeonhole</title>
	<link rel="stylesheet" type="text/css" href="../../assets/js/popup/dist/magnific-popup.css" />
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
		background-color: #fff;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
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

	h2 {
		color: #df7619;
		font-size: 56px;
	}

	h3 {
		color: #df7619;
		font-size: 34px;


	}

	.label {
		margin-left: 50px;
		padding-top: 60px;
		text-transform: uppercase;
	}

	h4 {
		color: #df7619;
		font-size: 28px;
		line-height: 0.3px;
		margin-top: 40px;
	}
	
	.container{
		margin: 10px;
		
	}

	#logo {
		float: right;
		
	}

	.logout {
		color: #806666;
		text-decoration: underline;
		margin-top: 60px;
	}

	.edit_profile {
		color: #806666;
		text-decoration: underline;
		font-size: 14px;
	}

	a:link {
		text-decoration: none;
	}

	a:visited {
		color: #806666;
	}

	header {
		height: 110px;
		padding: 40px;
	}

	nav {
		width: auto;
		background-color: #806666;
		border-top: 4px solid #d5d5d5;
		border-bottom: 4px solid #d5d5d5;
		padding: 25px;
	}

	nav ul {
		list-style-type: none;
		margin-top: 8px;
		padding: 5px;
	}

	nav ul li{
		margin-left: 40px;
		display: inline;
		font-family: "lev";
		font-size: 31px;
		color: #ead0ae;
	}

	nav ul li a:link {
		color: #ead0ae;
		text-decoration: none;

	}

	nav ul li a:visited {
		color: #ead0ae;
		text-decoration: none;
	}

	table {
		width: 82%;
		margin-top: 34px;
		margin-left: 50px;
	}

	thead {
		background-color: #806666;
		border: 4px solid #d5d5d5;

	}

	tbody {
		background-color: #d5d5d5;
		border: 4px solid #d5d5d5;

	}

	thead td {
		padding: 10px;
		font-family: "lev";
		font-size: 24px;
		color: #fff;
		text-align: center;
	}

	tbody td {
		border-left: 1px solid #ABABAB;
		border-bottom: 1px solid #ABABAB;
		padding: 10px;
		text-align: center;
		font-family: "lev";
		font-size: 17px;
	}

	td img {
		width: 40px;
	}

	.add {
		float: right;
		margin-right: 1110px;
		margin-top: -7px;
		width: 30px;
	}
	</style>
</head>
<body>

<div class="container">
	<header>
		<div id="logo">
			<img src='../../assets/images/logo.png' />
		</div>
		<div id="user-data">
			<h2>Welcome, {user} <a href='profile/{employeeId}'><span class='edit_profile'>Edit Profile</span></a></h2>
			<h4>{datetime}</h4>
			<a href='logout'><h4 class='logout'>Logout</h4></a>
		</div>
	</header>
</div>
	<nav>
		<ul>
			<li><a href='#'>Home</a></li>
			<li><a href='termed/'>Termed</a></li>
			<li><a href='settings/'>Settings</a></li>
			<li><a href='uploads/'>Uploads</a></li>
		</ul>
	</nav>
<div class="container">

<h3 class='label'>Your Team <img src='../../assets/images/add.png' href='#new_member' class='add' /></h3>
<table>
	<thead>
		<tr>
			<td>Employee</td>
			<td>EmployeeID</td>
			<td>Attendance</td>
			<td>Survey Scores</td>
			<td>Sales Scores</td>
			<td>Options</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{lastName} {firstName}</td>
			<td>{memberId}</td>
			<td>{attendance}</td>
			<td>{surveyScores}</td>
			<td>{salesScores}</td>
			<td><img src='../../assets/images/gears.png' /></td>
		</tr>
	</tbody>
</table>
<div id="new_member" class="white-popup-block mfp-hide">Testing 1, 2 and 3</div>
</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/popup/dist/jquery.magnific-popup.js"></script>
<script>
$(function() {
	$(".add").on("click", function() {
		
		$(this).magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#email',
			modal: true
		});



	});
});
</script>
</body>
</html>