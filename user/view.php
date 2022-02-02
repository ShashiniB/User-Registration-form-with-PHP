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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Contact</th>
            </tr>
        </thead>
            <?php
            session_start();
                            $sql = "SELECT name,uname,email,dob,gender,contact from users";
                            $result = mysqli_query($conn, $sql);

                            if($result->num_rows > 0 ){
                                while($row = $result-> fetch_assoc()){
                                    echo "<tr>
                                    <td>" . $row["name"] ."</td>
                                    <td>" . $row["uname"] ."</td>
                                    <td>" . $row["email"] ."</td>
                                    <td>" . $row["dob"]."</td>
                                    <td>" . $row["gender"] ."</td>
                                    <td>" . $row["contact"] ."</td>
                                    </tr>";
                                }
                                echo "</table>";
                            }
                            else{
                                echo "0 result";
                            }
                            $conn->close();
                        ?>
        </table>

        <div class="button">
        <a href="home.php"><button type="button" class="btn btn-primary">BACK TO HOME</button></a>
        </div>

        </div>
    </div>
</body>
</html>