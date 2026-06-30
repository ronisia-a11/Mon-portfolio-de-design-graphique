<?php
session_start();
if (!isset($_SESSION['admin'])) {
    // Si pas connecté, redirection vers login
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
    <h1>Bienvenue Admin</h1>
    <p><a href="dashboard.php">Accéder au Dashboard</a></p>
    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
