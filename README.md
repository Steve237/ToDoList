# Projet 8 Openclassroom/To Do List

## Comment installer le projet en local?

1. Cloner ou télécharger le projet

Vous devez d'abord cloner le projet en tapant la commande suivante dans le terminal de votre editeur de code :

```
git clone https://github.com/Steve237/ToDoList
```

2. Utiliser composer pour mettre en place les dépendances du projet

Exécutez la commande suivante dans votre terminal pour réaliser cela:

```
composer install
```

3.Configurer le fichier .env à la racine du projet pour relier le projet à votre base de données.

En effet, dans ce fichier vous devez enregistrez les identifiants de connexion à votre base de données:

-username correspond à votre nom d'utilisateur et password au mot de passe que vous utilisez pour vous connecter à votre base de données.

-nomdelabasededonnees: ici vous devez indiquer le nom de la base de données qui contiendra les tables du projet

```
DATABASE_URL="mysql://username:password@127.0.0.1:3306/nomdelabasededonnees"
```
4. Créez la base de données.

Exécutez la commande suivante sur votre terminal pour créer la base de données :

```
php bin/console create:database
```
Cela générera une base de données correspondant au nom que vous avez indiqué dans le fichier .env, comportant toutes les tables requises pour le projet.

5) Démarrez le server :

Il s'agit de réaliser la commande suivante sur le terminal de votre IDE : 

```
php bin/console symfony server:start
```
L'application sera ensuite accessible via l'url (http://127.0.0.1:8000)

Le badge de qualité que nous avons obtenu sur Codacity est le grade A : 
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/4017d9fc03f641938dd85e85019f00a2)](https://www.codacy.com/gh/Steve237/ToDoList/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Steve237/ToDoList&amp;utm_campaign=Badge_Grade)
