<?php
	require_once 'config.php';


	if (isset($_SESSION['access_token'])){
		header('location: index.php');
		exit();
	}

	$redirectURL = "https://localhost/xportgold/const/facebooklogin/fb-callback.php";
	$permissions = ['email'];

	$loginURL = $helper->getLoginUrl($redirectURL, $permissions);
	//echo $loginURL;



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">


	<title>Log In</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

	<div class="container" style="margin-top: 100px">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<img src="images/logoNew230x80.png"><br><br>
				<form>
					<input name="email" placeholder="email" class="form-control"><br>
					<input name="massword" type="password" placeholder="password" class="form-control"><br>
					<input type="submit" value="Log In" class="btn btn-primary">
					<input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Facebook" class="btn btn-primary">

				</form>
				

			</div>
			
		</div>
	</div>



</body>
</html>