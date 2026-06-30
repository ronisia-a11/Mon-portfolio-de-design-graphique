<?php
header('Content-Type: application/json');
require 'config.php'; // fichier qui contient la connexion PDO à ta base MySQL

// Récupération et nettoyage des champs
$nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
$contact = htmlspecialchars(trim($_POST['contact'] ?? ''));
$email = htmlspecialchars(trim($_POST['gmail'] ?? ''));
$objectif = htmlspecialchars(trim($_POST['objectif'] ?? ''));
$explication = htmlspecialchars(trim($_POST['explication'] ?? ''));
$pays = htmlspecialchars(trim($_POST['pays'] ?? ''));
$langue = htmlspecialchars(trim($_POST['langue'] ?? ''));

// Vérification basique
if (empty($nom) || empty($contact) || empty($email) || empty($objectif) || empty($explication) || empty($pays) || empty($langue)) {
    echo json_encode(['statut'=>'erreur','message'=>'Tous les champs sont obligatoires']);
    exit;
}

// Insertion SQL dans la table Contact
$sql = "INSERT INTO client (nom, contact, email, objectif, explication, pays, langue) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $contact, $email, $objectif, $explication, $pays, $langue]);

echo json_encode(['statut'=>'ok','message'=>'Message ajouté avec succès !']);
?>
