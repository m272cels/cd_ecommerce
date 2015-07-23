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
            if ($('#cart-counter').text() == '0') {
                $('#pay-info').hide();
            }

            $.get('/carts/index_html', function (res) {
                $('#cart-table').html(res);
                var total = $('#total-amt').text();
                $('#pay').attr('action', "/addorder/"+total);
            });

            $(document).on('click', '.delete', function () {
                var p_id = $(this).attr('value');
                $.post('/carts/delete/'+p_id, function (res) {
                    $('#cart-table').html(res);
                    var total = $('#total-amt').text();
                    $('#pay').attr('action', "/addorder/"+total);
                });
                var cartCount = Number($('#cart-counter').text());
                $('#cart-counter').text(cartCount - 1);
                if ($('#cart-counter').text() == '0') {
                    $('#pay-info').hide();
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
                    $('#pay').attr('action', "/addorder/"+total);
                });
                return false;
            });
            $(document).on('blur', '.disappear', function () {
                $(this).siblings('.shown').show();
                $(this).hide();
            })
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


        })

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
        <div id="pay-info" class="row">
            <div class="col-sm-6 col-sm-offset-1">
                <h2>Shipping Information</h2>
                <form id="pay" class="form-horizontal" role="form" action="/addorder/0" method="post">
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
                    <div class="form-group">
                        <label class="control-label col-sm-3">Zipcode:</label>
                        <div class="col-sm-9">
                            <input id="zip_bill" type="text" class="form-control" name="zip_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Card:</label>
                        <div class="col-sm-9">
                            <input id="zip_bill" type="text" class="form-control" name="card_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">CVC:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="zip_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Expiration:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="month">
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
                            <select class="form-control" name="year">
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
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-10">
                            <button type="submit" class="btn btn-default">Pay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
