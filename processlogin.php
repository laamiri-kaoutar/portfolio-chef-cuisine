<?php


session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "./include/database.php";

    $errors = [];
    $username = $_POST['username'];
    echo $username;
    $password = $_POST['password'];
    

    if (empty($username)) {
        $errors["emptyname"] = "please do not leave username empty";
        
    }else {

        $stmt = $conn -> prepare("SELECT * FROM utilisateur WHERE username = ?");
        $stmt -> bind_param("s", $username ); 
        $stmt -> execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        var_dump($row);

    
        if ($row ) {
            

            $user = [
                "username"=> $row['username'],
                "email"=> $row['email'],
                "id"=> $row['user_id']
            ];
           
            $role_id = $row['role_id']; 

            
                $user_pass = $row['password'];
                
                $passwordCheck = password_verify($password, $user_pass);
                var_dump($passwordCheck);
                if (!$passwordCheck) {
                    $errors["invalidpwd"] = "Invalid password.";
                   
                }       

        } else {
            $errors["nousername"] = "No user found with that username.";
        }
    }

    if ($errors) {
        $_SESSION["errors"] = $errors;
        $registerData = [
            "username"=> $username
        ];
        $_SESSION["registerData"] = $registerData;

        header("Location:./login.php");
        die();
    } else {
    
        unset($_SESSION['errors']);

        
        $stmt = $conn -> prepare("SELECT * FROM role WHERE role_id = ?  ");
        $stmt -> bind_param("i", $role_id); 
        $stmt -> execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $user['role'] = $row["role_name"];

        $_SESSION["user"] = $user;

        if ($row["role_name"] == "client") {
            header("Location:./userpage.php");
            exit();
        }elseif ($row["role_name"] == "chef") {
            header("Location:./dashboard.php");
            exit();
        }

    }
}


 

