<?php
session_start();
$errors=[];
include "../validation/validation.php";
include "../database/database.php";

if (isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD']=="POST")
{
    
    //get
    $username = mysqli_real_escape_string($connection, $_POST['name']);
    $username = sanitize_input($username);    
    $email=sanitize_input($_POST['email']);
    $password=sanitize_input($_POST['password']);
    $confirm_password=sanitize_input($_POST['confirm_password']);
    //validation

    //username  
    if(emptyinput($username))
    {
        $errors[]="Username Field is required";
    }
    elseif (mininput($username,3))
    {
        $errors[]="Username must be greater than 6 chars";
    }
    elseif (maxinput($username,20))
    {
        $errors[]="Username must be less than 20 chars";
    }

    //email 
    if (emptyinput($email))
    {
        $errors[]="Email Field is required";
    }
    elseif(!validinput($email))
    {
        $errors[]="Enter a valid email";
    }

    //password
    if(emptyinput($password))
    {
        $errors[]="Password Field is required";
    }
    elseif (mininput($password,6))
    {
        $errors[]="password must be greater than 6 chars";
    }
    elseif (maxinput($password,50))
    {
        $errors[]="password must be less than 50 chars";
    }
    elseif (!confirm_password($password,$confirm_password))
    {
        $errors[]="Password Doesn`t match";
    }

    // check if email duplicated
    $sql1= "SELECT * from `users`";
    $existance=mysqli_query($connection,$sql1);
    foreach ($existance as $exist)
    {
        if ($exist['email']==$email)
        {
            $errors[]="Email already taken";
            break;
        }
    }

    if(empty($errors))
    {
        $password_hashed=sha1($password);
        $sql= " INSERT into `users`(`name`,`email`,`password`) value ('$username','$email','$password_hashed')";
        $result=mysqli_query($connection,$sql);
        if ($result) 
        {
            $_SESSION['success']=['Data added successfuly'];
        }
        else
        {
            $_SESSION['errors']=['Data Does not added'];
        }
        header("location: ../register.php");
    }
    else
    {
        $_SESSION['errors']=$errors;
        header("location: ../register.php");
    }
}
else{
    $errors[]="Unexpected error";
    $_SESSION['errors']=$errors;
    header("location: ../register.php");
}

?>