<!DOCTYPE html>
<html>
<head>
    <title>(Carts Page) Shopping Cart | Dojo eCommerce</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_f5QqpTBmdEsgySvGBAbyHKhT');
        $(document).ready(function() {                        
            $('#pay').submit(function(event) {
                var $form = $('#card-info');

                // Disable the submit button to prevent repeated clicks
                $form.find('button').prop('disabled', true);
                console.log('submitted');
                // console.log($form);
                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from submitting with the default action
                return false;
            });

        });
        function stripeResponseHandler(status, response) {
          var $form = $('#card-info');
          console.log('responding');
          console.log(response);
          if (response.error) {
            // Show the errors on the form
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
          } else {
            // response contains id and card, which contains additional card details
            var token = response.id;
            // Insert the token into the form so it gets submitted to the server
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            // and submit
            $form.get(0).submit();
          }
        };

    </script>
</head>
<body>
    <div id="nav"></div>
<?php
    $this->load->view('partials/usernavbar', array('cart' => $cart));
?>
    <div class="col-sm-6 col-sm-offset-1">
        <h3>Enter your credit card info below:</h3>
        <form id="card-info" class="form-horizontal" role="form" action="/chargecard" method="post">
            <span class="payment-errors"></span>
            <div class="form-group">
                <label class="control-label col-sm-3">Card:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" data-stripe="card-number">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">CVC:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" data-stripe="card-cvc">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Expiration:</label>
                <div class="col-sm-4">
                    <select class="form-control" data-stripe="card-month">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>
                <div class="col-sm-1"><p id="slash">/</p></div>
                <div class="col-sm-4">
                    <select class="form-control" data-stripe="card-year">
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</body>
</html>