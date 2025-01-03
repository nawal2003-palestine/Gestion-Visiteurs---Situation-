<?php
require_once 'Connexion.php';

function Ajouter($data) {
    $conn = Connect();
    $sql = "INSERT INTO VISITEURS (NOM, PRENOM, EMAIL) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $data['NOM'], $data['PRENOM'], $data['EMAIL']);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function Modifier($data) {
    $conn = Connect();
    $sql = "UPDATE VISITEURS SET NOM=?, PRENOM=?, EMAIL=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $data['NOM'], $data['PRENOM'], $data['EMAIL'], $data['ID']);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function Supprimer($id) {
    $conn = Connect();
    $sql = "DELETE FROM VISITEURS WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function Rechercher($id) {
    $conn = Connect();
    $sql = "SELECT * FROM VISITEURS WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $data;
}

function Lister() {
    $conn = Connect();
    $sql = "SELECT * FROM VISITEURS";
    $result = $conn->query($sql);
    $visiteurs = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $visiteurs;
}
?>
