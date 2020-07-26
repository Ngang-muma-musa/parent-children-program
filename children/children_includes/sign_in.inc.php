<?php

session_start();

 require "../../includes/db.inc.php";
if (isset($_POST['signin'])) {


    $phoneNumber = $_POST['phoneNumber'];
    $pwd = $_POST['password'];

    // $hashedpassword = password_hash($pwd, PASSWORD_DEFAULT);

    
        $sql = "SELECT * FROM children WHERE phoneNumber = ?";
        $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location:../index.php?error=sql error");
            exit();
        }
         else{
            mysqli_stmt_bind_param($stmt,"s",$phoneNumber);
            mysqli_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['child_name'];
            $id = $row['id'];
            $phoneNumber = $row['phoneNumber'];
            $password_from_db = $row['pwd'];
            $passwordCheck = password_verify($pwd,$password_from_db);
            if ($passwordCheck) {
                $_SESSION['child_id'] =  $id;
                $_SESSION['phoneNumber'] =  $phoneNumber;
                $_SESSION['password'] = $password_from_db;
                header("Location:../childrenUI.php");
                exit();
            }
        }
        
     header("Location:../index.php");
     exit();
    mysqli_close($conn);
}
else{
     header("Location:../index.php");
     exit();
}