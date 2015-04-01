<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to the book review!</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h2>Welcome !</h2>
<?php
		if ($errors) { 
?>
		<div class="alert alert-danger">
			<?=$errors?>
		</div>

<?php
		}
?>

<?php
		if ($success_message) { 
?>
		<div class="alert alert-success">
			<?=$success_message?>
		</div>

<?php
		}
?>

		<div id="register" class="col-md-6">
			<form action="/main/register" method="post">
				<fieldset>
					<legend>
						New User? Register
					</legend>
					<div class="form-group">
						<label>Email Address:</label>
						<input type="text" name="email" placeholder="Email" class="form-control">
					</div>
					<div class="form-group">
						<label>First Name:</label>
						<input type="text" name="first_name" placeholder="First Name" class="form-control">
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input type="text" name="last_name" placeholder="Last Name" class="form-control">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" name="password" placeholder="Password" class="form-control">
					</div>
					<div class="form-group">
						<label>Password Confirmation:</label>
						<input type="password" name="confpassword" placeholder="Confirm Password" class="form-control">
					</div>
					<input type="submit" value="Register" class="btn btn-success" id="sign_in_button">
				</fieldset>
			</form>
		</div>

		<div id="sign-in">
			<form action="/main/signin" method="post">
				<fieldset>
					<legend>
						Sign in
					</legend>
					<div class="form-group">
						<label for="InputEmail">Email Address:</label>
						<input type="text" name="email" placeholder="Email" id="InputEmail" class="form-control">
					</div>
					<div class="form-group">
						<label for="InputPassword">Password:</label>
						<input type="password" name="password" placeholder="Password" id="InputPassword" class="form-control">
					</div>
					<input type="submit" value="Sign in!" class="btn btn-success" id="sign_in_button">
				</fieldset>
			</form>
		<div>


</body>
</html>