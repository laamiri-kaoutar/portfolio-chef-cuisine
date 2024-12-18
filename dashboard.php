<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    width: auto; /* Make the button fit the content */
    padding: 10px 20px; /* Adjust padding to your preference */
}

.btn-primary:hover {
    background-color:#ac1c2b;
    border-color: #ac1c2b;
}

.btn-accept, .btn-decline {
    color: white;
}

/* Prevent buttons from taking full width in the form */
.form-section .btn {
    width: auto; /* Ensures buttons fit their content */
}




/* Styling buttons to be inline */
.btn-group .btn {
    margin-right: 24px; /* Add some space between the buttons */
}



    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Chef Dashboard</h4>
        <a href="#" id="addMenuBtn"><i class="fas fa-plus icon-btn"></i> Add Menu</a>
        <a href="#" id="viewMenusBtn"><i class="fas fa-list icon-btn"></i> View Menus</a>
        <a href="#" id="addPlatBtn"><i class="fas fa-plus-circle icon-btn"></i> Add Plat</a>
        <a href="#"><i class="fas fa-eye icon-btn"></i> View Plats</a>
        <a href="#"><i class="fas fa-calendar-check icon-btn"></i> Manage Reservations</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Welcome, Chef!</h1>

        <!-- Add Menu Section (Initially Hidden) -->
        <div id="addMenuSection" class="form-section">
            <h2>Add Menu</h2>
            <form>
                <div class="mb-3">
                    <label for="menuName" class="form-label">Menu Name</label>
                    <input type="text" class="form-control" id="menuName" required>
                </div>
                <div class="mb-3">
                    <label for="menuDescription" class="form-label">Menu Description</label>
                    <textarea class="form-control" id="menuDescription" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Menu</button>
            </form>
        </div>

        <!-- View Menus Section -->
        <h2>All Menus</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Menu Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Menu 1</td>
                    <td>Description of menu 1</td>
                    <td>
                        <!-- Use btn-group to keep buttons inline -->
                        <div class="btn-group">
                            <div class="btn">
                                <a href="">
                                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M15.7734 4.42255L8.01924 12.2706C7.79291 12.4996 7.67974 12.6142 7.60917 12.7552C7.53859 12.8961 7.51521 13.0544 7.46845 13.3709L7.30803 14.4566C7.12534 15.693 7.034 16.3112 7.40145 16.6645C7.7689 17.0178 8.39306 16.9118 9.64137 16.6999L10.7375 16.5139C11.0571 16.4596 11.2168 16.4325 11.3579 16.3593C11.499 16.2861 11.6121 16.1715 11.8385 15.9425L19.5927 8.09446C20.2553 7.42379 20.5866 7.08846 20.5814 6.67712C20.5761 6.26578 20.2363 5.93906 19.5566 5.28563L18.6209 4.38599C17.9412 3.73256 17.6014 3.40584 17.1844 3.4112C16.7674 3.41655 16.4361 3.75188 15.7734 4.42255Z" stroke="black" stroke-width="null" class="my-path"></path>
                                   <path d="M18.3329 9.22206L14.7773 5.6665" stroke="black" stroke-width="null" class="my-path"></path>
                                   <path d="M21 21H3" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                   </svg>
                                </a>
                            </div>

                            <div class="">
                               <a href="">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M5 7L5.29949 14.7868C5.41251 17.7252 5.46902 19.1944 6.40719 20.0972C7.34537 21 8.81543 21 11.7555 21H12.2433C15.1842 21 16.6547 21 17.5928 20.0972C18.531 19.1944 18.5875 17.7252 18.7006 14.7868L19 7" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 <path d="M10 13V16" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 <path d="M14 13V16" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 <path d="M20.4706 4.43329C18.6468 4.27371 17.735 4.19392 16.8229 4.13611C13.6109 3.93249 10.3891 3.93249 7.17707 4.13611C6.26506 4.19392 5.35318 4.27371 3.52942 4.43329" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 <path d="M13.7647 3.95212C13.7647 3.95212 13.3993 2.98339 11.6471 2.9834C9.8949 2.9834 9.52942 3.95211 9.52942 3.95211" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 </svg>
                               </a>
                            </div>
                          

                            <!-- <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> -->
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Add Plat Section (Initially Hidden) -->
        <div id="addPlatSection" class="form-section">
            <h2>Add Plat</h2>
            <form>
                <div class="mb-3">
                    <label for="platName" class="form-label">Plat Name</label>
                    <input type="text" class="form-control" id="platName" required>
                </div>
                <div class="mb-3">
                    <label for="platDescription" class="form-label">Plat Description</label>
                    <textarea class="form-control" id="platDescription" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="platImage" class="form-label">Plat Image URL</label>
                    <input type="url" class="form-control" id="platImage" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Plat</button>
            </form>
        </div>

        <!-- View Plats Section -->
        <h2>All Plats</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Plat Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Plat 1</td>
                    <td>Description of plat 1</td>
                    <td><img src="plat1.jpg" alt="Plat 1" width="50"></td>
                    <td>
                        <!-- Use btn-group to keep buttons inline -->
                        <div class="btn-group">
                            <div class="btn">
                                <a href="">
                                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M15.7734 4.42255L8.01924 12.2706C7.79291 12.4996 7.67974 12.6142 7.60917 12.7552C7.53859 12.8961 7.51521 13.0544 7.46845 13.3709L7.30803 14.4566C7.12534 15.693 7.034 16.3112 7.40145 16.6645C7.7689 17.0178 8.39306 16.9118 9.64137 16.6999L10.7375 16.5139C11.0571 16.4596 11.2168 16.4325 11.3579 16.3593C11.499 16.2861 11.6121 16.1715 11.8385 15.9425L19.5927 8.09446C20.2553 7.42379 20.5866 7.08846 20.5814 6.67712C20.5761 6.26578 20.2363 5.93906 19.5566 5.28563L18.6209 4.38599C17.9412 3.73256 17.6014 3.40584 17.1844 3.4112C16.7674 3.41655 16.4361 3.75188 15.7734 4.42255Z" stroke="black" stroke-width="null" class="my-path"></path>
                                   <path d="M18.3329 9.22206L14.7773 5.6665" stroke="black" stroke-width="null" class="my-path"></path>
                                   <path d="M21 21H3" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                   </svg>
                                </a>
                            </div>

                            <div class="">
                               <a href="">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M5 7L5.29949 14.7868C5.41251 17.7252 5.46902 19.1944 6.40719 20.0972C7.34537 21 8.81543 21 11.7555 21H12.2433C15.1842 21 16.6547 21 17.5928 20.0972C18.531 19.1944 18.5875 17.7252 18.7006 14.7868L19 7" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 <path d="M10 13V16" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 <path d="M14 13V16" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 <path d="M20.4706 4.43329C18.6468 4.27371 17.735 4.19392 16.8229 4.13611C13.6109 3.93249 10.3891 3.93249 7.17707 4.13611C6.26506 4.19392 5.35318 4.27371 3.52942 4.43329" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 <path d="M13.7647 3.95212C13.7647 3.95212 13.3993 2.98339 11.6471 2.9834C9.8949 2.9834 9.52942 3.95211 9.52942 3.95211" stroke="black" stroke-width="null" stroke-linecap="round" class="my-path"></path>
                                 </svg>
                               </a>
                            </div>
                          

                            <!-- <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> -->
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>

        <!-- Manage Reservations Section -->
        <h2>Manage Reservations</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Menu 1</td>
                    <td>2024-12-20 18:00</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>
                        <!-- Use btn-group to keep buttons inline -->
                        <div class="btn-group">
                            <button class="btn btn-accept">a</button>
                            <button class="btn btn-decline"><i class="fas fa-times-circle"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle visibility for Add Menu form
        document.getElementById('addMenuBtn').addEventListener('click', function() {
            document.getElementById('addMenuSection').classList.toggle('form-section');
            document.getElementById('addPlatSection').classList.add('form-section');  // Hide Add Plat form if it's visible
        });

        // Toggle visibility for Add Plat form
        document.getElementById('addPlatBtn').addEventListener('click', function() {
            document.getElementById('addPlatSection').classList.toggle('form-section');
            document.getElementById('addMenuSection').classList.add('form-section');  // Hide Add Menu form if it's visible
        });
    </script>
</body>
</html>
