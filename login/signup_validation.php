<?php
session_start();
include_once 'dbh_connect.php';

 if(isset($_POST['submit']))
 {
     $mail = $_POST['email'];
     $pass = $_POST['pass'];
     $rpass = $_POST['rpass'];

     if($pass !== $rpass){
         header('location:../signup.php');
     }

     $sql = "SELECT * FROM users WHERE userEmail = '$mail'";
     $stmt = connect()->query($sql);
     $row = $stmt->fetch();

     if($row == true){
         header('location:../signup.php');
         echo "<script>window.alert('User Exists');</script>";
     }else{
         $sql = "INSERT INTO users(userEmail,userPass) VALUES ('$mail','$pass')";
         connect()->query($sql);
         $_SESSION['email'] = $mail;
         header('location:../index.php');
     }

 }