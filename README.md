# **My TIMELINE**

&nbsp;

## **INSTALLATION**

---

&nbsp;

### **SYMFONY**

````cli
symfony new my-timeline --full
````

&nbsp;

### **DEPANDENCES**

&nbsp;

#### `#` ***COMPOSER***

````php
//WEBPACK ENCORE
composer require symfony/webpack-encore-bundle

//ASSETS
composer require symfony/asset

// INSTALLATION DES DEPANDANCES WEBPACK ENCORE VIA NPM
npm install
````

&nbsp;

#### `#` ***NPM***

````cli
npm i node-sass --save-dev
npm i sass-loader
npm i jquery --save-dev
npm i --save-dev popper.js
npm i --save-dev bootstrap
````

&nbsp;

### **MISE A JOURS DES FICHIERS DE CONFIG**

&nbsp;

#### `#` ***webpack.config.js***

````js
// Pour activer SASS, on décommente la ligne suivante :
.enableSassLoader()
````

&nbsp;

#### `#` ***assets/css/app.css***

````scss
// 1 - Changer l'exention du fichier en .scss au lieu de .css
// 2 - Télécharger le fichier bootstrap.min.css et le placer dans le dossier assets/css

// 3 - faire un import de bootstrap dans le fichier app.scss
@import url('./bootstrap.min.css');
````

&nbsp;

#### `#` ***assets/js/app.js***

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

#### `#` ***BASE.HTML.TWIG***

````twig
{# IMPORT DE APP.CSS DU WEBPACK ENCORE DANS LE <head> #}
{% block stylesheets %}
    {{ encore_entry_link_tags('app') }}
{% endblock %}

{# IMPORT DE APP.JS DU WEBPACK ENCORE AVANT LA FERMETURE DU </body> #}
{% block javascripts %}
    {{ encore_entry_script_tags('app') }}
{% endblock %}
````

&nbsp;

#### `#` ***.env***

````env
# par defaut :
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7

# la ligne ci dessous represente les bonnes valeurs pour se connecter à notre BDD mysql :
DATABASE_URL=mysql://root:@127.0.0.1:3308/nom_de_la_bdd
````

---
---

&nbsp;

## **PROJETS**

---

&nbsp;

### **INITIALISATION**

---

&nbsp;

#### `#` ***CREATION DE LA BDD***

````php
php bin/console doctrine:database:create
````

&nbsp;

#### `#` ***CREATION DU LOGIN***

````php
// CREATION DE L'ENTITY USER
php bin/console make:user

// CREATION DU CONTROLLER DE LOGIN/LOGOUT
php bin/console make:auth

// INDIQUER LE TODO DANS LOGINCONTROLLER.PHP DE LA REDIRECTION LORS DU LOGOUT
return new RedirectResponse($this->urlGenerator->generate('NOM-DE-LA-@ROUTE'));
````

&nbsp;

#### `#` ***CREATION DU REGISTER FORM***

````php
php bin/console make:registration-form
````

&nbsp;

#### `#` ***MIGRATION DE USERS***

````php
php bin/console make:migration
//puis
php bin/console doctrine:migrations:migrate
//ds les faits on sauvegarde à l instant T les differents entitées generées jusqu ici Avant de les envoyer à la BDD avec la 2eme commande
````

---
---

&nbsp;

### **CONTROLLER**

---

&nbsp;

#### `#` ***HOMEPAGECONTROLLER***

````php
php bin/console make:controller HomePageController
````

