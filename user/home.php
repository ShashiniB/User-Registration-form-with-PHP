<?php
session_start();
include "../db_config.php";

//if (isset($_SESSION['id']) && isset($_SESSION['email'])){
    
    if(isset($_POST['submit'])){        

        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        
        if ($password === $re_password){  
            $pwd = md5($password);       
            $sql = "UPDATE users SET 
            name='$name', uname='$uname', dob='$dob', email='$email', gender='$gender', contact='$contact', password='$pwd'
            WHERE id='{$_SESSION["id"]}'";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                header("Location: home.php?success=Update successfull");
                exit();
            }
        }else{
            header("Location: home.php?error=The confirmation password  does not match");
            exit();
        }
    }
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel = "stylesheet" href = "../css/bootstrap.css">
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
<div class="container vh-100">
    <div class="row justify-content-center h-100">
    <div class="card w-50 my-auto shadow mt-5">
        <div class="card-header text-center">
        <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
</div>

                        <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>

                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

        <div class="card-body">

            <form action="" method="post">
                <?php
                    $sql = "SELECT * FROM users WHERE id='{$_SESSION["id"]}'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                    }
                    
                ?>

            <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
             </div>

            <div class="form-group">
            <label for="uname">Last Name</label>
            <input type="text" class="form-control" name="uname" value="<?php echo $row['uname']; ?>">
            </div>
      
            <div class="form-group">
            <label for="name">Date of Birth</label>
            <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>">
            </div>

            <div class="form-group">
            <label for="name">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>

            <div class="form-group">
            <label for="gender">Gender </label>
            <div>
            <input type="radio"  name="gender" <?=$row['gender']=="m" ? "checked" : ""?> value="m"/>
            <label for="male" class="radio-inline">Male</label>       
            <input type="radio"  name="gender" <?=$row['gender']=="f" ? "checked" : ""?> value="f"/>
            <label for="female" class="radio-inline">Female</label>
            </div>
            </div><br>

            <div class="form-group">
            <label for="name">Contact Number</label>
            <input type="text" class="form-control" name="contact" value="<?php echo $row['contact']; ?>">
            </div>

            <div class="form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control" name="password" value="" required>
            </div>

            <div class="form-group">
            <label for="name">Confirm Password</label>
            <input type="password" class="form-control" name="re_password" required>
            </div><br>            

            <input type="submit" name="submit" class="btn btn-primary w-100" value="UPDATE PROFILE">
            </div>
            </form>
        </div>

        <div class="card-footer text-center">
            <div class="button">
            <a href="logout.php">
            <button type="button" class="btn btn-primary">LOGOUT</button></a>
            <a href="view.php">
            <button type="button" class="btn btn-warning">VIEW OTHER USERS</button> </a>
            </div>
        </div>
        
    </div>
   
    </div>
</div>
   
</body>
</html>

