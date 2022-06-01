# test-de-connaissances-1
 
Premier test de connaissance réalisé. 
Pour le lancer configurer l'accès a la bdd dans le projet symfony situé dans le dossier "Api-api-platform"

puis lancer le projet symfony avec la commande symfony serve 

puis ouvrir dans un navigateur la page web "Home.html" 

( l'api node.js est pour le moment plus utilisable par l'IHM, car je l'ai refaite sur api platform avec des endpoints différents suite à une remarque qu'on m'a fait après le rendu.

et je travaille encore un peu sur l'api api plateform, car elle est pas encore terminée au niveau de swagger/openapi mais elle est bien fonctionnelle) 


Consignes: 

Voici le test technique séparé séparé selon les domaines testés:
 
BDD:
 
Créer une structure de donnée mysql comprenant en data:

- organisations (id, nom)

- building liés aux organisations (id, nom, zipcode,  lien vers l'organisation)

- pièces liées aux building (id, nom, personnes présentes dans la pièce, lien vers le building)
 
ApiRest:

Il faudra developper une api permettant de récupérer la liste des organisations, des building liés à une organisation, des pièces liés à un building.

puis de récupérer le nombre de personnes au total dans une pièce, un building et une organisation.
 
IHM

Une page basique en Javascript permettant d’afficher les stats (ou graphes, c’est encore mieux)

les différents nombres de personnes présentes dans les pièces, building et organisations.
