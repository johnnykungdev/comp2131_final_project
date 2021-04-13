

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Crazy Kitchen Checkout</title>

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel="stylesheet" href="./assets/css/checkout.css">
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
        </tbody>
      </table>
    </div>
    <div class="payment">
      <h5>Payment & Address Information</h5>
      <div class="credit-card-box card-panel z-depth-2 animation-element slide-left">
        <div class="flip">
          <div class="front">
            <div class="logo">
              <img src="http://cdn.flaticon.com/svg/39/39134.svg" alt="" />
            </div>
            <div class="number input-field">
              <label for="card-number">Name</label>
              <input type="text" id="name" class="input-card-number" />
            </div>
            <div class="number input-field">
              <label for="card-number">Address</label>
              <input type="text" id="address" class="input-card-number"/>
            </div>
            <div class="number input-field">
              <label for="card-number">Card Number</label>
              <input type="text" id="card-number" class="input-card-number" maxlength="16" />
            </div>
            <div class="cvv input-field">
              <label for="card-cvv">CVV</label>
              <input type="text" id="card-cvv" class="input-card-cvv" maxlength="3" />
            </div>
            <div class="card-holder input-field">
              <label for="name">Card Holder</label>
              <input type="text" name="name" id="name">
            </div>

            <div class="card-expiration-date input-field">
              <select id="month">
                <option></option>
          <option>Jan</option>
          <option>Feb</option>
          <option>Mar</option>
          <option>Apr</option>
          <option>May</option>
          <option>Jun</option>
          <option>Jul</option>
          <option>Aug</option>
          <option>Sep</option>
          <option>Oct</option>
          <option>Nov</option>
          <option>Dec</option>
              </select>
              <select>
                          <option></option>
          <option>2016</option>
          <option>2017</option>
          <option>2018</option>
          <option>2019</option>
          <option>2020</option>
          <option>2021</option>
          <option>2022</option>
          <option>2023</option>
          <option>2024</option>
          <option>2025</option>
              </select>
              <label>Expires</label>
            </div>

          </div>

        </div>
      </div>
    </div>
    <input hidden value="" name="">

    <div class="button checkout row">
      <button class="col s12 btn-large green btn waves-effect waves-dark register" id="checkoutButton"><span>Checkout</span> <i class="fa fa-check"></i></button>
      <button class="col s12 btn-large red btn waves-effect waves-dark register" id="goBackButton"><span>Return</span> <i class="fa fa-check"></i></button>
    </div>
  </div>

</div>

<script>
  $(document).ready(function() {
        $('select').material_select();
    });
</script>
<!-- partial -->
  <script  src="./assets/js/checkout.js"></script>

</body>
</html>
