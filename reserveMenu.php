<?php

require "./include/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $menu_id = $_POST['menu_id'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $user = $_SESSION["user"];
    $user_id = $user['id'];

    $stmt = $conn->prepare("INSERT INTO reservation(user_id,menu_id,reservation_date,reservation_time) VALUES(?,?,?,?)");
    $stmt->bind_param("iiss" ,$user_id , $menu_id , $reservation_date , $reservation_time  );
    if ($stmt -> execute();) {
        header("./userpage.php");
    }

    




    
}
