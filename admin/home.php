<?php
    include "../db_config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View users</title>
    <link rel = "stylesheet" href = "../css/bootstrap.css">
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <div class="container vh-100">
        <div class="row justify-content-center">
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Delete</th>
            </tr>
        </thead>
        
            <?php
            session_start();
                            $sql = "SELECT id,name,uname,email,dob,gender,contact from users";
                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result) > 0 ){
                                while($row = mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    echo "<tr>
                                    <td>".$id."</td>
                                    <td>" . $row["name"]."</td>
                                    <td>" . $row["uname"]."</td>
                                    <td>" . $row["email"] ."</td>
                                    <td>" . $row["dob"]."</td>
                                    <td>" . $row["gender"] ."</td>
                                    <td>" . $row["contact"] ."</td>
                                    <td><a href='delete.php?id=".$id."' class='text-light' style='text-decoration:none'><button type='button' class='btn btn-danger'>Delete</a></td>
                                    
                                    </tr>";
                                }
                                echo "</table>";
                            }
                            else{
                                echo "0 result";
                            }
                            mysqli_close($conn);
                        ?>
                    </table>

                    <div class="button">
                    <a href="../index.php"><button type="button" class="btn btn-primary">BACK TO HOME</button></a>
                    </div>
        </div>
    </div>
</body>
</html>