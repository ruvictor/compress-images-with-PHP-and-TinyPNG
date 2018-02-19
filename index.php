<!doctype html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<title>Compress Images</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type='text/javascript' src='/js/upload.js'></script>
	<style>
		.upload_alert{
			display:none;
		}
		.container{
			display: table;
			width: 30%;
			margin: 10% auto 0;
			border: 5px solid #ddd;
			padding: 10px;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="" method="POST" id="add_form">
			<div class="upload_alert"></div>
			<input type="file" name="file" onchange="upload_img()" id="file" />
			<br /><br />
			<input type="submit" value="Ok" />
		</form>
	</div>
</body>
</html>