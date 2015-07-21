<!DOCTYPE html>
<html>
<head>
    <title>(Carts Page) Shopping Cart | Dojo eCommerce</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-9">
                <p>Total: </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-9">
                <form method="post" action="">
                    <input type="submit" value="Continue Shopping">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-1">
                <h2>Shipping Information</h2>
                <form class="form-horizontal" role="form" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address 2:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">City:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">State:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="state">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Zipcode:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="zip">
                        </div>
                    </div>
                </form>
                <h2>Billing Information</h2>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Same as Shipping</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="first_name_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address 2:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address2_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">City:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="city_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">State:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="state_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Zipcode:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="zip_bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Card:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="zip_bill">
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
