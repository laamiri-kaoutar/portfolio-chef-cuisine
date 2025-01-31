
<?php 
session_start();
?>
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

  <style>
  .form_erros {
    color: #ff4d4f; 
    font-size: 0.875rem; 
    margin-top: 2px; 
    font-weight: 600; 
    background-color: #fff1f0; 
    border: 1px solid #ffa39e; 
    padding: 4px 8px; 
    border-radius: 4px; 
  }
  
  input {
    margin-bottom: 0; 
  }
  .champs{
    margin-bottom: 16px;
  }
</style>



</head>
<body>

<?php 



if (isset($_SESSION["errors"])) {
  $errors = $_SESSION["errors"];
  var_dump($errors);
  echo $errors["usedname"] ;

}

if (isset($_SESSION["registerData"])) {
  $registerData = $_SESSION["registerData"];
  var_dump($registerData);
  echo $registerData["username"] ;

}

var_dump(isset($_SESSION["registerData"]))  ;
var_dump(isset($_SESSION["errors"]))  ; 






?>

<section>
          <div class="form-container">
            <h2 style="color: var(--heading-color);">Register</h2>
            <form action="processregister.php" method="POST">
              <div class="champs">
                <label for="username" style="color: var(--default-color);">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" <?php if (isset($registerData)) { ?> value=" <?= $registerData["username"] ?> " <?php } ?> required>
                <?php if (isset($errors["usedname"])) {?>
                  <div class="form_erros"><?= $errors["usedname"] ?></div>
                <?php  
                } elseif (isset($errors["emptyname"])) {?> 
                  <div class="form_erros"><?= $errors["emptyname"] ?></div>
                <?php   
                } ?> 
              </div>

              <div class="champs">
                <label for="email" style="color: var(--default-color);">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" <?php if (isset($registerData)) { ?> value=" <?= $registerData["email"] ?> " <?php } ?> required>
                <?php if (isset($errors["invalidemail"])) {?>
                  <div class="form_erros"><?= $errors["invalidemail"] ?></div>
                <?php 
                } elseif (isset($errors["usedemail"])) {?> 
                  <div class="form_erros"><?= $errors["usedemail"] ?></div>
                <?php   
                } ?>  
             
              </div>
              <div class="champs">
                <label for="password" style="color: var(--default-color);">Password</label>
                <input type="password" id="password" name="password" placeholder="Choose a password" required>
                <?php if (isset($errors["password"])) {?>
                  <div class="form_erros"><?= $errors["password"] ?></div>
                <?php  
                } ?>
                
              </div>

              <div class="champs">
                <label for="confirm-password" style="color: var(--default-color);">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                <?php if (isset($errors["password"])) {?>
                  <div class="form_erros"><?= $errors["password"] ?></div>
                <?php  
                } ?>
              </div>
                <button type="submit" style="background-color: var(--accent-color); color: var(--contrast-color);">Register</button>
            </form>
            <p style="color: var(--default-color);">Already have an account? <a href="login.php" style="color: var(--accent-color);">Login</a></p>
        </div>
        
        </section>

    
</body>


</html>