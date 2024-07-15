<?php
include 'db.php';

// Vérifier et sécuriser l'entrée utilisateur
$categoryId = intval($_GET['id']);

// Préparer la requête pour les articles
$stmt = $conn->prepare("SELECT * FROM Article WHERE categorie = ?");
$stmt->bind_param("i", $categoryId);
$stmt->execute();
$result = $stmt->get_result();

// Préparer la requête pour la catégorie
$stmtCategorie = $conn->prepare("SELECT libelle FROM Categorie WHERE id = ?");
$stmtCategorie->bind_param("i", $categoryId);
$stmtCategorie->execute();
$resultCategorie = $stmtCategorie->get_result();
$category = $resultCategorie->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($category['libelle']); ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Articles de la catégorie <?php echo htmlspecialchars($category['libelle']); ?></h1>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            // Afficher chaque article
            while($row = $result->fetch_assoc()) {
                echo '<li><h2><a href="article.php?id=' . htmlspecialchars($row["id"]) . '">' . htmlspecialchars($row["titre"]) . '</a></h2>';
                echo '<p>' . htmlspecialchars($row["contenu"]) . '</p>';
                echo '<small>Créé le ' . htmlspecialchars($row["dateCreation"]) . '</small></li>';
            }
        } else {
            echo "0 articles dans cette catégorie";
        }
        $conn->close();
        ?>
    </ul>
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>
