<!DOCTYPE html>
<html>
<head>
    <title>Customer Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div id="order-info" class="col-sm-4 col-sm-offset-1">
                <p>Order ID: </p><br>
                <p>Customer shipping info: </p>
                <p>Name: </p>
                <p>Address: </p>
                <p>City: </p>
                <p>State: </p>
                <p>Zip Code: </p><br>
                <p>Customer billing info: </p>
                <p>Name: </p>
                <p>Address: </p>
                <p>City: </p>
                <p>State: </p>
                <p>Zip Code: </p>
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
                    </tbody>
                </table>
                <div id="order-status">
                    <p>Status: </p>
                </div>
                <div id="order-final">
                    <p>Sub Total: </p>
                    <p>Shipping: </p>
                    <p>Total Price: </p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
