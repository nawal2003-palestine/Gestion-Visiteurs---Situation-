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



## 📂 Structure du Projet

```
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
```

---



## 🔧 Configuration

 **Base de données :**
   - Créez une base de données MySQL nommée `gestion_visiteurs`.
   - Créez une table `VISITEURS` avec les champs suivants :
     ```sql
     CREATE TABLE VISITEURS (
         ID INT AUTO_INCREMENT PRIMARY KEY,
         NOM VARCHAR(25),
         PRENOM VARCHAR(25),
         EMAIL VARCHAR(25)
     );
     ```


 **Lancement de l'application :**
   - Déplacez le projet dans le répertoire racine de votre serveur web (`htdocs` pour XAMPP).
   - Accédez à `http://localhost/projet/index.php`.

---


## 📄 Tests

1. Accédez à `form_Saisie.php` pour ajouter un nouveau visiteur.
2. Modifiez un visiteur existant via `form_edit.php`.
3. Vérifiez la liste des visiteurs dans `affichage.php`.
4. Supprimez un visiteur et assurez-vous qu’il disparaît de la liste.

---




