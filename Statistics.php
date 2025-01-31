<?php 
// Affichage des statistiques détaillées pour le chef :
// Nombre de demandes en attente.
// Nombre de demandes approuvées pour la journée.
// Nombre de demandes approuvées pour pour le jour suivant.
// Détails du prochain client et de sa réservation.
// Nombre de clients inscrits. 

require "./include/database.php";

$stmtreservation = $conn->prepare("SELECT * FROM reservation ORDER BY FIELD(status, 'approved', 'pending', 'declined');");

// Nombre de demandes en attente.


$stmtpending = $conn->prepare("SELECT COUNT(*) FROM reservation where status = 'pending'");
$stmtpending ->execute();
$resultpending =  $stmtpending->get_result();
$row = $resultpending->fetch_assoc();
$pending = $row['COUNT(*)'];
var_dump($pending);

// Nombre de demandes approuvées pour la journée.


$today = date('Y-m-d');
var_dump($today);

$stmttoday = $conn->prepare("SELECT COUNT(*) FROM reservation where status = 'approved' and reservation_date = ?");
$stmttoday->bind_param("s" ,$today );
$stmttoday ->execute();
$resulttoday =  $stmttoday->get_result();
$row = $resulttoday->fetch_assoc();
$nbr_today = $row['COUNT(*)'];
var_dump($nbr_today);

    // Nombre de demandes approuvées pour pour le jour suivant.


    $tomorrow = date('Y-m-d', strtotime(' +1 day'));
    var_dump($tomorrow);

    $stmttomorrow = $conn->prepare("SELECT COUNT(*) FROM reservation where status = 'approved' and reservation_date = ?");
    $stmttomorrow->bind_param("s" ,$tomorrow );
    $stmttomorrow ->execute();
    $resulttomorrow =  $stmttomorrow->get_result();
    $row = $resulttomorrow->fetch_assoc();
    $nbr_tomorrow = $row['COUNT(*)'];
    var_dump($nbr_tomorrow);

// Nombre de clients inscrits. 

$stmtusers = $conn->prepare("SELECT COUNT(*) FROM utilisateur where role_id = 1");
$stmtusers ->execute();
$resultusers =  $stmtusers->get_result();
$row = $resultusers->fetch_assoc();
$users = $row['COUNT(*)'];
var_dump($users);


$stmtNextReservation = $conn->prepare("SELECT r.reservation_date, r.guests, u.username, u.email
    FROM reservation r, utilisateur u
    WHERE r.user_id = u.user_id AND r.status = 'approved' AND r.reservation_date >= ?
    ORDER BY r.reservation_date ASC
    LIMIT 1");

$stmtNextReservation->bind_param("s", $today);
$stmtNextReservation->execute();
$resultNextReservation = $stmtNextReservation->get_result();

// Fetch and display the result if found
if ($row = $resultNextReservation->fetch_assoc()) {
    $username = $row['username'];
    $email = $row['email'];
    $reservation_date = $row['reservation_date'];
    $guests  = $row['guests'];


    // Display the details
    var_dump( $username, $email, $reservation_date , $guests);
} else {
    echo "No approved reservation for tomorrow.";
}





?>