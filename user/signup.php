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
                <div class="card-headr text-center">
                <form action="signup-check.php" method="post">
     	            <h2>SIGN UP</h2>
                </div>
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>


                        <div class="card-body">

                        <div class="form-group">
                            <label for="name">First Name</label>
                        <?php if (isset($_GET['name'])) { ?>
                            <input type="text" class="form-control" name="name" value="<?php echo $_GET['name']; ?>">
                        <?php }else{ ?>
                            <input type="text" class="form-control" name="name">
                            <?php }?>
                            </div>

                            <div class="form-group">
                            <label for="uname">Last Name</label>
                            <input type="text" class="form-control" name="uname">
                            </div>
      
                            <div class="form-group">
                            <label for="name">Date of Birth</label>
                            <input type="date" class="form-control" name="dob">
                            </div>

                            <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email">
                            </div>

                            <div class="form-group">
                            <label for="gender">Gender </label>
                            <div>
                                <label for="male" class="radio-inline">
                                <input type="radio"  name="gender" value="m"/>Male
                                </label>
                                <label for="female" class="radio-inline">
                                <input type="radio"  name="gender" value="f"/>Female
                                </label>
                            </div>
                        </div><br>

                            <div class="form-group">
                            <label for="name">Contact Number</label>
                            <input type="text" class="form-control" name="contact">
                            </div>

                            <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input type="password" class="form-control" name="re_password">
                            </div><br>

                        <input type="submit" class="btn btn-primary w-100" value="Sign up">
                        </div>
                        <div class="card-footer">
                        <a href="index.php">Already have an account?</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>