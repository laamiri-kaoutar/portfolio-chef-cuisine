<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

      <!-- Favicons -->
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

</head>
<body>

<section>
    <div class="form-container">
        <h2 style="color: var(--heading-color);">Login</h2>
        <form action="login.php" method="POST">
            <label for="username" style="color: var(--default-color);">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
    
            <label for="password" style="color: var(--default-color);">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
    
            <button type="submit" style="background-color: var(--accent-color); color: var(--contrast-color);">Login</button>
        </form>
        <p style="color: var(--default-color);">Don't have an account? <a href="register.php" style="color: var(--accent-color);">Register</a></p>
    </div>
        
</section>
    
</body>
</html>