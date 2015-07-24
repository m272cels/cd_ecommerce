<style type="text/css">
    .disappear {
        display: none;
    }
</style>

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
<?php
var_dump($cart_items);
    $total = 0;
    foreach ($cart_items as $item) {
        $total += $item['total'];
?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td>$<?= $item['price'] ?></td>
                            <td>
                                <span class="shown">
                                    <span class="qty"><?= $item['quantity'] ?></span> |
                                    <a class="update">Update</a>
                                </span>
                                <form class="disappear" method="post">
                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                    <input type="number" name="quantity" min="1" max="10" value="<?= $item['quantity'] ?>">
                                </form> |
                                <a class="delete" value="<?=$item['id']?>">Delete</a>
                            </td>
                            <td>$<?= $item['total'] ?></td>
                        </tr>
<?php
    }
?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-9">
                <p>Subtotal: $<?=$total?></p>
                <p>Shipping: $1.00</p>
                <p id="total">Total: $<span id="total-amt"><?=$total+1?></span></p>
            </div>
        </div>
