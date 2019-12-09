# m1webg2

## Évaluation

> Renseigner le dépôt git contenant votre évaluation sur codeshare : <https://codeshare.io/5QJOxw>

## Principales commandes

### Commandes générales

`symfony new <DOSSIER>` : créer un nouveau projet

`symfony console` : lister toutes les commandes

`symfony console serve` : lancer le serveur PHP

### Commandes de référence

`symfony console debug:router` : lister les routes

`symfony console debug:twig` : lister les fonctions, filtres et variables globales de Twig

`symfony console debug:container` : lister tous les services

### Commandes de création de modèles

`symfony console make:twig-extension` : créer une extension Twig

`symfony console make:form` : créer une classe de formulaire

`symfony console make:subscriber` : créer une classe de souscripteur d'événements Symfony

### Commandes liées à Doctrine

`symfony console make:entity` : créer/modifier une entité

`symfony console make:entity --regenerate` : créer les accesseurs/mutateurs des nouvelles propriétés d'une entité

`symfony console make:entity --regenerate --overwrite` : recréer tous les accesseurs/mutateurs d'une entité

`symfony console make:migration` : créer les migrations de la base de données

`symfony console make:fixtures` : créer un modèle de données fictives

`symfony console doctrine:database:create` : créer la base de données

`symfony console doctrine:database:drop --force` : supprimer la base de données

`symfony console doctrine:migrations:migrate` : exécuter les migrations

`symfony console doctrine:fixtures:load` : charger les données fictives

### Commandes liées à la sécurité

`symfony console make:user` : créer une entité de comptes utilisateurs

`symfony console make:auth` : créer un authentificateur de comptes utilisateurs

`symfony console make:registration-form` : créer un formulaire de création de comptes utilisateurs

## Principaux composants

`composer require <COMPOSANT>` : installer un composant ou une dépendance

`annot` : utiliser les annotations

`twig` : utiliser le moteur de template [Twig](https://twig.symfony.com/)

`debug` : gérer le débogage

`encore` : utiliser webpack pour gérer les fichiers JS et CSS

`mailer` : utiliser [swiftmailer](https://swiftmailer.symfony.com/) pour gérer les emails

`make` : créer des modèles de classes PHP

`form` : créer des formulaires

`validator` : créer des contraintes de validation sur les champs de formulaires

`orm` : utiliser l'ORM [Doctrine](https://www.doctrine-project.org/projects/orm.html)

`ormfixtures` : gérer des données fictives avec Doctrine

`twigextensions` : ajouter des fonctions supplémentaires à Twig

`security` : authentification et autorisations

## Bibliothèques externes

`faker` : <https://github.com/fzaninotto/Faker>

`doctrine extensions` : <https://github.com/beberlei/DoctrineExtensions>

## Références

Documentation : <https://symfony.com/doc/current/index.html>

Champs de formulaire : <https://symfony.com/doc/current/reference/forms/types.html>

Contraintes de validation sur les champs de formulaire  : <https://symfony.com/doc/current/reference/constraints.html>

## Plan de cours

* Installation d'un projet Symfony

* Création du premier contrôleur

	* Request et Response

	* Afficher une vue Twig

* Gestion des routes

	* Créer une route avec des annotations

	* Créer une route avec un paramètre

* Twig

	* Principaux fonctions et filtres

	* Créer une extension Twig

	* Créer des variables globales

	* Gérer la mise en page

* Gérer les fichiers JS et CSS

	* Utilisation du composant Encore

	* Installation de Bootstrap et jQuery

* Gérer les formulaires

	* Créer une classe de formulaire

	* Gérer les champs de formulaire

	* Gérer les contraintes de validation des champs de formulaire

	* Gérer un formulaire dans un contrôleur

	* Fonctions Twig liées aux formulaires

* Gérer les emails

	* Utilisation du composant Mailer

	* Créer un email au format texte et HTML

* Doctrine

	* Création et connexion à une base de donnnées

	* Créer une entité

	* Créer des contraintes sur les entités

	* Créer et exécuter des migrations

	* Créer des données fictives

	* Méthodes de sélection par défaut des classes de dépôt

	* Souscripteur d'événements Doctrine

* Création d'un espace d'administration

	* Ajouter, modifier et supprimer une entité

	* Gestion des fichiers

	* Souscripteur d'événements de formulaire

* Requêtes personnalisées avec Doctrine

	* Utilisation du Doctrine Query Language

	* Les différents modes de récupération des résultats

* Utilisation de l'AJAX

	* Récupération du contenu de la requête HTTP

	* Créer des réponses HTTP en JSON

* Sécurité

	* Gestion de l'authentification

	* Gestion des autorisations

	* Gestion des rôles