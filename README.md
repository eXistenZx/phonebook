# PHONEBOOK

## Installation
1. Créer la base de donnée en important le fichier database.sql dans phpMyAdmin
2. Renseigner les données de connexion dans le fichier config.conf
3. Executer "composer install" via un terminal à la racine de l'application
4. Lancer l'application via index.php


## Utilisation de l'API
Tests avec POSTMAN
1. Vérifier les données de connexion dans le fichier config.php
- Liste des contacts	=> http://localhost/your_path/phone_book/api/contacts
- Afficher un contact	=> http://localhost/your_path/phone_book/api/contacts/"nom du contact à afficher"
- Ajouter un contact	=> http://localhost/your_path/phone_book/api/add-contact.php
- Supprimer un contact	=> http://localhost/your_path/phone_book/api/contact/delete/"id du contact à supprimer"


## A développer

- Sécurité
- Recherche avec plusieurs termes
- Recherche phonétique : https://connect.ed-diamond.com/GNU-Linux-Magazine/GLMF-094/Ecriture-d-une-fonction-de-reconnaissance-phonetique-pour-MySQL
