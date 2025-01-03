<?php
require_once '../Acces_BD/Visiteur.php';
$visiteurs = Lister();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Visiteurs</title>
</head>
<body>
    <a href="../Gestion_Actions/gestion_visiteurs.php?action=add">Ajouter un Visiteur</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($visiteurs as $visiteur): ?>
        <tr>
            <td><?= $visiteur['ID'] ?></td>
            <td><?= $visiteur['NOM'] ?></td>
            <td><?= $visiteur['PRENOM'] ?></td>
            <td><?= $visiteur['EMAIL'] ?></td>
            <td>
            <a href="../Gestion_Actions/gestion_visiteurs.php?action=edit&id=<?= $visiteur['ID'] ?>">Editer</a>
            <a href="../Gestion_Actions/gestion_visiteurs.php?action=supprimer&id=<?= $visiteur['ID'] ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
