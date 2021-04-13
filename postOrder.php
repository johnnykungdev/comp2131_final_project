<?php
    require './dbConnection.php';
    $pdo = db_connect();

    $foods = [];

    // function getData() {
    //     global $pdo;

    //     global $foods;
    //     //TODO
    //     $sql = 'INSERT INTO order ()';


    //     $result = $pdo -> query($sql);
        
    //     while($row = $result -> fetch()) {
    //       $foods[] = $row;
    //     }
    // }

    function postOrder() {
        global $pdo;
        
        $foodItems = $_POST['foodItems'];
        
        try {
            //start transaction
            $pdo->beginTransaction();
            //insert to crazy_order table
            $sql = "INSERT INTO crazy_order (order_id, name, address, card_number) VALUES(:order_id, :name, :address, :card_number)";
        
            $statement = $pdo -> prepare($sql);
            
            $statement -> bindValue(':order_id', $_POST['order_id']);
            $statement -> bindValue(':name', $_POST['name']);
            $statement -> bindValue(':address', $_POST['address']);
            $statement -> bindValue(':card_number', $_POST['card_number']);

            $statement-> execute();

            $foodOrderStatement = "INSERT INTO order_food (order_id, food_id, amount) VALUES (:order_id, :food_id, :amount)";
            $stmt = $pdo -> prepare($foodOrderStatement);
            
            foreach($foodItems as $key => $val) {
                $stmt -> bindValue(':order_id', (int)($_POST['order_id']));
                $stmt -> bindValue(':food_id', (int)($val['id']));
                $stmt -> bindValue(':amount', (int)($val['amount']));
                $stmt -> execute();
            }
            $pdo -> commit();
            echo $_POST['order_id'];
        } catch(Exception $e) {
            $pdo-> rollback();
            print_r ($e);
        }

 
    }

    if (isset($_POST)) {
        // echo $_POST['name'], $_POST['address'], $_POST['card_number'];
        postOrder();
    }
?>