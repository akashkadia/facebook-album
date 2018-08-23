<?php
	require_once "config.php";
	if(isset($_SESSION['access_token']))
	{
			header('Location:index.php');
			exit;
	}
	$redirectURL="http://localhost/facebook3/fb-callback.php";
	$permissions=['email'];
	$loginURL=$helper->getLoginUrl($redirectURL,$permissions);
	//echo $loginURL;
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<br>
	<br>
	<h1 align="center">REGISTRATION PAGE</h1><br >
		<div class="container" style="margin-top" 100px>
			<div class="row justify-content-center">
				<form>
					<input type="text" name="email" class="form-control"><br>
					<input type="password" name="password" class="form-control"><br>
					<input type="submit" name="Log in" value="log in" class="btn btn-primary">
					<input type="button" onclick="window.location='<?php echo $loginURL ?>'; " value="log in with facebook" class="btn btn-primary">

				</form>
			</div>
		</div>

</body>
</html>