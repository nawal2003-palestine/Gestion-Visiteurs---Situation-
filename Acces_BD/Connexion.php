<?php
function Connect() {
    // Charger les paramètres depuis le fichier .env
    $env = parse_ini_file(__DIR__ . '/../.env');
    $host = $env['Serveur'];
    $user = $env['Utilisateur'];
    $password = $env['Password'];
    $db_name = $env['db_name'];

    // Créer la connexion
    $conn = new mysqli($host, $user, $password, $db_name);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    return $conn;
}
?>


