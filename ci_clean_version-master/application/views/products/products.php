<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin products dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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

        $('#editModal').on('shown.bs.modal', function () {
              $('#myInput').focus();
        });
        $('button[data-target="#editModal"]').on('click', function () {
            var qty = $(this).siblings('.qty').text();
            $('#editInput').val(qty);
            var p_id = $(this).siblings('input[type="hidden"]').val();
            $('#p_id').val(p_id);
        });
        $(document).on("click", ".edit", function() {
            var p_id = $(this).attr("value");
            $("#p_id").val(p_id);
            var name = $(this).parent().siblings('.product_name').text();
            $("#input_name").val(name);
            var description = $(this).parent().siblings('.product_description').val();
            $("#input_description").val(description);
        })

    })
    </script>
</head>
<body>
  <div class="container">

    <div id="nav" class="row">
    </div>
      <div id="table"></div>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Product </h4>
            </div>
            <div class="modal-body">
              <form id="edit" action="/updatecart/" method="post">
                  <input id="p_id" type="hidden" name="product_id">
                  <p>Name: <input id="input_name" type="text" name="name"></p>
                  <p>Description: <input id="input_description" type="text" name="description"></p>
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
                  <p>Images: <button>Upload</button></p>
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
</body>
</html>
