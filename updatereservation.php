<?php 



require "./include/database.php";





if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $id = $_POST['reservation_id'];
    $date = $_POST['reservation_date'];
    $time = $_POST['reservation_time'];



    $stmt = $conn-> prepare("UPDATE reservation SET reservation_date = ? , reservation_time = ?  WHERE id = ? ");
    $stmt->bind_param("ssi" ,$date,$time, $id);
    if ($stmt -> execute()) {
        echo "this is working " ; 

        header("Location:./userpage.php");
        // exit();
    }else {
        echo "somthing went wrong" ; 
    }

}    

