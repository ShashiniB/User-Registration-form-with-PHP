<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel = "stylesheet" href = "../css/bootstrap.css">
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-50 my-auto shadow">

				<div class="card-header text-center">
					<h2>LOGIN</h2>

                    <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
				</div>

				<div class="card-body">
					<form action="login.php" method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control" name="email" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" class="form-control" name="password" />
						</div><br>
						<input type="submit" class="btn btn-primary w-100" value="Login" name="">
					</form>

				</div>

				<div class="card-footer text-right">
					<a href="signup.php">Creat an Account</a>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>