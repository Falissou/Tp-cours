<?php
include 'db.php';

// Vérifier et sécuriser l'entrée utilisateur
$articleId = intval($_GET['id']);

// Préparer la requête pour l'article
$stmt = $conn->prepare("SELECT * FROM Article WHERE id = ?");
$stmt->bind_param("i", $articleId);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($article['titre']); ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($article['titre']); ?></h1>
    <p><?php echo htmlspecialchars($article['contenu']); ?></p>
    <small>Créé le <?php echo htmlspecialchars($article['dateCreation']); ?></small>
    <br>
    <a href="javascript:history.back()">Retour</a>
</body>
</html>
