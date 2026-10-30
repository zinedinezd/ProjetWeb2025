# ProjetWeb2025 — Site de vente de produits Apple d'occasion

Application web de petites annonces permettant d'acheter et de vendre des produits Apple d'occasion (iPhone, iPad, Apple Watch…), développée en **PHP** avec le framework **CodeIgniter 4** (architecture MVC) et une base de données **MySQL**.

Projet réalisé en 2025 dans le cadre de mon bachelier en informatique de gestion (ICC, Bruxelles).

## Fonctionnalités

- **Catalogue** des annonces sur la page d'accueil, avec une page de détail pour chaque produit (prix, description)
- **Inscription et connexion** des utilisateurs, avec mots de passe hachés (bcrypt) et gestion de session
- **Espace « Mon compte »** pour l'utilisateur connecté
- **Publication d'annonces** via un formulaire (catégorie, modèle, année, prix, description)
- **Listes déroulantes dynamiques** : les modèles proposés s'adaptent à la catégorie choisie
- **Pages dédiées** par gamme de produits (iPhone 14, iPhone 15, iPad Air, Apple Watch Ultra)

## Technologies

| Domaine | Outils |
|---|---|
| Back-end | PHP 8.2, CodeIgniter 4 (MVC) |
| Base de données | MySQL / MariaDB, clés étrangères et suppression en cascade |
| Front-end | HTML, CSS |
| Environnement | XAMPP, phpMyAdmin, Git / GitHub |

## Structure de la base de données

- `personne` : utilisateurs (e-mail, mot de passe haché)
- `produit` : annonces (catégorie, modèle, année), liées à un vendeur
- `produit_detail` : prix et description de chaque annonce
- `gamme` : catalogue des modèles par catégorie

## Installation (en local avec XAMPP)

1. **Cloner le projet**
   ```bash
   git clone https://github.com/zinedinezd/ProjetWeb2025.git
   cd ProjetWeb2025
   ```

2. **Activer l'extension `intl`** de PHP : dans `C:\xampp\php\php.ini`, retirer le `;` devant `extension=intl`, puis redémarrer Apache.

3. **Créer la base de données** : dans phpMyAdmin, créer une base nommée `project2025` (interclassement `utf8mb4_general_ci`), puis importer le fichier `database/project2025.sql`.

4. **Vérifier la connexion** dans `app/Config/Database.php` (par défaut : utilisateur `root`, mot de passe vide, base `project2025`).

5. **Lancer le serveur** (MySQL doit être démarré dans XAMPP)
   ```bash
   php spark serve --port 8081
   ```
   Puis ouvrir http://localhost:8081

## Compte de démonstration

| E-mail | Mot de passe |
|---|---|
| `demo@example.com` | `Demo1234!` |

La base de démonstration contient quelques annonces d'exemple pour tester le site directement.

## Auteur

**Zine-Dine Ben Merdes** — étudiant en informatique de gestion à Bruxelles
GitHub : [@zinedinezd](https://github.com/zinedinezd)
