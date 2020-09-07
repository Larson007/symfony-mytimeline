# **Symfony 5**

## **Commande CLI**

&nbsp;

---

&nbsp;

#### Commandes de DEV

````php
symfony serve
// l'adresse de mon serveur (visible sur .env et WAMP en locale) ou en lancant la comde symfony serve : 127.0.0.1:8000
````

&nbsp;

---

&nbsp;

### **Installation**

&nbsp;

#### Symfony

````php
composer create-project symfony/website-skeleton my_project_name
````

#### Dependances

````php
composer require symfony/webpack-encore-bundle

composer require symfony/asset

npm install
````

````npm
npm i node-sass --save-dev
npm i sass-loader
npm i jquery --save-dev
npm i --save-dev popper.js
npm i --save-dev bootstrap
````

&nbsp;

---

&nbsp;

### Mise a jour du fichier `webpack.config.js`

````js
// Pour activer on décommente la ligne suivante :
//.enableSassLoader()
  soit
.enableSassLoader()
````
---

&nbsp;

### Mise a jour du fichier `assets/css/app.css`

````scss
// 1 - Changer l'exention du fichier en .scss au lieu de .css
// 2 - Télécharger le fichier bootstrap.min.css et le placer dans le dossier assets/css

// 3 - faire un import de bootstrap dans le fichier app.scss
@import url('./bootstrap.min.css');

````

&nbsp;

### Mise a jour du fichier `assets/js/app.js`

````js
// Import Css en Sass
import '../css/app.scss';

// Import JQuery
var $ = require('jquery');

// Définition d'une variable global.$ pour rendre Jquery accessible sur tt les pages du site
global.$ = global.jQuery = $;

// Import de bootrsap et popper.js
require('bootstrap');

// Log pour vérfier si le script est bien charger sur nos page dans le console inspector du navigateur
console.log('script charger');
````

&nbsp;

---

&nbsp;

### Mise a jour du fichier `.env`

````php
// par defaut
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7

// la ligne ci dessous represente les bonnes valeurs pour se connecter à notre BDD mysql
DATABASE_URL=mysql://root:@127.0.0.1:3308/nom_de_la_bdd


````

&nbsp;

---

&nbsp;

### Création de la Bdd

````php
php bin/console doctrine:database:create
````

&nbsp;

---

&nbsp;

### Création d'une Entity

````php
php bin/console make:entity
````

&nbsp;

---

&nbsp;

### Création d'un Controller

````php
php bin/console make:controller
````
Cette commande crée un controller ET son fichier Twig 
&nbsp;

---

&nbsp;

### Faire une migration

````php
php bin/console make:migration
//puis
php bin/console doctrine:migrations:migrate
//ds les faits on sauvegarde à l instant T les differents entitées generées jusqu ici Avant de les envoyer à la BDD avec la 2eme commande
````

&nbsp;

---

&nbsp;

### Création d'une Fixtures

````php
// on installe d'abord le bundle fixtures
composer require --dev orm-fixtures
//puis
php bin/console make:fixtures
````

&nbsp;

---

&nbsp;

### Envoi des Fixtures en BDD

````php
php bin/console doctrine:fixtures:load
````
