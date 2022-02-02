<?php
    include "../db_config.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql="DELETE from users where id=$id";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('location:home.php');
            echo "User Delete Successfull";
        }else{
            die(mysqli_error($conn));
        }
    }
?>