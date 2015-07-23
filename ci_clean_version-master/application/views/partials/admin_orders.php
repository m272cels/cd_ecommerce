<table class="table table-striped">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Billing Address</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
<?php
    $total = 0;
    if(empty($orders))
    { ?>
    </tbody>
</table>
<h2 id="no_orders">No Orders!</h2>
<?php   }
    else 
    {
    foreach ($orders as $order) {
        $total += $order['total'];
?>
        <tr>
            <td><a href="/orders/show/<?=$order['id']?>"><?= $order['id'] ?></a></td>
            <td><?= $order['first_name'] ?></td>
            <td><?= $order['date'] ?></td>
            <td><?= $order['address'] ?></td>
            <td>$<?= $order['total'] ?></td>
            <td>
                <form method="post" id="TEST">
                    <input type="hidden" name="id" value="<?=$order['id']?>">
                    <select class="status_change"> 
<?php
                if($order['status'] == 'Order in process')
                    echo '<option selected="true" value="1">Order in process</option>';
                else
                    echo '<option value="1">Order in process</option>';
                if($order['status'] == 'Need to ship')
                    echo '<option selected="true" value="2">Need to ship</option>';
                else
                    echo '<option value="2">Need to ship</option>';
                if($order['status'] == 'shipped')
                    echo '<option selected="true" value="3">Shipped</option>';
                else
                    echo '<option value="3">shipped</option>';
                if($order['status'] == 'Cancelled')
                    echo '<option selected="true" value="4">Cancelled</option>';
                else
                    echo '<option value="4">Cancelled</option>';
?>
                    </select>
                </form>
            </td>

        </tr>
<?php } ?>
    </tbody>
</table>
<?php } ?>
    