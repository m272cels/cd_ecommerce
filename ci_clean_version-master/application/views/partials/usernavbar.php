
		<script>
	// $(document).ready(function(){
	// 	$('.dropdown-toggle').dropdown();

	// })
	</script>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      </button>
      <a class="navbar-brand" href="/products">EnJ Co.</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <form action='/users/search' method='post' class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a  href="/cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> (<span id="cart-counter"><?=$cart?></span>)</a></li>
        <li><a href="/logout"><span>log off</span></a></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/logout">Logout</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
