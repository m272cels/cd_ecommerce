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

        $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').focus();
        });
        $('button[data-target="#myModal"]').on('click', function () {
            var qty = $(this).siblings('.qty').text();
            $('#myInput').val(qty);
            var p_id = $(this).siblings('input[type="hidden"]').val();
            $('#p_id').val(p_id);
        });
    })
    </script>
</head>
<body>
  <div class="container">

    <div id="nav" class="row">
    </div>
      <div id="table"></div>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update Quantity</h4>
            </div>
            <div class="modal-body">
              <form id="update" action="/updatecart/" method="post">
                  <input id="p_id" type="hidden" name="product_id">
                  <input id="myInput" type="number" name="quantity">
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
