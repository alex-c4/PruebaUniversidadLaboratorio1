<?php 
	session_start();
	/*
	if (!isset($_SESSION['access_token'])){
		header('location: login.php');
		exit();
	}
	*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>User Profile</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

	<div class="container" style="margin-top: 100px">
		<div class="row justify-content-center">
			<div class="col-md-3">
				<img src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
			</div>
			<div class="col-md-3">
				<table class="table table-hover table-bordered">
					<tbody>
						<tr>
							<td>ID</td>
							<td><?php echo $_SESSION['userData']['id'] ?></td>
						</tr>
						<tr>
							<td>First Name</td>
							<td><?php echo $_SESSION['userData']['first_name'] ?></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td><?php echo $_SESSION['userData']['last_name'] ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $_SESSION['userData']['email'] ?></td>
						</tr>
					</tbody>
				</table>>
			</div>
			
		</div>
	</div>

</body>
</html>