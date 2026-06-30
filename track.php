<?php
require 'config.php';

// Enregistrement de la visite
$ip = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REQUEST_URI']; // récupère automatiquement le nom de la page visitée
$navigateur = $_SERVER['HTTP_USER_AGENT'];

$stmt = $pdo->prepare("INSERT INTO visites (ip, page, navigateur) VALUES (?, ?, ?)");
$stmt->execute([$ip, $page, $navigateur]);
?>
