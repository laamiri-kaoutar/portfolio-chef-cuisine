<?php
require "./include/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menuName = $_POST['menuName'];
    $menuDescription = $_POST['menuDescription'];

    $stmtMenu = $conn->prepare("INSERT INTO menu (menu_name	, description) VALUES (?, ?)");
    $stmtMenu->bind_param("ss", $menuName, $menuDescription);

    if ($stmtMenu->execute()) {
        $menuId = $conn->insert_id;

        // Étape 2 : Récupération des plats
        foreach ($_POST as $key => $value) {

            $pattern = "/^platName/";
            
            if (preg_match($pattern, $key) == 1) {

                $platNumber = preg_replace($pattern, "", $key);
                $platName = $value;
                $platDescription = $_POST["platDescription$platNumber"];

                // Insertion du plat
                $Plat = $conn->prepare("INSERT INTO plat (plat_name	, description ) VALUES (?, ?)");
                $Plat->bind_param("ss", $platName, $platDescription);
                if ($Plat->execute()) {
                    $platId = $Plat->insert_id;

                    // Création de la relation dans platMenu
                    $assoc = $conn->prepare("INSERT INTO menu_plat (menu_id, plat_id) VALUES (?, ?)");
                    $assoc->bind_param("ii", $menuId, $platId);
                    $assoc->execute();
                }
            }
        }

        echo "Menu et plats ajoutés avec succès.";
    } else {
        echo "Erreur lors de l'ajout du menu.";
    }
}

?>