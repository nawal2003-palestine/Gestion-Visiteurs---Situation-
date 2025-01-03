<?php
require_once '../Acces_BD/Visiteur.php'; // Inclure les fonctions nécessaires

// Gestion des requêtes POST (ajout et modification)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'ajouter':
                if (!empty($_POST['NOM']) && !empty($_POST['PRENOM']) && !empty($_POST['EMAIL'])) {
                    $data = [
                        'NOM' => htmlspecialchars($_POST['NOM']),
                        'PRENOM' => htmlspecialchars($_POST['PRENOM']),
                        'EMAIL' => htmlspecialchars($_POST['EMAIL'])
                    ];
                    Ajouter($data);
                    header("Location: ../IHM/affichage.php");
                    exit();
                } else {
                    die("Erreur : Tous les champs sont obligatoires pour l'ajout.");
                }

            case 'modifier':
                if (!empty($_POST['ID']) && !empty($_POST['NOM']) && !empty($_POST['PRENOM']) && !empty($_POST['EMAIL'])) {
                    $data = [
                        'ID' => intval($_POST['ID']),
                        'NOM' => htmlspecialchars($_POST['NOM']),
                        'PRENOM' => htmlspecialchars($_POST['PRENOM']),
                        'EMAIL' => htmlspecialchars($_POST['EMAIL'])
                    ];
                    Modifier($data);
                    header("Location: ../IHM/affichage.php");
                    exit();
                } else {
                    die("Erreur : Tous les champs sont obligatoires pour la modification.");
                }
        }
    }
}

// Gestion des requêtes GET (suppression et formulaires)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'supprimer':
                if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
                    Supprimer(intval($_GET['id']));
                    header("Location: ../IHM/affichage.php");
                    exit();
                } else {
                    die("Erreur : ID invalide ou non fourni pour la suppression.");
                }

            case 'edit':
                if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
                    $visiteur = Rechercher(intval($_GET['id']));
                    if (!$visiteur) {
                        die("Erreur : Visiteur non trouvé avec l'ID spécifié.");
                    }
                    edit_form($visiteur);
                    exit();
                } else {
                    die("Erreur : ID invalide ou non fourni pour l'édition.");
                }

            case 'add':
                add_form();
                exit();
        }
    }
}

// Par défaut, liste des visiteurs
$visiteurs = Lister();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Visiteurs</title>
</head>
<body>
    <h1>Liste des Visiteurs</h1>
    <a href="gestion_visiteurs.php?action=add">Ajouter un Visiteur</a>
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
            <td><?= htmlspecialchars($visiteur['ID']) ?></td>
            <td><?= htmlspecialchars($visiteur['NOM']) ?></td>
            <td><?= htmlspecialchars($visiteur['PRENOM']) ?></td>
            <td><?= htmlspecialchars($visiteur['EMAIL']) ?></td>
            <td>
                <a href="gestion_visiteurs.php?action=edit&id=<?= $visiteur['ID'] ?>">Modifier</a>
                <a href="gestion_visiteurs.php?action=supprimer&id=<?= $visiteur['ID'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce visiteur ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
// Formulaire pour ajouter un visiteur
function add_form() {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Visiteur</title>
</head>
<body>
    <h1>Ajouter un Visiteur</h1>
    <form action="gestion_visiteurs.php" method="POST">
        <input type="hidden" name="action" value="ajouter">
        <label>Nom :</label>
        <input type="text" name="NOM" required><br>
        <label>Prénom :</label>
        <input type="text" name="PRENOM" required><br>
        <label>Email :</label>
        <input type="email" name="EMAIL" required><br>
        <button type="submit">Ajouter</button>
        <a href="affichage.php">Annuler</a>
    </form>
</body>
</html>
<?php
}

// Formulaire pour modifier un visiteur
function edit_form($visiteur) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Visiteur</title>
</head>
<body>
    <h1>Modifier un Visiteur</h1>
    <form action="gestion_visiteurs.php" method="POST">
        <input type="hidden" name="action" value="modifier">
        <input type="hidden" name="ID" value="<?= htmlspecialchars($visiteur['ID']) ?>">
        <label>Nom :</label>
        <input type="text" name="NOM" value="<?= htmlspecialchars($visiteur['NOM']) ?>" required><br>
        <label>Prénom :</label>
        <input type="text" name="PRENOM" value="<?= htmlspecialchars($visiteur['PRENOM']) ?>" required><br>
        <label>Email :</label>
        <input type="email" name="EMAIL" value="<?= htmlspecialchars($visiteur['EMAIL']) ?>" required><br>
        <button type="submit">Modifier</button>
        <a href="affichage.php">Annuler</a>
    </form>
</body>
</html>
<?php
}
?>
