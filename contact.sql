CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE portfolio_db;

-- Table des utilisateurs admin
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'admin'
);

-- Table des messages envoyés via le formulaire
CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    contact VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL,
    objectif VARCHAR(255) NOT NULL,
    explication TEXT NOT NULL,
    pays VARCHAR(100) NOT NULL,
    langue VARCHAR(50) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des visites
CREATE TABLE visites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(45),
    page VARCHAR(255),
    navigateur VARCHAR(255),
    date_visite TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password_hash, role)
VALUES ('admin', PASSWORD('monmotdepasse'), 'admin');

INSERT INTO users (username, password_hash, role)
VALUES ('admin', '$2y$10$VtaxlK5ZgDgVTLqz2BMMDeaRhvDW5.0humlGzXuHvTxCN3IQlwvTO', 'admin');


