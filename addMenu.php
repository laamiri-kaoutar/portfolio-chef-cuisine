<?php
require "./include/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menuName = $_POST['menuName'];
    $menuPrice = $_POST['menuPrice'];

    // Étape 1 : Insertion du menu
    $stmtMenu = $conn->prepare("INSERT INTO menu (nom, prix) VALUES (?, ?)");
    $stmtMenu->bind_param("sd", $menuName, $menuPrice);

    if ($stmtMenu->execute()) {
        $menuId = $conn->insert_id;

        // Étape 2 : Récupération des plats
        foreach ($POST as $key => $value) {
            if (strpos($key, 'dishTitle') === 0) {
                $dishNumber = strreplace('dishTitle', '', $key);
                $dishTitle = $value;
                $dishCategory = $POST["dishCategory$dishNumber"];

                // Insertion du plat
                $stmtPlat = $conn->prepare("INSERT INTO plat (nom, categorie) VALUES (?, ?)");
                $stmtPlat->bind_param("ss", $dishTitle, $dishCategory);
                if ($stmtPlat->execute()) {
                    $platId = $stmtPlat->insert_id;

                    // Création de la relation dans platMenu
                    $stmtRelation = $conn->prepare("INSERT INTO platMenu (menu_id, plat_id) VALUES (?, ?)");
                    $stmtRelation->bind_param("ii", $menuId, $platId);
                    $stmtRelation->execute();
                }
            }
        }

        echo "Menu et plats ajoutés avec succès.";
    } else {
        echo "Erreur lors de l'ajout du menu.";
    }
}

?>