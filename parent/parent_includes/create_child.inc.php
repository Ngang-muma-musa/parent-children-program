<?php
session_start();
if(isset($_POST['submit'])){
    require "../../includes/db.inc.php";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $pwd = $_POST['pwd'];
    $cfm_pwd= $_POST['cfm_pwd'];
    $phoneNumber = $_SESSION['phoneNumber'];

    if(empty($name)||empty($age)||empty($pwd)||empty($cfm_pwd)){
        header("Location:../create_child.php?Error=please fill all fields");
        exit();
    }
    else if(!preg_match("#[a-zA-Z]#", $name)){
        header("Location:../create_child..php? Error=Invalid lastName");
	    exit();
    }
    elseif(preg_match("#[a-zA-Z]#", $age)){
        header("Location:../create_child..php? Error=Invalid Age");
	    exit();
    }
    elseif(!preg_match("#[0-9]#", $pwd)){
        header("Location:../create_child.php? error=password must include atleast 4 number");
         exit();
     }
    elseif(strlen($pwd)<4){

        header("Location:../create_child.php? Error=password to short atleast 4 charecters");
	    exit();
	}
    elseif(preg_match("#[a-zA-Z]#", $pwd)){
        header("Location:../create_child.php?Error=password should contain just numbers");
        exit();
    }
    elseif($pwd !== $cfm_pwd){
        header("Location:../create_child.php ?Error=Wrong password");
	    exit();
    }
    else{

        $sql = "INSERT INTO children (child_name,age,phoneNumber,pwd) VALUES(?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){

            header("Location:../create_child.php?Error=Registration unsucessfull");
		    exit();
        }
        else{
            $hashedpassword = password_hash($pwd,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"ssss",$name,$age,$phoneNumber,$hashedpassword);
            if(mysqli_stmt_execute($stmt)){
                header("Location:../create_child.php?signup=SignUp Successful");
                exit();
            }else{
                die($hashedpassword);
            }
        }
    }
}