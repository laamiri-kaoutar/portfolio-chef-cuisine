<?php 



require "./include/database.php";

$id = $_GET['id'];

    $stmt = $conn-> prepare("DELETE FROM reservation  WHERE id = ? ");
    $stmt->bind_param("i" , $id);
    if ($stmt -> execute()) {
        echo "this is working " ; 

        header("Location:./userpage.php");
        // exit();
    }else {
        echo "somthing went wrong" ; 
    }





  

