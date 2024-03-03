PHP OOP Model
=============
Modèle de travail, en PHP, permettant d'interagir facilement et rapidement à la base de données MySQL.

## Installation ##
Premièrement, vous allez telecharger le code source. Ensuite, ouvrez le fichier configs.php et modifier les information selon votre configuration.
```PHP
<?php
return array(
   'COMPANY_NAME' => 'Company Name',
   // PHP
   'PHP_DEBUG' => true,
   // DATABASE
   'DB_HOST'     => 'localhost',
   'DB_NAME'     => 'your_database',
   'DB_USERNAME' => 'your_db_username',
   'DB_PASSWORD' => 'your_db_password',
   'DB_DEBUG'    => true, // enable database debuger
   // URL
   'URL_SHEME' => 'http',
   // DIRECTORIES
   'PARENT_DIR' => '/path/to/directory',
);
```
## Exemple d'utilisation ##
Accedons au dossier nommé ```models``` pour créer un modèle. Créons une classe ```Article```, qui herite la classe ```Model```.
```PHP
namespace models;

class Article extends Model
{
  public function yourMethod() {
    // your code here
  }
}
```
Ensuite, profitons la fonctionnalité qu'offert cette bibliothèque.
```PHP
// select all articles in the table
$articles = Database.selectAll("articles");
// or, to add some precisions
$articles = Database.selectAll("articles", "ORDER BY date");

// to select an article
$anArticle = Database.select("*", "articles", "id = :id", [id => 1]); // SELECT * FROM articles WHERE id = 1
```
Parfois,vous voulez faire comme ceci ```Database.selectAll("articles", "WHERE author = eric_fahendrena"). Bonne idée! Mais déconseillée, en raison de sécurité.
À la place, faite comme ceci:
```PHP
// connect to database
$pdo = Database.getPDO();

// prepare a request, then execute
$req = $pdo->prepare("SELECT * FROM articles WHERE author = :author");
$req->execute(array(
   author => "eric_fahendrena"
));

// get the articles
$myArticle = $req->fetchAll();
```
Ainsi, le code est plus flexible et sécurisé.
