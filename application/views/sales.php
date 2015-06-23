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
		src: url('../../../assets/fonts/levserif.otf');
	}

	h1, h2, h3, h4 {
		font-family: "lev" !important;
	}

	h2 {
		font-size: 36px;
		text-align: center;
		padding-top: 40px;
	}

	.container {
		margin: 0 auto;
		width: 507px;
	}

	header {
		margin-top: 20px;
	}

	form {
		margin-top: 70px;
		margin-left: 100px;
	}

	input[type=text], input[type=password], input[type=email], input[type=date], select {
		border: 2px solid #df7619;
		height: 40px;
		width: 300px;
		font-family: "lev";
		font-size: 22px;
		color: #806666;
		padding-left: 10px;

	}

	textarea {
		border: 2px solid #df7619;
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

	p {
		text-align: center;
		font-family: "lev";
		font-size: 16px;
		color: #fff;
		margin-top: 100px;
		background-color: #38292a;
		padding: 8px;
		border: 2px solid #c1c1c1;
	}

	p a {
		color: #ead0ae;
		text-decoration: none;
		text-shadow: 1px 1px 1px #333;
	}

	.free {
		color: #df7619;
		text-shadow: 1px 1px 1px #333;
	}

	strong {
		text-shadow: 1px 1px 1px #333;
		font-weight: bold;
		font-size: 18px;
		letter-spacing: 1.5px;
	}

	.required {
		color: red;
		width: 10px;
		height: 10px;
		padding-top: 7px;
		padding-left: 5px;
		padding-right: 5px;
		text-align: center;
		border-radius: 4px;
		background-color: white;
	}

	.note {
		text-align: left;
	}

	.cancel {
		position: absolute;
		top: 0;
		left: 0;
		padding: 10px;
		margin: 10px;
		background-image: url('../../../assets/images/cancel.png');
		width: 60px;
		height: 60px;
		background-repeat: no-repeat;
	}

	.cancel:hover {
		position: absolute;
		top: 0;
		left: 0;
		padding: 10px;
		margin: 10px;
		background-image: url('../../../assets/images/cancel_hover.png');
		width: 60px;
		height: 60px;
		background-repeat: no-repeat;
	}
	</style>
</head>
<body>
<a href="../../cancel/go"><div class="cancel"></div></a>
<div class="container">
<h2>Editing attendance for employee: {firstName} {lastName}</h2>
<form action='../../sales/process' method='POST'>
<input type="hidden" value="{employeeId}" name="employeeId" />
<strong>Date:<br />
<input type="date" value="{date}" name="date" required/> <span class='required'>*</span><br /><br />
<strong>Score:<br />
<input type="text" name="score" placeholder="3.5" required/>
<span class='required'>*</span><br /><br />
<strong>Description:<br />
<textarea name="description" cols="21" rows="6"></textarea> <span class='required'>*</span><br /><br />
<input type='submit' value='Update' />
</form>

</div>
</body>
</html>