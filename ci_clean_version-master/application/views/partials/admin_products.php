<table  class="table table-striped">
    <thead>
        <td class="product">Picture</td>
        <td class="product">Product ID</td>
        <td class="product">Name</td>
        <td class="product">Inventory Count</td>
        <td class="product">Quantity Sold</td>
        <td class="product">Action</td>
    </thead>
    <tbody>
<?php
        foreach ($product_info as $index => $product) { ?>

            <tr><td><div class="img-div"><img class="product-img" src="/assets/<?=$product['source']?>" alt="/assets/<?=$product['alt']?>"></div></td>
            <td class="product"><?=$product['id']?></td>
            <td class="product_name" class="product"><?=$product['name']?></td>
            <input class="product_description" type="hidden" name="description" value="<?=$product['description']?>">
            <input class="product_price" type="hidden" name="price" value="<?=$product['price']?>">
            <td class="product_count"><?=$product['count_in_stock']?></td>
            <td class="product"><?=$product['sold']?></td>
            <td class="product">
                    <a class="edit" value="<?=$product['id']?>" href="#" data-toggle="modal" data-target="#Modal">Edit</a>
                    <a id="delete" value="<?=$product['id']?>" href="#>">Delete</a>
                    <!-- <a id="delete" value="<?=$product['id']?>" href="/delete_product/<?=$product['id']?>">Delete</a> -->
            </td></tr>
<?php
        }
?>
    </tbody>
</table>
