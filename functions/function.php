<?php

function login($username,$password){
    global $conn;
    $password = MD5($password);
    $sql = "SELECT * FROM tbl_Users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['User_ID'] = $row['User_ID'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['Workstation_ID']= $row['Workstation_ID'];
        $_SESSION['Full_name'] = $row['Full_name'];
        header("location:./index.php");
    }else{
        return "wrong username/ password";
    }
}


?>