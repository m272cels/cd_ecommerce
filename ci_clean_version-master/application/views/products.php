<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
	$(document).ready(function() {
  $('.modal-trigger').leanModal();
  $('select').material_select();
});
	</script>
	<style type="text/css">
	.modal{
		border-radius: 20px;
	}
	.modal-container{
		padding: 20px 20px 20px 20px;
	}
	nav{
		margin-bottom: 25px;
	}



	</style>
</head>

<body>
  <nav>
    <div class="nav-wrapper grey darken-3">
      <a href="#" class="brand-logo">What the hell do we sell?</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class='material-icons'>shopping_cart</i></a></li>
        <li><a href="badges.html">Log Out</a></li>

      </ul>
    </div>
  </nav>
	<div class='container'>
		<div class='row'>
	<div class='col s12'>
		<form class='col s5' action='' method='post'>
			<div class='input-field'>
				<i class='material-icons prefix'>search</i>
				<input id='search' type='text' name='search'>
				<label for='search'>Search</label>
			</div>
		</form>
			<a href="#modal1" class='col s3 offset-s4 modal-trigger btn'>Add new Product<a/>

	</div>
	<table class='striped centered bordered col s11'>
		<thead class='black-text'>
			<th>Picture</th>
			<th>ID</th>
			<th>Name</th>
			<th>Inventory Count</th>
			<th>Quantity sold</th>
			<th>Action</th>
		</thead>
		<tbody class='black-text'>
<?php
	for($i=0;$i<3;$i++)
	{
?>
			<tr>
				<td><img src='' alt=''></td>
				<td><?= $i?></td>
				<td>T-shirt</td>
				<td>40</td>
				<td>23</td>
				<td><a href="#modal<?= $i ?>" class="waves-effect waves-light btn modal-trigger col s4 offset-s2">Edit</a><a class='col s4 btn offset-s1 red' href="">Delete</a></td>
			</tr>
<?php
}
?>

		</tbody>
	</table>
</div>
</div>


  <div id="modal1" class="modal">
    <div class="modal-content black-text">
      <h4>Add Product</h4>
      <div class='input-field'>
	      <i class='material-icons prefix'>account_circle</i>
	      <label for='icon_prefix'>Product Name</label>
	      <input id='icon_prefix' type='text' name='name'>
 	</div>

    <div class='input-field'>
    	<i class='material-icons prefix'>description</i>
    	<textarea class='materialize-textarea' id='description'></textarea>
    	<label id='description'>Description</label>
  	</div>

      <div class="input-field col s12">
    <label for="categories">Categories</label>
    <select id="categories" name='category'>
      <option value="" disabled selected></option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
      </div>
      <p>Or add new category:</p>
      <input placeholder='New category' type='text' name='category'>
      <p>Images</p>
      <button class='btn'>Upload</button>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>






</body>
</html>
