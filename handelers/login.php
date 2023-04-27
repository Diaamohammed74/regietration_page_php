<?php
session_start();
$errors=[];
if (isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD']=="POST") {
    include "../validation/validation.php";
    include "../database/database.php";

    //get

    $email=sanitize_input($_POST['email']);
    $password=sanitize_input($_POST['password']);
    //validation


    if (emptyinput($email)) {
        $errors[]="Email field is required";

    }elseif(!validinput($email)){
        $errors[]="Enter a valid email";
    }

    //password
    if(emptyinput($password)){
        $errors[]="Password Field is required";
    }elseif (mininput($password,6)) {
        $errors[]="password must be greater than 6 chars";
    }elseif (maxinput($password,50)) {
        $errors[]="password must be less than 50 chars";
    }

    // check duplicated email

    $sql= "SELECT * from `users` where `email`='$email'";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
    $hashed_pass=$row['password'];
    if ($row['email']!=$email)
    {
        $errors[]="Email is not existed";
    }
    // if (!password_verify($password,$hashed_pass)) {
    //     $errors[]="wrong password";}
    // foreach ($result1 as $row) {
    //     if ($row['email']!=$email) {
    //         $errors[]="Email is not existed";
    //     }
    //     if (password_verify($password,$row['password'])) {
    //         $errors[]="wrong password";
    //     }
    // }
    if(empty($errors)){
        $_SESSION['success']=['Logged in Successfuly'];
        $_SESSION['login']=true;
        $_SESSION['username']=$row['name'];
        header("location: ../home.php");
    }else {
        $_SESSION['errors']=$errors;
        header("location: ../login.php");
    }
}
?>