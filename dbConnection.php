<?php 
    define('DBHOST', 'localhost');
    define('DBNAME', 'crazyKitchen');
    define('DBUSER', 'root');
    define('DBPASS', '');
    
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