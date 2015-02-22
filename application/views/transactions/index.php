<div id="transaction" class="index row">
	<h4>Shopping Cart</h4>
		<?php foreach($items as $i){ ?>
			<div class="row">
			  <div class="small-12 medium-12 large-12 columns">
			  	ID
			  	Name
			  	Quantity (Use from and to dates)
			  	<button rowId="<?php echo $i['rowid']; ?>" class="tiny radius update">
			  		Update
			  	</button>
			  </div>
		  </div>
		<?php } ?>
	<button class="tiny radius checkout">Checkout</button>
</div>