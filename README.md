# Gestion des Visiteurs - Situation 3

Ce projet implémente une application web PHP/MySQL pour gérer les visiteurs. Dans cette situation, nous regroupons toutes les fonctionnalités de gestion des visiteurs dans un fichier unique et utilisons un formulaire commun pour l'insertion et la modification.

## Fonctionnalités

1. **Regroupement des gestionnaires d'actions :**  
   Toutes les fonctionnalités, auparavant réparties dans plusieurs fichiers du dossier `Gestion_Actions`, sont regroupées dans un seul fichier `Visiteur.php`. Ce fichier contient les fonctions suivantes :
   - `Ajouter($data)` : Ajout d'un nouveau visiteur.
   - `Modifier($data)` : Modification des informations d'un visiteur.
   - `Supprimer($id)` : Suppression d'un visiteur.
   - `Rechercher($id)` : Recherche d'un visiteur par ID.
   - `Lister()` : Liste tous les visiteurs.

2. **Formulaire unique pour insertion et modification :**  
   Un seul formulaire est utilisé pour les deux opérations, avec une gestion dynamique des champs et de l'action (ajout ou modification).

📂 Structure du Projet
bash
Copier le code
projet/
│
├── Acces_BD/
│   ├── Visiteur.php          # Fonctions d'accès à la base de données
│   ├── .env                  # Variables d'environnement pour la connexion DB
│   └── Connexion.php         # Classe ou fonctions pour gérer la connexion à la base de données
│
├── IHM/
│   ├── affichage.php         # Liste des visiteurs
│   ├── form_Saisie.php       # Formulaire pour ajouter un nouveau visiteur
│   └── form_edit.php         # Formulaire pour modifier un visiteur existant
│
├── Visiteur.php              # Contrôleur central des actions
│
├── index.php                 # Point d'entrée principal
│
└── README.md                 # Documentation du projet



4. **Lancement de l'application :**
   - Placez le projet dans le répertoire racine de votre serveur web (ex : `htdocs` pour XAMPP).
   - Accédez à l'application via votre navigateur à l'adresse : `http://localhost/GESTION_VISITEURS/IHM/index.php`.

## Tests

1. Accédez à `Formulaire.php` pour ajouter un nouveau visiteur ou modifier les données d'un visiteur existant.
2. Vérifiez que les visiteurs s'affichent correctement dans `Affichage.php`.
3. Testez les fonctionnalités de suppression et de recherche via les liens ou actions associés.


