<?php
session_start();


require "./include/database.php";





if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $menu_id = $_POST['menu_id'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $user = $_SESSION["user"];
    $user_id = $user['id'];

    $stmt = $conn->prepare("SELECT * FROM reservation WHERE user_id=? AND menu_id = ?  ");
    $stmt->bind_param("ii" ,$user_id , $menu_id );
    $stmt -> execute(); 
    $result =  $stmt->get_result();
    if ($result->fetch_assoc()) {
        echo " you are already done this reservation";
    }else {
        $stmt = $conn->prepare("INSERT INTO reservation(user_id,menu_id,reservation_date,reservation_time) VALUES(?,?,?,?)");
        $stmt->bind_param("iiss" ,$user_id , $menu_id , $reservation_date , $reservation_time  );
        if ($stmt -> execute()) {
            header("Location:./userpage.php");
            exit();
        }
    
    }

    
}
