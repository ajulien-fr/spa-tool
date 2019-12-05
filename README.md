# spa-tool

Petit projet en PHP utilisant Symfony et MySQL permettant de faciliter la gestion d'une association de type SPA.

Comment essayer / utiliser ce projet :

J'installe https://symfony.com/ ; https://getcomposer.org/ ; https://yarnpkg.com et https://www.mysql.com/

Je me connecte en root à la base de données.
Et j'exécute les commandes sql suivantes :
(vous pouvez les modifier mais alors il faudra aussi modifier la variable **DATABASE_URL** dans le fichier **.env** se trouvant à la racine du projet :

```sql
CREATE USER 'db_spa_user'@'localhost' IDENTIFIED BY 'db_spa_password';
GRANT ALL PRIVILEGES ON db_spa . * TO 'db_spa_user'@'localhost';
FLUSH PRIVILEGES;
```

À la racine du projet, j'installe les dépendances :

```sh
composer install
yarn install
```

Toujours à la racine du projet, je crée la base de donnée :

```sh
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

Vous pouvez modifier l'utilisateur admin et son password dans le fichier **src/DataFixtures/UserFixtures.php** avant de le charger :

```sh
php bin/console doctrine:fixtures:load
```

Et pour finir :

```sh
yarn encore dev
symfony serve
```
