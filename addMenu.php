<?php
require "./include/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menuName = $_POST['menuName'];
    $menuDescription = $_POST['menuDescription'];
    $menuImage = $_FILES['menuImage']['name'];
    $tempname = $_FILES['menuImage']['tmp_name'];
    $folder = 'assets/img/'.$menuImage;

    $stmtMenu = $conn->prepare("INSERT INTO menu (menu_name	, description , image) VALUES (?, ? ,?)");
    $stmtMenu->bind_param("sss", $menuName, $menuDescription ,$menuImage);

    move_uploaded_file($tempname , $folder);



    if ($stmtMenu->execute()) {
        $menuId = $conn->insert_id;

        // Étape 2 : Récupération des plats
        foreach ($_POST as $key => $value) {

            $pattern = "/^platName/";
            
            if (preg_match($pattern, $key) == 1) {

                $platNumber = preg_replace($pattern, "", $key);
                $platName = $value;
                $platDescription = $_POST["platDescription$platNumber"];
                $platImage = $_FILES["platImage$platNumber"]['name'];
                $tempname = $_FILES["platImage$platNumber"]['tmp_name'];
                $folder = 'assets/img/'.$platImage;

                // Insertion du plat
                $Plat = $conn->prepare("INSERT INTO plat (plat_name	, description , image ) VALUES (?, ? , ?)");
                $Plat->bind_param("sss", $platName, $platDescription , $platImage);
                if ($Plat->execute()) {
                    $platId = $Plat->insert_id;

                    // Création de la relation dans platMenu
                    $assoc = $conn->prepare("INSERT INTO menu_plat (menu_id, plat_id) VALUES (?, ?)");
                    $assoc->bind_param("ii", $menuId, $platId);
                    $assoc->execute();
                }

                move_uploaded_file($tempname , $folder);
            }
        }

        header("Location:./dashboard.php");
    } else {
        echo "Erreur lors de l'ajout du menu.";
    }
}

?>