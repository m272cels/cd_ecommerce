<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/superhero.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/stars.css">
	<script src="/assets/star.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var id = $('#pro_id').val();
			console.log(id);
	        $.get('/main/user_nav', function(res){
	        $('#nav').html(res);
	        })

	        $.get('/products/show_reviews/'+id, function(res){
	        	$('#cust_reviews').html(res);
	        })

	        $(document).on('submit', '#addreview', function(){
	        	$.post('/products/addreview/', $(this).serialize(),function(res){
	        		$('#cust_reviews').html(res);
	        	})
	        	return false;
	        })

	        // Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
    var Starrr;

    Starrr = (function() {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function(e, value) {}
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'i', function(e) {
                return _this.syncRating(_this.$el.find('i').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function() {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'i', function(e) {
                return _this.setRating(_this.$el.find('i').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function() {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<i class='fa fa-star-o'></i>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function(rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function(rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('i').eq(i).removeClass('fa-star-o').addClass('fa-star');
                    console.log('star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('i').eq(i).removeClass('fa-star').addClass('fa-star-o');
                }
            }
            if (!rating) {
                return this.$el.find('i').removeClass('fa-star').addClass('fa-star-o');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function() {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function() {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function() {
    return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
  	$('#star_rating').val(value);
  	console.log(value);
    $('#count').html(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
  });
});
	    })
	</script>
</head>

<body>

	<div class="container">
		<div id="nav" class="row">
		</div>
	<div id="title" class="col-lg-offset-1">
		<a href="/products">Go Back</a>
		<h2><?=$product['name']?></h2>
	</div>
	<div id="pictures" class="col-lg-3 col-lg-offset-1">
		<div id="main_pic">
			<img src="<?="/assets/".$main_img['source']?>" alt="main picture">
		</div>

		<div id="small-pics">
<?php
			foreach ($images as $img)
			{ ?>
			<div class="other_images">
				<img src="<?="/assets/".$img['source']?>" alt="<?=$img['alt']?>">

			</div>
<?php		}
		
?>
		</div>
	</div>
	<div id="description" class="col-lg-7 col-lg-offset-1">
		<p><?=$product['description']?></p>
<?php
		if ($product['count_in_stock'] == 0) { ?>
			<p>Product Unavailable</p>
			<form>
				<input id="pro_id" type="hidden" name="prod_id" value="<?=$product['id']?>">
			</form>
<?php
		} else {
?>
		<p>Quantity in stock: <?=$product['count_in_stock']?></p>
		<form action="/addproduct/<?=$product['id']?>" method="post">
			<div class="form-group col-sm-2">
				<input type="number" name="quantity" min="1" max="10" value="1" class="form-control"> 
			</div>
			<input id="pro_id" type="hidden" name="prod_id" value="<?=$product['id']?>">
			<button type="submit" class="btn btn-primary">Buy</button>
			<!-- <input class="" type="submit" value="Buy"> -->
		</form>
	</div>
	<div id="similar" class="col-lg-10 col-lg-offset-1">
		<h4>Similar Items</h3>
<?php  }
?>
<?php

	foreach ($similar_products as $index => $products) {
?>
		<div class="col-lg-1">
			<a href="/showproduct/<?=$products['id']?>"><img class="similar-products" src="/assets/<?=$products['source']?>" alt="/assets/<?=$products['alt']?>"></a>
			<p><?=$products['price']?></p>
			<p><?=$products['name']?></p>
		</div>
<?php
	}
?>
	</div>
	<div id="reviews" class="col-lg-10 col-lg-offset-1">
		<h4>Customer Reviews</h4>
		<div id="cust_reviews" class="col-sm-10">
		</div>


	</div>


	</div>


</body>
</html>
