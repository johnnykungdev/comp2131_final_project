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
      <h5>Documentation</h5>
      
    </div>
    <div class="invoice">
    
    <h2>User Guide</h2>
        <p>
        This user guide serves as an instruction manual for the Crazy Kitchen application.
        </p>
        <p>
        The first page (index.php) presents different cuisines that Crazy Kitchen servers. Customers can choose the amount they want and add to the cart.
        </p>
        <p>
        The second page is the order summary showing what the customer orders. Customers need to fill in the payment information and delivery information in order to proceed successful checkout.
        </p>
        <p>
        The third page display the receipt of the order and the order id that will be connected with Check Order Status later. 
        </p>

    <h2>Features</h2>
        <h4>User Interface Components</h4>
        
        <li>Return Button: Returns user to index home page</li>
        <li>Add to cart: Adds item (and it's quantity) to the cart</li>
        <li>Drop Down Quantity Menu: Select number of items to be added to cart</li>
        <li>Gradient Background: Animated background that shows gradient</li>
        <li> Unique Logo: Logo was designed online</li>
        <li>Credit Card Form: Credit card form that takes in card number (must be 16 numerical digits to accept)</li>
        <li>Form for Name: Name restriction form that requires a name be entered to complete Order</li>
        <li>Logic to check empty cart: Checks if cart is empty when "checkout" is selected. Alert error if cart is empty and cannot proceed.</li>
        
        <h4>JavaScript/jQuery </h4>
        <p>Using Javascript/jQuery to add interactive events on the components in the website. The events includes:</p>
        <li>button click</li>
        <li>AJAX request of sending data to the server</li>
        <li>Page Redirection</li>
        <li>Saving items in the card in localStorage as cache</li>
        <li>Form validation</li>

        <h4>MySQL Integration</h4>
        <p>
            Integrated with MySQL using PDO in php, allows the shop owner to update the cuisines served in the shop. 
        </p>
        <p>
            Integrated with MySQL using PDO in php to store order data. The relationship between orders and food is a many-to-many relationship. Therefore we created a linking table to connect them.
        </p>
        
    </div>
    <div class="payment">
      
    </div>

    <div class="button checkout row">
      <a href="./index.php">
        <button class="col s12 btn-large blue btn waves-effect waves-dark register" id="backToIndex"><span>Back To Home Page</span> <i class="fa fa-check"></i></button>
      </a>
    </div>
  </div>


<!-- partial -->

</body>
</html>
