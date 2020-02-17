<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?= base_url()?>Home/AuthLogin" method="post" id="login_form">
		<input type="text" name="username">	
		<input type="password" name="password">
		<input type="submit" value="Login">	
	</form>
</body>
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery_validation.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/form_validation.js"></script>
</html>