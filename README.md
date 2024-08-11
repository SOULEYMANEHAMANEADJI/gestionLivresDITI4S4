# Gestion des Livres - Laravel

Une application web pour la gestion des livres avec des fonctionnalités CRUD protégées par une authentification.

## Fonctionnalités

- Authentification des utilisateurs.
- CRUD complet pour les livres : ajout, modification, visualisation, suppression.
- Gestion des utilisateurs avec inscription, connexion, et réinitialisation de mot de passe.

## Table `books`

Les champs de la table `books` :
- `title` : Titre du livre (string).
- `description` : Description du livre (text).
- `author` : Auteur du livre (string).
- `cover_image` : Image de couverture (string).
- `nb_pages` : Nombre de pages (integer).

## Installation

1. **Cloner le dépôt :**
   ```bash
   git clone https://github.com/SOULEYMANEHAMANEADJI/gestionLivresDITI4S4.git
   cd gestion-livres-laravel
   ```

2. **Installer les dépendances :**
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Configurer l'environnement :**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Exécuter les migrations :**
   ```bash
   php artisan migrate
   ```

5. **Lancer le serveur :**
   ```bash
   php artisan serve
   ```

## Utilisation

### Authentification

Les utilisateurs doivent se connecter pour accéder aux fonctionnalités CRUD des livres. Les routes d'authentification sont les suivantes :
- `GET /login` : Afficher le formulaire de connexion.
- `POST /login` : Se connecter.
- `POST /logout` : Se déconnecter.
- `GET /register` : Afficher le formulaire d'inscription.
- `POST /register` : S'inscrire.
- `GET /password/reset` : Afficher le formulaire de réinitialisation de mot de passe.
- `POST /password/email` : Envoyer le lien de réinitialisation.
- `POST /password/reset` : Réinitialiser le mot de passe.

### Gestion des Livres

- `GET /books` : Lister tous les livres.
- `GET /books/create` : Afficher le formulaire de création d'un nouveau livre.
- `POST /books` : Enregistrer un nouveau livre.
- `GET /books/{book}` : Afficher les détails d'un livre spécifique.
- `GET /books/{book}/edit` : Afficher le formulaire d'édition d'un livre.
- `PUT /books/{book}` : Mettre à jour un livre existant.
- `DELETE /books/{book}` : Supprimer un livre.

## Contribution

Les contributions sont les bienvenues via les issues du dépôt.
--
## MineHAS
