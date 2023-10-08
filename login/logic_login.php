<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_GET['submit'])){
    $name = $_GET['name'];
    $pass = $_GET['pass'];

    $selete = "SELECT * FROM login WHERE `name`= '$name'";
    
    $result = mysqli_query($conn,$selete);
    
    $row = mysqli_fetch_array($result);

    if($pass == $row['password']){
        $_SESSION['pass'] = $row['password'];
        header("Location:../admin/company.php");
    }
    else{
        echo "invalid password";
    }
}
?>