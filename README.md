# TRUCKSMANIA 
## Description
Il s’agit de mettre en relations des gérants de foodtrucks avec les habitants des villes ou villages alentours. Chaque foodtruck inscrit est classé par thématiques (Italien , Grec , Américain, …) car les commerces de proximité ne répondent pas suffisamment aux besoins de la population en terme de choix alimentaires.Cela s'effectuera sur un  site plate forme qui affichera la position des foodtrucks avec ses horaires , son emplacement précis, ainsi que la possibilité de passer sa commande directement depuis le site.
-Les gérants pourront entièrement gérer leurs cartes ( ajout/suppression de menus/plats) ainsi que leurs commandes sur leur point de vente via le site.
-Les clients quand à eux pourront choisir leur type de nourriture, localiser le foodtruck le plus proche et passer leurs commandes,
-Les comptes «Pros» seront réservés à des intervenants qui pourront proposer aux gérants de se placer sur des événements particuliers tel que des festivals , des fêtes de villages, des soirées privées, … 
En mettant en place ce projet nous voulons mettre l’alimentation au service de la population.

## Installation

1. Télécharger le projet.
2. Mettez en place le virtualhost. (Trucksmania.bwb)
3. Créer une base de données "Trucksmania".
4. Importez dans votre base de données le fichier "Trucksmania.sql"
5. Configurez les accés en base de données dans le fichier database.json




## Structure
 
1. Le dossier core/   
il contient tous les fichiers necessaires au fonctionnement du framework. 
2. Le dossier config/   
Contient les fichiers de configuration :
 * database.json : configuration de la base de données
 * routing.json : configuration du mapping entre les routes et les controleurs
3. Le dossier controllers/   
Doit contenir les controleurs qui vont être invoqués lors des requêtes http
4. Le dossier dao/   
Doit contenir les fichiers DAO pour l'accés aux données
5. Le dossier models/   
Doit contenir les entités correspondant a la logique metier de l'application
6. Le dossier views/   
Doit contenir toutes les vues de l'application
7. Le dossier vendor/   
Qui contient les dépendances récupérées via composer
8. A la racine   
 * le fichier index.php qui est le point d'entrée de l'application
 * le fichier composer.json qui est le fichier de configuration de composer
 * le fichier .htaccess qui override la configuration d'apache (assurez vous d'avoir le mod_rewrite activé et opérationnel)


