<?php 
session_start();

if (isset($_SESSION["user"]) ) {

    $user = $_SESSION["user"];
    if ($user['role'] != "client" ) {

        header("Location:./login.php");
        die();
    }

    // var_dump($user);


} else {

    header("Location:./login.php");
    die();
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="assets/img/stats-bg.jpg" rel="apple-touch-icon">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        :root {
            --background-color: #ffffff;
            --default-color: #212529;
            --heading-color: #37373f;
            --accent-color: #ce1212;
            --surface-color: #ffffff;
            --contrast-color: #ffffff;
            --nav-color: #7f7f90;
            --nav-hover-color: #ce1212;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            color: var(--default-color);
            margin: 0;
            padding: 0;
        }

        header, footer {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            padding: 10px;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: var(--surface-color);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h3 {
            color: var(--heading-color);
            font-size: 1.5rem;
        }

        .card-body p {
            color: var(--default-color);
            margin-bottom: 15px;
        }

        .button-group {
            display: flex;
            
            gap:16px;
            margin-top: 10px;
        }

        .button-group button {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;*
           
        }

        .button-group button:hover {
            background-color: #a80a0a;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: var(--surface-color);
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal input, .modal select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .close-btn {
            background-color: var(--accent-color);
            color: var(--contrast-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .close-btn:hover {
            background-color: #a80a0a;
        }

        .modal h3 {
            color: var(--heading-color);
        }

    </style>
</head>
<?php 
require "./include/database.php";



$id = $user['id'];

$stmtreservation = $conn->prepare("SELECT * FROM reservation where user_id = ? order BY status ");
$stmtreservation->bind_param("i" ,$id );
$stmtreservation ->execute();
$resultreservation =  $stmtreservation->get_result();
// $row = $resultreservation->fetch_assoc();
// while ($row = $resultreservation->fetch_assoc()) {
// var_dump($row);

// }

?>

<body>

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Yummy</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#Reservations">Reservations</a></li>
          <li><a href="#Menus">Menus</a></li>
            
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="">log out</a>

    </div>
</header>

<div class="container" id="Reservations">

    <h2>My Reservations</h2>
    <div class="cards-container">
        <!-- Example of a reservation card -->
        <!-- <div class="card">
            <img src="./assets/img/stats-bg.jpg" alt="Reservation">
            <div class="card-body">
                <h3>Reservation #1</h3>
                <p>Date: 2024-12-25</p>
                <p>Status: 18:00</p>

                <p>Time: 18:00</p>
                <div class="button-group">
                    <button onclick="openForm()">Modify</button>
                    <button>Cancel</button>
                </div>
            </div>
        </div> -->
        <!-- Add more reservation cards here -->
    <?php
        while ($row = $resultreservation->fetch_assoc()) {
            // var_dump($row);
              $stmtmenu = $conn->prepare("SELECT menu_name FROM menu WHERE menu_id= ? ");
              $stmtmenu->bind_param("i" , $row["menu_id"] );
              $stmtmenu ->execute();
              $resultmenu =  $stmtmenu->get_result();
              $menu = $resultmenu->fetch_assoc();
              $menu=$menu["menu_name"];
            //   var_dump($menu);
            ?>

        <div class="card">
            <img src="./assets/img/stats-bg.jpg" alt="Reservation">
            <div class="card-body">
                <h3>Reservated menu : <?= $menu?></h3>
                <p>Date: <?= $row["reservation_date"]?> </p>
                <p>Status: <?= $row["status"]?></p>

                <p>Time: <?= $row["reservation_time"]?></p>
                <p>Guests: <?= $row["guests"]?></p>

                <div class="button-group">
                    <button onclick="openUpdate(<?= $row['guests']?>)">Modify</button>
                    <button>Cancel</button>
                </div>
            </div>
        </div>
    <?php
    }?>
    
    </div>

    </div>    
<div class="container" id="Menus">



    <h2>Available Menus</h2>
    <div class="cards-container">
        <!-- Example of a menu card -->
        <div class="card">
            <img src="./assets/img/stats-bg.jpg" alt="Menu">
            <div class="card-body">
                <h3>Menu #1</h3>
                <p>Description of the menu.</p>
                <p>Plats included: Dish 1, Dish 2, Dish 3</p>
                <div class="button-group">
                    <button style=" width: fit-content ; margin :auto;" onclick="openForm()">Reserve</button>
                </div>
            </div>
        </div>


        <?php while ($row = $resultmenu->fetch_assoc()) { ?>

             <div class="card">
                 <img src="./assets/img/stats-bg.jpg" alt="Menu">
                 <div class="card-body">
                     <h3><?= $row['menu_name']?></h3>
                     <p><?= $row['description']?></p>
                     <p>Plats included: Dish 1, Dish 2, Dish 3</p>
                     <div class="button-group">
                         <button style=" width: fit-content ; margin :auto;" onclick="openForm(<?= $row['menu_id']?>)">Reserve</button>
                     </div>
                 </div>
             </div>
        
        <?php    
        }
        ?>

        <!-- Add more menu cards here -->
    </div>
</div>

<!-- Reservation Form Modal -->
<div id="reservationModal" class="modal">
    <div class="modal-content">
        <h3>Reserve a Menu</h3>
        <form action="reserveMenu.php" method="POST"  >
            <input type="hidden" id="menuId" name="menu_id">
            <label for="reservation-date">Date:</label>
            <input type="date" id="reservation-date" name="reservation_date">
            <label for="reservation-time">Time:</label>
            <input type="time" id="reservation-time" name="reservation_time">
            <label for="guests">Number of Guests:</label>
            <input type="number" id="guests" name="guests"required>
            <div class="button-group">
                <button type="submit" class="close-btn">Submit</button>
                <button type="button" class="close-btn" onclick="closeForm()">Close</button>
            </div>
        </form>
    </div>
</div>


<div id="updatereservationModal" class="modal">
    <div class="modal-content">
        <h3> Update Reservation</h3>
        <form action="updatereservation.php" method="POST"  >
            <input type="hidden" id="reservationId" name="reservation_id">
            <label for="reservation-date">Date:</label>
            <input type="date" id="reservation-date" name="reservation_date">
            <label for="reservation-time">Time:</label>
            <input type="time" id="reservation-time" name="reservation_time">
          <div class="button-group">
                <button type="submit" class="close-btn">Submit</button>
                <button type="button" class="close-btn" onclick="closeUpdate()">Close</button>
            </div>
        </form>
    </div>
</div>


<footer id="footer" class="footer dark-background">

   <div class="container">
     <div class="row gy-3">
       <div class="col-lg-3 col-md-6 d-flex">
         <i class="bi bi-geo-alt icon"></i>
         <div class="address">
           <h4>Address</h4>
           <p>A108 Adam Street</p>
           <p>New York, NY 535022</p>
           <p></p>
         </div>
   
       </div>
   
       <div class="col-lg-3 col-md-6 d-flex">
         <i class="bi bi-telephone icon"></i>
         <div>
           <h4>Contact</h4>
           <p>
             <strong>Phone:</strong> <span>+212 695 548 855</span><br>
             <strong>Email:</strong> <span>ali.hassan@gmail.com</span><br>
           </p>
         </div>
       </div>
   
       <div class="col-lg-3 col-md-6 d-flex">
         <i class="bi bi-clock icon"></i>
         <div>
           <h4>Opening Hours</h4>
           <p>
             <strong>Mon-Sat:</strong> <span>9AM - 23PM</span><br>
             <strong>Sunday</strong>: <span>Closed</span>
           </p>
         </div>
       </div>
   
       <div class="col-lg-3 col-md-6">
         <h4>Follow Us</h4>
         <div class="social-links d-flex">
           <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
           <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
           <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
           <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
         </div>
       </div>
   
     </div>
   </div>
   
   <div class="container copyright text-center mt-4">
     <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>
   </div>
   
</footer>

<script>
    function openUpdate(id) {
        document.getElementById('reservationId').value = id;
        document.getElementById('updatereservationModal').style.display = 'flex';
    }

    function closeUpdate() {
        document.getElementById('updatereservationModal').style.display = 'none';
    }

    function openForm(id) {
        document.getElementById('menuId').value = id;
        document.getElementById('reservationModal').style.display = 'flex';
    }

    function closeForm() {
        document.getElementById('reservationModal').style.display = 'none';
    }
</script>

</body>
</html>
