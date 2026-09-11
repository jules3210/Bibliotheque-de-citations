# Bibliothèque de citations

Une application Symfony pour enregistrer, consulter et gérer une collection de citations.

## Fonctionnalités

- Lister toutes les citations
- Voir le détail d'une citation
- Ajouter une nouvelle citation
- Modifier une citation existante
- Supprimer une citation

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- Symfony CLI (recommandé)
- MySQL / MariaDB

## Installation

```bash
git clone https://github.com/jules3210/Bibliotheque-de-citations.git
cd Bibliotheque-de-citations
composer install
```

## Configuration

Copier le fichier `.env` en `.env.local` et renseigner les informations de connexion à la base de données :

```
DATABASE_URL="mysql://user:password@127.0.0.1:3306/bibliotheque_de_citations"
```

## Base de données

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## Lancer le projet

```bash
symfony serve
```

Ou avec le serveur PHP intégré :

```bash
php -S localhost:8000 -t public
```
