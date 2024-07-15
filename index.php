<?php
include 'db.php';

$sql = "SELECT * FROM Categorie";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Bienvenue sur mon site de nouvelles</h1>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            // Afficher chaque catégorie
            while($row = $result->fetch_assoc()) {
                echo '<li><a href="category.php?id=' . htmlspecialchars($row["id"]) . '">' . htmlspecialchars($row["libelle"]) . '</a></li>';
            }
        } else {
            echo "0 résultats";
        }
        $conn->close();
        ?>
    </ul>
</body>
</html>
