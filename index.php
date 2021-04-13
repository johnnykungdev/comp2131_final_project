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
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Crazy Kitchen Home</title>
  <link rel="stylesheet" href="./assets/css/checkout.css">
  <link rel="stylesheet" href="./assets/css/index.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="./assets/js/index.js"  type="text/javascript"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- partial:index.partial.html -->
<!-- Compiled and minified JavaScript -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

<!--Begin Checkout-->



<div class="container">
  <div class="box card-panel z-depth-3">
    <div class="merchant">
      <img id="logo" style="display: block, margin: 0 auto" src="https://api.freelogodesign.org/files/1108d377a5a74180b8f5f7276901361f/thumb/logo_200x200.png?v=637537258370000000" />
      <h5>Welcome to Crazy Kitchen!</h5>
    </div>
    <div class="invoice">
      <table class="highlight">
        <thead>
        <section class="menu">
            <?php 
                foreach( $foods as $key => $food ) {
                    ?>
                        <div class="food-row" style="padding:10px">
                            <div class="food-thumbnail">
                                <img src=<?php echo $food['imgUrl']?> alt=<?php echo $food['name']?> id="foodImages"/>
                            </div>
                            <div class="food-desc">
                                <div class="food-name"><?php echo $food['name']?></div>
                                <div class="food-interaction" >
                                    <div class="food-price" id=<?php echo $food['price']?>>price: <?php echo $food['price']?></div>
                                    <div include="form-input-select()">
                                        <div class="select">
                                            <select>
                                              <option value=1 id='1'>1</option>
                                              <option value=2 id='2'>2</option>
                                              <option value=3 id='3'>3</option>
                                              <option value=4 id='4'>4</option>
                                              <option value=5 id='5'>5</option>
                                            </select>
                                            <div class="select__arrow"></div>
                                        </div>  
                                    </div>
                                    <!-- need to add listener for add-->
                                    <button class="add-food" id=<?php echo $food['food_id']?> >Add To Cart</button><br>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>



        </section>
    <div class="payment">
                <br>
      
    </div>

    <div class="button checkout row" id="toCheckout">
        <button class="col s12 btn-large pink btn waves-effect waves-dark register" id="checkout"><span>Checkout</span> <i class="fa fa-check"></i></button>
    </div>
  </div>

</div>

</body>
</html>
