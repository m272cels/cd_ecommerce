<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<title>Admin products dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/partials.css">
    <script type="text/javascript">
    $(document).ready(function() {
        $.get("/products/show_partial_products", function(res) {
            $("#table").html(res);
        });
    })
    </script>
</head>
<body>
<?php
    $this->load->view('usernavbar', array('cart' => $cart));
?>
    <div id="table">
    </div>

</body>
</html>
