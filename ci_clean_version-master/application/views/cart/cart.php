<!DOCTYPE html>
<html>
<head>
    <title>(Carts Page) Shopping Cart | Dojo eCommerce</title>
    <link rel="stylesheet" type="text/css" href="/assets/superhero.css">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <script src="/assets/jquery-1.11.3.min.js"></script>
    <script src="/assets/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('#cart-counter').text() == '0') {
                $('#pay-form').hide();
            }

            $.get('/carts/index_html', function (res) {
                $('#cart-table').html(res);
                var total = $('#total-amt').text();
                $('#hidden-total').val(total);
            });

            $(document).on('click', '.delete', function () {
                var p_id = $(this).attr('value');
                $.post('/carts/delete/'+p_id, function (res) {
                    $('#cart-table').html(res);
                    var total = $('#total-amt').text();
                    $('#hidden-total').val(total);
                });
                var cartCount = Number($('#cart-counter').text());
                $('#cart-counter').text(cartCount - 1);
                if ($('#cart-counter').text() == '0') {
                    $('#pay-form').hide();
                }
                return false;
            });
            $(document).on('click', '.update', function () {
                $(this).parent().hide();
                $(this).parent().siblings('.disappear').show();
            });
            $(document).on('change', '.disappear', function () {
                $.post('/carts/update', $(this).serialize(), function (res) {
                    $('#cart-table').html(res);
                    var total = $('#total-amt').text();
                    $('#hidden-total').val(total);
                });
            });
            $(document).on('blur', '.disappear', function () {
                $(this).siblings('.shown').show();
                $(this).hide();
            });
            $('#checkbox').change(function() {
                if (this.checked) {
                    $("#first_name_bill").val($("#first_name").val());
                    $("#last_name_bill").val($("#last_name").val());
                    $("#address_bill").val($("#address").val());
                    $("#address2_bill").val($("#address2").val());
                    $("#city_bill").val($("#city").val());
                    $("#state_bill").val($("#state").val());
                    $("#zip_bill").val($("#zip").val());
                } else {
                    $("#first_name_bill").val('');
                    $("#last_name_bill").val('');
                    $("#address_bill").val('');
                    $("#address2_bill").val('');
                    $("#city_bill").val('');
                    $("#state_bill").val('');
                    $("#zip_bill").val('');
                }
            });

            // $('#pay').submit(function(event) {
            //     var $form = $('#card-info');

            //     // Disable the submit button to prevent repeated clicks
            //     $form.find('button').prop('disabled', true);
            //     console.log('submitted');
            //     // console.log($form);
            //     Stripe.card.createToken($form, stripeResponseHandler);

            //     // Prevent the form from submitting with the default action
            //     return false;
            // });

        });
        // function stripeResponseHandler(status, response) {
        //   var $form = $('#card-info');
        //   console.log('responding');
        //   console.log(response);
        //   if (response.error) {
        //     // Show the errors on the form
        //     $form.find('.payment-errors').text(response.error.message);
        //     $form.find('button').prop('disabled', false);
        //   } else {
        //     // response contains id and card, which contains additional card details
        //     var token = response.id;
        //     // Insert the token into the form so it gets submitted to the server
        //     $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        //     // and submit
        //     $form.get(0).submit();
        //   }
        // };

    </script>
</head>
<body>
    <div id="nav"></div>
<?php
    $this->load->view('partials/usernavbar', array('cart' => $cart));
?>
    <div class="container">
        <div class="row" id="cart-table"></div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-9">
                <form method="post" action="products">
                    <input type="submit" value="Continue Shopping">
                </form>
            </div>
        </div>
        <div id="pay-form" class="row">
            <div class="col-sm-6 col-sm-offset-1">
                <h2>Shipping Information</h2>
                <form id="pay" class="form-horizontal" role="form" action="/payment" method="post">
                    <input id="hidden-total" type="hidden" name="total" value="0">
                    <div class="form-group">
                        <label class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-9">
                            <input id="first_name" type="text" class="form-control" name="first_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-9">
                            <input id="last_name" type="text" class="form-control" name="last_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address:</label>
                        <div class="col-sm-9">
                            <input id="address" type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address 2:</label>
                        <div class="col-sm-9">
                            <input id="address2" type="text" class="form-control" name="address2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">City:</label>
                        <div class="col-sm-9">
                            <input id="city" type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">State:</label>
                        <div class="col-sm-9">
                            <input id="state" type="text" class="form-control" name="state">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Zipcode:</label>
                        <div class="col-sm-9">
                            <input id="zip" type="text" class="form-control" name="zip">
                        </div>
                    </div>
                    <h2>Billing Information</h2>
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input id="checkbox" type="checkbox" value="">Same as Shipping</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-9">
                            <input id="first_name_bill" type="text" class="form-control" name="first_name_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-9">
                            <input id="last_name_bill" type="text" class="form-control" name="last_name_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address:</label>
                        <div class="col-sm-9">
                            <input id="address_bill" type="text" class="form-control" name="address_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address 2:</label>
                        <div class="col-sm-9">
                            <input id="address2_bill" type="text" class="form-control" name="address2_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">City:</label>
                        <div class="col-sm-9">
                            <input id="city_bill" type="text" class="form-control" name="city_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">State:</label>
                        <div class="col-sm-9">
                            <input id="state_bill" type="text" class="form-control" name="state_bill">
                        </div>
                    </div>
                        <label class="control-label col-sm-3">Zipcode:</label>
                        <div class="col-sm-9">
                            <input id="zip_bill" type="text" class="form-control" name="zip_bill">
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-offset-10">
                        <button form="pay" type="submit" class="btn btn-default">Go to Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
