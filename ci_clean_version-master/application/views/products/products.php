<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin products dashboard</title>
	<link rel="stylesheet" type="text/css" href="/assets/superhero.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/partials.css">
    <script type="text/javascript">
    $(document).ready(function() {
        $.get("/products/show_partial_products", function(res) {
            $("#table").html(res);
        });

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

        $(document).on('change', '#search', function(){
        var status = $('#status_drop').val();
        var search = $('#search').val();
        $.get('/products/search_products/'+search, function(res){
          $('#table').html(res);
          })
        })

        $('#editModal').on('shown.bs.modal', function () {
              $('#myInput').focus();
        });
        $('button[data-target="#editModal"]').on('click', function () {
            var qty = $(this).siblings('.qty').text();
            $('#editInput').val(qty);
            var p_id = $(this).siblings('input[type="hidden"]').val();
            $('#p_id').val(p_id);
        });
        $(document).on("click", ".delete-product", function() {
            var product_id = $(this).attr("value");
            $.post("/products/delete/"+product_id, $(this).serialize(), function(res) {
                $("#table").html(res);
            });
        });
        $(document).on("click", ".edit", function() {
            var p_id = $(this).attr("value");
            console.log(p_id);
            $("#p_id").val(p_id);
            $("#edit").attr("action", "edit_product/"+p_id);
            var name = $(this).parent().siblings('.product_name').text();
            $("#input_name").val(name);
            var description = $(this).parent().siblings('.product_description').val();
            $("#input_description").val(description);
            var stock_count = $(this).parent().siblings('.product_count').text();
            $("#input_inventoryCount").val(stock_count);
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
       <button type="button" class="btn btn-primary btn-sm col-sm-2 col-sm-offset-7" data-toggle="modal" data-target="#addModal">Add Product</button>
    </div>
       <div class="row">
        <div id="table" class="col-sm-10 col-sm-offset-1"></div>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Product </h4>
            </div>
            <div class="modal-body">
              <form id="edit" action="edit_product/(:any)" method="post" enctype="multipart/form-data">
                  <input id="p_id" type="hidden" name="product_id">
                  <p>Name: <input id="input_name" type="text" name="name"></p>
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
                  <input type="submit" value="Update">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button form="update" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
    </div>

  </div>
</body>
</html>
