<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<style type="text/css">
	#space{
		height: 75px;
	}


	</style>
</head>

<body>
	<div>
		<form action='' method='post'>
	        <h4>Add Product</h4>
	        <div class='input-field'>
			    <label for='icon_prefix'>Product Name</label>
			    <input id='icon_prefix' type='text' name='name'>
	 		</div>
	    	<div class='input-field'>
		    	<textarea class='materialize-textarea' id='description' name='description'></textarea>
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
		    <input placeholder='New category' type='text' name='new_category'>
		    <p>Images</p>
		    <button class='btn'>Upload</button>
	    </form>
	</div>
</body>
</html>