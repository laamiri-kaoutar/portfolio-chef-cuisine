<?php
session_start();


require "./include/database.php";





if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $id = $_POST['reservation_id'];
    $stmt = $conn-> prepare("UPDATE reservation SET status ='declined' WHERE id = ? ");
    $stmt->bind_param("i" , $id);
    if ($stmt -> execute()) {
        var_dump($stmt);
        echo "this is working " ; 

        header("Location:./dashboard.php");
        // exit();
    }else {
        echo "somthing went wrong" ; 
    }

}    

