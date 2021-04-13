<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require './dbConnection.php';
    $pdo = db_connect();
    
    $foods = [];
    
    
    function getFoods() {
        global $pdo;

        global $foods;
        //TODO
        $sql = 'SELECT * FROM food';

        $result = $pdo -> query($sql);
        
        while($row = $result -> fetch()) {
          $foods[] = $row;
        }
    }

    getFoods();
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="./assets/css/index.css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./assets/js/index.js"  type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include './component/navigation/navigation.php'; ?>
        <section class="menu">
            <?php 
                foreach( $foods as $key => $food ) {
                    ?>
                        <div class="food-row">
                            <div class="food-thumbnail">
                                <img src=<?php echo $food['imgUrl']?> alt="spicy hotpot"/>
                            </div>
                            <div class="food-desc">
                                <div class="food-name"><?php echo $food['name']?></div>
                                <div class="food-interaction" >
                                    <div class="food-price" id=<?php echo $food['price']?>>price: <?php echo $food['price']?></div>
                                    <select class="food-quantity">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                    <!-- need to add listener for add-->
                                    <button class="add-food" id=<?php echo $food['food_id']?> >ADD</button>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </section>
        <footer>
            
        </footer>
        <div class="action-bar">
            <button>GO TO CART</button>
        </div>
    </body>
</html>