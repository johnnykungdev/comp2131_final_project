<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Crazy Kitchen Checkout</title>
  <link rel="stylesheet" href="./assets/css/checkout.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- partial:index.partial.html -->
<!-- Compiled and minified JavaScript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

<!--Begin Checkout-->

<div class="container">
  <div class="box card-panel z-depth-3">
    <div class="merchant">
      <img style="display: block, margin: 0 auto" src="https://api.freelogodesign.org/files/1108d377a5a74180b8f5f7276901361f/thumb/logo_200x200.png?v=637537258370000000" />
      <h5>Checkout Summary</h5>
      <p>Date/Time: <span id="datetime"></span></p>
      <script>
      var dt = new Date();
      document.getElementById("datetime").innerHTML = dt.toLocaleString();
      </script>
    </div>
    <div class="invoice">
      <table class="highlight">
        <thead>
          <tr>
            <th>QTY</th>
            <th>ITEM</th>
            <th class="right-align">PRICE</th>
          </tr>
        </thead>
        <tbody>
          
          <?php 
            include 'dbConnection.php';

            global $foodItems;
            try {
              $pdo = db_connect();

              $selectSQL = "SELECT food.name, order_food.amount, food.price FROM order_food JOIN food ON order_food.food_id = food.food_id WHERE order_food.order_id = :order_id";
  
              $statement = $pdo -> prepare($selectSQL);
              $order_id = str_replace("order_id=", "", $_SERVER['QUERY_STRING']);

              $statement -> execute(['order_id' => (int)($order_id)]);
   
              foreach ($statement as $row) {
                echo '
                  <tr>
                    <td>' . $row['amount'] . '</td>
                    <td>' . $row['name'] .'</td>
                    <td class="right-align">'. $row['price'] * $row['amount'] .'</td>
                  </tr>
                ';
              }
              // print_r($foodItems);
            } catch(Exception $e) {
              print_r($e);
            }
            
          ?>
          <tr>
            <td></td>
            <td class="right-align">Tax</td>
            <td class="right-align">$0.50</td>
          </tr>
          <tr>
            <td></td>
            <td class="right-align bold">Total</td>
            <td class="right-align bold">$6.75</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="payment">
      <h5>Your order is confirmed!</h5>
      <div class="credit-card-box card-panel z-depth-2 animation-element slide-left">
            <p >Thank you for shopping with us! <br />
                Your order number is 
                <?php 
                  echo "<span>".str_replace("order_id=", "", $_SERVER['QUERY_STRING'])."</span>";
                ?>
            </p>
        </div>
      </div>
    </div>

    <div class="button checkout row">
      <a href="./index.php">
        <button class="col s12 btn-large blue btn waves-effect waves-dark register" id="backToIndex"><span>Back To Home Page</span> <i class="fa fa-check"></i></button>
      </a>
    </div>
  </div>

</body>
</html>
