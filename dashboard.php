
<?php 
session_start();

if (isset($_SESSION["user"]) || $user['role'] == "chef" ) {

    // $user = $_SESSION["user"];

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
    <title>Chef Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        /* Custom Styles from Provided Color Scheme */
        :root {
            --accent-color: #ce1212; /* Red */
            --heading-color: #37373f;
            --background-color: #ffffff;
            --surface-color: #ffffff;
            --contrast-color: #ffffff;
        }

        body {
            font-family: var(--default-font);
            background-color: var(--background-color);
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: #212529;
            display: block;
        }

        .sidebar a:hover {
            background-color: var(--accent-color);
            color: white;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
            min-height: 100vh;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        /* Form Buttons with Red Color */
        .btn-primary {
            background-color: #dc3545; /* Red */
            border-color: #dc3545;
        }

        .btn-primary:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .btn-accept, .btn-decline {
            color: white;
            width: fit-content !important;

            /* width: fit !important; */
        }

        /* Hide the forms by default */
        .form-section {
            display: none;
        }

        /* Make sure only one section is visible at a time */
        .visible {
            display: block;
        }

        .header-banner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #f8f9fa;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.header-banner h1 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

.logout-btn {
    display: inline-flex; /* Ensure the button only takes the space of its content */
    align-items: center;
    gap: 5px;
    font-size: 16px;
    padding: 5px 15px; /* Add padding for a compact look */
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: auto;
    transition: background-color 0.3s ease;
    white-space: nowrap; /* Prevents the button text from wrapping */
}

.logout-btn i {
    font-size: 18px;
}

.logout-btn:hover {
    background-color: #c82333;
}
 
.btn-form {
    display : flex ;
    width: auto;
    gap: 8px
    justify-self: center;

}

.table-image{
    display : flex ;
    width : 150px ;
    border-radius : 10px ;
    justify-self: center;
    
}

.btn-group{
    display : flex ;
    width : 100% ;
    justify-content: space-between;
    gap : 8px;

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

$stmtmenu = $conn->prepare("SELECT * FROM menu ");
$stmtmenu ->execute();
$resultmenu =  $stmtmenu->get_result();
// $row = $resultmenu->fetch_assoc();


$stmtpltat = $conn->prepare("SELECT * FROM plat ");
$stmtpltat ->execute();
$resultpltat =  $stmtpltat->get_result();
// $row = $resultpltat->fetch_assoc();

$stmtreservation = $conn->prepare("SELECT * FROM reservation ORDER BY FIELD(status, 'approved', 'pending', 'declined');");
$stmtreservation ->execute();
$resultreservation =  $stmtreservation->get_result();
// $row = $resultreservation->fetch_assoc();




?>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Chef Dashboard</h4>
        <a href="#" id="viewMenusBtn"><i class="fas fa-list icon-btn"></i> View Menus</a>
        <a href="#" id="viewPlatsBtn"><i class="fas fa-eye icon-btn"></i> View Plats</a>
        <a href="#" id="manageReservationsBtn"><i class="fas fa-calendar-check icon-btn"></i> Manage Reservations</a>
        <a href="#" id="addMenuBtn"><i class="fas fa-plus icon-btn"></i> Add Menu</a>
        <a href="#" id="viewStatsBtn"><i class="fas fa-chart-line icon-btn"></i> View Statistics</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
       <div class="header-banner">
          <h1>Welcome, <span style="color: #dc3545;">Hassan</span>!</h1>
          <button class="btn btn-danger logout-btn" onclick="logout()">
              <i class="fas fa-sign-out-alt"></i> Log Out
          </button>
       </div>


        <!-- View Menus Section (Initially Visible) -->
        <div id="viewMenusSection" class="form-section visible">
            <h2>All Menus</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Menu Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php while ($row = $resultmenu->fetch_assoc()) { ?>
                            <tr>
                            <td><?= $row['menu_name']?></td>
                            <td><?= $row['description']?></td>
                            <td><img class="table-image" src="./assets/img/<?php echo !empty($row['image']) ? $row['image'] : "gallery/gallery-4.jpg" ?>" alt=""></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>

                            </tr>
                        <?php    
                        }
                        ?>

                    <tr>


                    
                              <td>Menu 1</td>
                            <td>Description of menu 1</td>
                            <td>image of menu 1</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>

                    </tr>
                </tbody>
            </table>
        </div>

                <!-- View Plats Section -->
        <div id="viewPlatsSection" class="form-section">
            <h2>All Plats</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Plat Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while ($row = $resultpltat->fetch_assoc()) { ?>
                            <tr>
                            <td><?= $row['plat_name']?></td>
                            <td><?= $row['description']?></td>
                            <td><img class="table-image" src="./assets/img/<?php echo !empty($row['image']) ? $row['image'] : "gallery/gallery-4.jpg" ?>" alt=""></td>

                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>

                            </tr>
                        <?php    
                        }
                        ?>


                </tbody>
            </table>
        </div>


                <!-- Manage Reservations Section -->
        <div id="manageReservationsSection" class="form-section">
            <h2>Manage Reservations</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Client Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Menu</th>
                        <th scope="col">status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while ($row = $resultreservation->fetch_assoc()) {
                            var_dump($row);
                           // $row = $resultreservation->fetch_assoc();
                           $stmtmenu = $conn->prepare("SELECT menu_name FROM menu WHERE menu_id= ? ");
                           $stmtmenu->bind_param("i" , $row["menu_id"] );
                           $stmtmenu ->execute();
                           $resultmenu =  $stmtmenu->get_result();
                           $menu = $resultmenu->fetch_assoc();
                           $menu=$menu["menu_name"];   

                           $stmtuser = $conn->prepare("SELECT username FROM utilisateur WHERE user_id= ? ");
                           $stmtuser->bind_param("i" , $row["user_id"] );
                           $stmtuser ->execute();
                           $resultuser =  $stmtuser->get_result();
                           $username = $resultuser->fetch_assoc();
                           $name=$username["username"];   
                         
                         
                           var_dump($menu);
                            ?>
                            <tr>
                            <td><?= $name?></td>
                            <td><?= $row['reservation_date']?></td>
                            <td><?= $row['reservation_time']?></td>
                            <td><?= $menu ?></td>
                            <td><?= $row['status']?></td>

                            <td>
                                <div class="btn-group">
                                    <?php if ($row['status'] === 'pending') { ?>
                                        <button class="btn btn-success btn-accept" onclick="openApproving(<?= $row['id'] ?>)" >Approve</button>
                                        <button class="btn btn-danger btn-decline"  onclick="openDeclining(<?= $row['id'] ?>)" >Decline</button>
                                    <?php
                                    } elseif ($row['status'] === 'declined') {  ?>
                                        <button class="btn btn-success btn-accept" onclick="openApproving(<?= $row['id'] ?>)" >Approve</button>
                                    <?php    
                                    } elseif ($row['status'] === 'approved') {  ?>
                                        <button class="btn btn-danger btn-decline" onclick="openDeclining(<?= $row['id'] ?>)" >Decline</button>
                                    <?php    
                                    } ?>
                                   <!-- <button class="btn btn-success btn-accept">Approve</button>
                                   <button class="btn btn-danger btn-decline">Decline</button> -->
                                </div> 
                            </td>
                
                            </tr>
                        <?php    
                        }
                        ?>



                    <tr>
                        <td>John Doe</td>
                        <td>2024-12-20</td>
                        <td>6:00 PM</td>
                        <td>4</td>
                        <td>

                        <div class="btn-group">
                            <button class="btn btn-success btn-accept">Approve</button>
                            <button class="btn btn-danger btn-decline">Decline</button>
                        </div>    

                        </td>
                       
                    </tr>
               
                </tbody>
            </table>
        </div>

        <!-- View Statistics Section (Updated) -->
        <div id="viewStatsSection" class="form-section">


         <?php require "./statistics.php"?>
            <h2>Statistics</h2>
            <p>Here are some key statistics about the menus, plats, and reservations:</p>

            <!-- Cards for Statistics -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <i class="fas fa-utensils fa-3x text-primary"></i>
                            <h4 class="card-title mt-3">Pending Requests</h4>
                            <p class="card-text display-4"><?=$pending?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <i class="fas fa-pizza-slice fa-3x text-success"></i>
                            <h4 class="card-title mt-3">Approved Today</h4>
                            <p class="card-text display-4"><?=$nbr_today?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <i class="fas fa-calendar-check fa-3x text-danger"></i>
                            <h4 class="card-title mt-3">Approved for Tomorrow</h4>
                            <p class="card-text display-4"><?=$nbr_tomorrow?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Client & Reservation Details -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <h4 class="card-title">Next Client</h4>
                            <p class="card-text"><?=$username?> ON The <?=$reservation_date?></p>
                            <p class="card-text">Reservation for <?=$guests?> people</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <h4 class="card-title">Registered Clients</h4>
                            <p class="card-text display-4"><?=$users?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Menu Form -->

        <div id="addMenuSection" class="form-section">
            <h2>Add Menu</h2>
            <form id="menuForm" method ="POST" action="addMenu.php" enctype="multipart/form-data" >
                <div class="mb-3">
                    <label for="menuName" class="form-label">Menu Name</label>
                    <input type="text" class="form-control" id="menuName" name="menuName" placeholder="Enter menu name" required>
                </div>
                <div class="mb-3">
                    <label for="menuDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="menuDescription" name="menuDescription" rows="3" placeholder="Enter menu description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="menuImage" class="form-label">Menu Image</label>
                    <input type="file" class="form-control" id="menuImage" name="menuImage" accept="image/*" >
                </div>
                <hr>
                <h3>Plats</h3>
                <div id="platsContainer"></div>
                <button type="button" class="btn btn-secondary btn-form" id="addPlatButton"> + Add Plat</button>
                <!-- <hr> -->
                <button type="submit" class="btn btn-primary btn-form">Submit Menu</button>
            </form>
        </div>
        
 

    </div>


    <div id="approvingModal" class="modal">
        <div class="modal-content">
            <h3>Approving reservation</h3>
            <form action="Approving.php" method="POST"  >
                <input type="hidden" id="approvingId" name="reservation_id">
                <div class="btn-group">
                    <button type="submit" class="close-btn">Continue</button>
                    <button type="button" class="close-btn" onclick="closeApproving()">Close</button>
                </div>
            </form>
        </div>
    </div>

<div id="DecliningModal" class="modal">
    <div class="modal-content">
        <h3>Declining reservation</h3>
        <form action="Declining.php" method="POST"  >
            <input type="hidden" id="reservationId" name="reservation_id">
            <div class="btn-group">
                <button type="submit" class="close-btn">Continue</button>
                <button type="button" class="close-btn" onclick="closeDeclining()">Close</button>
            </div>
        </form>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        function openApproving(id) {
            document.getElementById('approvingId').value = id;
            document.getElementById('approvingModal').style.display = 'flex';
        }
    
        function closeApproving() {
            document.getElementById('approvingModal').style.display = 'none';
        }
        function openDeclining(id) {
            document.getElementById('reservationId').value = id;
            document.getElementById('DecliningModal').style.display = 'flex';
        }
    
        function closeDeclining() {
            document.getElementById('DecliningModal').style.display = 'none';
        }

            // Function to hide all sections and show the selected section
        function showSection(sectionId) {
        // Hide all sections
        document.querySelectorAll('.form-section').forEach(function(section) {
            section.classList.remove('visible');
        });
        
        // Show the selected section
        document.getElementById(sectionId).classList.add('visible');
        }

        // Event listeners for sidebar links to show the corresponding section
       

        document.getElementById('addMenuBtn').addEventListener('click', function() {
            showSection('addMenuSection');
        });

        document.getElementById('viewMenusBtn').addEventListener('click', function() {
            showSection('viewMenusSection');
        });

        document.getElementById('viewPlatsBtn').addEventListener('click', function() {
            showSection('viewPlatsSection');
        });

      

        document.getElementById('manageReservationsBtn').addEventListener('click', function() {
            showSection('manageReservationsSection');
        });

        // Added event listener for the statistics link
        document.getElementById('viewStatsBtn').addEventListener('click', function() {
            showSection('viewStatsSection');
        });

       





    const platsContainer = document.getElementById('platsContainer');
    const addPlatButton = document.getElementById('addPlatButton');
    let platCount = 0;

    addPlatButton.addEventListener('click', () => {
        platCount++;
        const platDiv = document.createElement('div');
        platDiv.className = 'plat-entry';
        platDiv.innerHTML = `
            <hr>
            <div class="mb-3">
                <label for="platName${platCount}" class="form-label">Plat Name</label>
                <input type="text" class="form-control" id="platName${platCount}" name="platName${platCount}" placeholder="Enter plat name" required>
            </div>
            <div class="mb-3">
                <label for="platDescription${platCount}" class="form-label">Description</label>
                <textarea class="form-control" id="platDescription${platCount}" name="platDescription${platCount}" rows="2" placeholder="Enter plat description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="platImage${platCount}" class="form-label">Plat Image</label>
                <input type="file" class="form-control" id="platImage${platCount}" name="platImage${platCount}" accept="image/*" >
            </div>
            <button type="button" class="btn btn-danger removePlatButton btn-form">Remove Plat</button>
            <hr>
        `;
        platsContainer.appendChild(platDiv);

        // Add remove functionality
        platDiv.querySelector('.removePlatButton').addEventListener('click', () => {
            platsContainer.removeChild(platDiv);
        });
    });



</script>
</body>
</html>
