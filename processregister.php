<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "./include/database.php";

    $errors = [];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHashee=password_hash($password,PASSWORD_DEFAULT);

    $confirmpwd = $_POST['confirm-password'];
    $role = 2;

    // here i check if the user alreday exist

    $stmt = $conn -> prepare("SELECT username FROM utilisateur WHERE username = ? ");
    $stmt -> bind_param("s", $username); 
    $stmt -> execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors["usedname"] = "Username $username is already used";
    }

    $stmt = $conn -> prepare("SELECT email FROM utilisateur WHERE email = ? ");
    $stmt -> bind_param("s", $email); 
    $stmt -> execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        $errors["usedemail"] = "Email $email is already used";
    }

    if ( !filter_var($email , FILTER_VALIDATE_EMAIL)) {
        $errors["invalidemail"] = "this is invalid email";
    }

    if (empty($username)) {
        $errors["emptyname"] = "please do not leave username empty";
        
    }

    if ($password != $confirmpwd) {
        $errors["password"] = "please enter the same passeword";
    }
    
    if ($errors) {

        $_SESSION["errors"] = $errors;
        header("Location:./register.php");
    } else {
       
        $stmt = $conn -> prepare("INSERT INTO utilisateur (username, password , email  , role_id) VALUES (?, ?, ?,?)");
        $stmt -> bind_param("sssi", $username,$passwordHashee, $email, $role); 
        $stmt -> execute(); 
        header("Location:./userpage.php");
    }
          
            

     
} 