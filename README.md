# Bibliothèque de citations

Une application Symfony pour enregistrer, consulter et gérer une collection de citations. Le projet permet d'ajouter, consulter, modifier et supprimer des citations, tout en gardant une trace de leur popularité grâce à un compteur de vues.

## Fonctionnalités

### Fonctionnalités principales

- **Afficher la bibliothèque** : présenter l'ensemble des citations enregistrées dans une liste claire et lisible
- **Afficher les informations d'une citation** : texte, auteur, source ou origine si elle est renseignée, date d'ajout et autres informations complémentaires
- **Ajouter une citation** : formulaire permettant de créer une nouvelle citation
- **Contrôler les informations saisies** : validation des champs obligatoires avec des messages d'erreur clairs en cas de saisie incorrecte
- **Consulter une citation** : page dédiée présentant la citation et toutes ses informations
- **Modifier une citation** : corriger ou mettre à jour une citation existante
- **Supprimer une citation** : retirer une citation de la bibliothèque, avec demande de confirmation avant suppression définitive
- **Gérer une bibliothèque vide** : afficher un message adapté lorsqu'aucune citation n'est disponible
- **Navigation** : permettre de passer facilement entre la liste, l'ajout, la consultation et la modification d'une citation

### Fonctionnalité bonus

- **Compteur de vues** : chaque consultation du détail d'une citation incrémente automatiquement un compteur (`nbr_vues`) directement en base de données. Cette valeur permet de suivre la popularité de chaque citation au fil du temps.

## Types de données

L'entité `Citation` est composée des champs suivants :

| Champ            | Type              | Obligatoire | Description                                              |
|------------------|-------------------|-------------|------------------------------------------------------------|
| `id`             | int (auto)        | Oui         | Identifiant unique de la citation                          |
| `texte`          | text              | Oui         | Le contenu de la citation                                   |
| `auteur`         | string (50)       | Oui         | L'auteur de la citation (2 à 50 caractères)                |
| `created_at`     | datetime          | Oui         | Date d'ajout de la citation                                 |
| `source`         | string (255)      | Non         | Source ou origine de la citation                            |
| `annee_citation` | int               | Non         | Année à laquelle la citation a été prononcée ou écrite      |
| `contexte`       | text              | Non         | Contexte dans lequel la citation a été formulée             |
| `lieu`           | string (150)      | Non         | Lieu associé à la citation (2 à 150 caractères)             |
| `type_citation`  | string (150)      | Oui         | Type ou catégorie de la citation (2 à 150 caractères)       |
| `nbr_vues`       | int               | Oui         | Nombre de fois où la citation a été consultée               |

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
