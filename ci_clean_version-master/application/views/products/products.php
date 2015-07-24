<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin products dashboard</title>
	<link rel="stylesheet" type="text/css" href="/assets/superhero.css">
  <script src="/assets/jquery-1.11.3.min.js"></script>
  <script src="/assets/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/partials.css">
    <script type="text/javascript">
    $(document).ready(function() {
        $.get("/products/show_partial_products/0", function(res) {
            $("#table").html(res);
        });

        $.get('/products/getpages',function(res){
        $('#pagenumbers').html(res);
      })

        $.get('/main/admin_nav', function(res){
        $('#nav').html(res);
        })

        $(function() {
        $( 'input').focusin(function() {
          $('.has-feedback').addClass("showClass");
        });
        $('input').focusout(function() {
          $('.has-feedback').removeClass("showClass");
        });

      });

        $(document).on('click', '.page', function(){
        var page = $(this).attr('value');
        $('#pagenum').val(page);
        $.get('/products/show_partial_products/'+page, function(res){
          $('#table').html(res);
        })
        return false;
      })

        $(document).on('click', '#delete', function(){
          var id = $(this).attr('value');
          //console.log(id);
          $.get("/products/delete_product/"+id, function(res){
              $('#table').html(res);
          })
        })

        $(document).on('keyup', '#search', function(){
        var status = $('#status_drop').val();
        var search = $('#search').val();
        if(search.length != 0){
          $.get('/products/search_products/'+search, function(res){
          $('#table').html(res);
          })
        }
        else{
          $.get("/products/show_partial_products", function(res) {
            $("#table").html(res);
        });
        }
        
        })
        $(document).on("click", ".delete-product", function() {
            var product_id = $(this).attr("value");
            $.post("/products/delete/"+product_id, $(this).serialize(), function(res) {
                $("#table").html(res);
            });
        });
        $(document).on("click", ".edit", function() {
            var p_id = $(this).attr("value");
            $("#modal").attr("action", "/edit_product");
            $("#editModalLabel").html("Edit Product")
            $("#p_id").val(p_id);

            var name = $(this).parent().siblings('.product_name').text();
            $("#input_name").val(name);

            var price = $(this).parent().siblings('.product_price').val();
            $("#input_price").val(price);

            var description = $(this).parent().siblings('.product_description').val();
            $("#input_description").val(description);

            var stock_count = $(this).parent().siblings('.product_count').text();
            $("#input_inventoryCount").val(stock_count);

            $("#input_submit").attr("value", "Update");

        })
        $(document).on("click", "#addModal", function() {
            $("#editModalLabel").html("Add New Product");
            $("#modal").attr("action", "/add_new_product");
            $("#input_submit").attr("value", "Add");
            $("#input_name").val('');
            $("#input_price").val('');
            $("#input_description").val('');
            $("#input_inventoryCount").val('');
        })
        $(document).on("submit", "#modal", function() {
          var p_id = $("#p_id").val();
          var p_price = $("#input_price").val();
          var p_name = $("#input_name").val();
          var p_description = $("#input_description").val();
          var p_stock = $("#input_inventoryCount").val();
          var info = {"product_id": p_id, "name": p_name, "price": p_price,
             "description": p_description, "stock": p_stock};
             console.log(info);
          if ( $("#modal").attr("action") == "/add_new_product") {
              $.post("/Products/add_product", info, function(res) {
                  $("#table").html(res);
              })
              return false;
          } else if ( $("#modal").attr("action") == "/edit_product"){
              $.post("/products/update_product/"+p_id, info, function(res) {
                $("#table").html(res);
              })
              return false;
          }
        })

    })
    </script>
</head>
<body>
  <div class="container">

    <div id="nav" class="row">
    </div>
    <div class="row">
      <div class="col-sm-3 ">
              <form method="post" class="search-form">
                  <div class="form-group has-feedback">
                  <label for="search" class="sr-only">Search</label>
                  <input type="text" class="form-control" name="search" id="search" placeholder="Search">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </form>
      </div>
       <button type="button" id="addModal" class="btn btn-primary btn-sm col-sm-2 col-sm-offset-7"
       data-toggle="modal" data-target="#Modal">Add Product</button>
    </div>
       <div class="row">
        <div id="table" class="col-sm-10 col-sm-offset-1">
        </div>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3" id="pagenumbers">
            </div>
          </div>
         </div>
      <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="editModalLabel"> </h4>
            </div>
            <div class="modal-body">
              <form id="modal" action="" method="post" enctype="multipart/form-data">
                  <input id="p_id" type="hidden" name="product_id">
                  <p>Name: <input id="input_name" type="text" name="name"></p>
                  <p>Price: <input id="input_price" type="text" name="price"></p>
                  <p>Description: <textarea id="input_description" name="description" rows="3" cols="30"></textarea></p>
                  <p>Categories:
                    <select name="existing_category">
<?php
                       foreach ($categories as $category) { ?>
                           <option><?=$category['category']?></option>
<?php
                       }
?>
                    </select>
                  </p>
                  <p>or add a new category: <input type="text" name="new_category"></p>
                  <p>Inventory Stock: <input id="input_inventoryCount" type="number" name="stock"></p>
                  <p>Images: <input type="file" name="fileToUpload" id="fileToUpload"></p>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button form="modal" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
   

  </div>
</body>
</html>
