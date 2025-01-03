<?php
require_once '../Acces_BD/Visiteur.php';
$visiteur = Rechercher($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editer un Visiteur</title>
</head>
<body>
    <form action="../Gestion_Actions/gestion_visiteurs.php" method="POST">
        <input type="hidden" name="ID" value="<?= $visiteur['ID'] ?>">
        <label>Nom:</label>
        <input type="text" name="NOM" value="<?= $visiteur['NOM'] ?>" required><br>
        <label>Prénom:</label>
        <input type="text" name="PRENOM" value="<?= $visiteur['PRENOM'] ?>" required><br>
        <label>Email:</label>
        <input type="email" name="EMAIL" value="<?= $visiteur['EMAIL'] ?>" required><br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
