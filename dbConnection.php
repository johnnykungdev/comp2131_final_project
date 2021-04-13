<?php 
    define('DBHOST', 'us-cdbr-east-03.cleardb.com');
    define('DBNAME', 'heroku_4f6ac3312be5f4b');
    define('DBUSER', 'bff7ef5d530b6c');
    define('DBPASS', 'd4e68e33');
    
    $link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    function db_connect() {

        try {
          // TODO
          // try to open database connection using constants set in config.php
          // return $pdo;
          $link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
          $connectionString = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
          $user = DBUSER;
          $pass = DBPASS;
          
          $pdo = new PDO($connectionString, $user, $pass);
          $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $pdo;
        }
        catch (PDOException $e)
        {
          die($e->getMessage());
        }
    }


?>