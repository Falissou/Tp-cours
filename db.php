<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mglsi_news';

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Echec de connection : " . $conn->connect_error);
}
?>
