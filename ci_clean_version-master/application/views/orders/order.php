<!DOCTYPE html>
<html>
<head>
    <title>Customer Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.get('/main/admin_nav', function(res){
                $('#nav').html(res);
            })
        })
    </script>
</head>
<body>
    <div class="container">
        <div id="nav" class="row">

        </div>
        <div class="row">
            <div id="order-info" class="col-sm-4 col-sm-offset-1">
                <p><h4>Order ID: <?= $order_info['id'] ?></h4></p><br>
                <p><h5>Customer shipping info: </h5></p>
                <p>Name: <?= $shipping_info['first_name'] ?></p>
                <p>Address: <?= $shipping_info['address'] ?></p>
                <p>City: <?= $shipping_info['city'] ?></p>
                <p>State: <?= $shipping_info['state'] ?></p>
                <p>Zip Code: <?= $shipping_info['zipcode'] ?></p><br>
                <p><h5>Customer billing info: </h5></p>
                <p>Name: <?= $billing_info['first_name'] ?></p>
                <p>Address: <?= $billing_info['address'] ?></p>
                <p>City: <?= $billing_info['city'] ?></p>
                <p>State: <?= $billing_info['state'] ?></p>
                <p>Zip Code: <?= $billing_info['zipcode'] ?></p>
            </div>
            <div id="order-table" class="col-sm-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
    foreach ($order_items as $item) {
?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['price'] ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= $item['total'] ?></td>
                        </tr>
<?php
    }
?>
                    </tbody>
                </table>
                <div id="order-status">
                    <p>Status: <?= $order_info['status'] ?></p>
                </div>
                <div id="order-final">
                    <p>Sub Total: $<?= $order_info['total'] ?></p>
                    <p>Shipping: $1.00</p>
                    <p>Total Price: $<?= $order_info['total'] + 1 ?></p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
