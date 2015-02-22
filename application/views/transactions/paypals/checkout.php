<div id="transactions" class="paypal checkout">

	<div class="row">
	  <div class="small-12 medium-12 large-12 columns">
	  	<h4>PayPal Checkout</h4>
	  </div>
	</div>

	<form id="paypal_checkout" 
			action="https://www.paypal.com/cgi-bin/webscr" 
			method="post">
		
		<input type="hidden" name="cmd" value="_cart" />
		<input type="hidden" name="upload" value="1" />
		<input type="hidden" name="no_note" value="0" />
		<input type="hidden" name="bn" value="PP-BuyNowBF" />
		<input type="hidden" name="tax" value="0" />
		<input type="hidden" name="rm" value="2" />

		<?php 
			$p = $payPal; 
			//TODO: PayPal callback is not present in this impl. 
			//Use libraries/paypalapi/paypal instead.
		?>
	   <input type="hidden" name="business" value="<?php echo $p['business']; ?>" />
	   <input type="hidden" name="currency_code" value="<?php echo $p['currency']; ?>" />
	   <input type="hidden" name="lc" value="<?php echo $p['location']; ?>" />
	   <input type="hidden" name="return" value="<?php echo $p['returnUrl']; ?>" />
	   <input type="hidden" name="cbt" value="<?php echo $p['returnTxt']; ?>" />
	   <input type="hidden" name="cancel_return" value="<?php echo $p['cancelUrl']; ?>" />
	   <input type="hidden" name="custom" value="<?php echo $p['custom']; ?>" />';
		
	   <?php
			$j = 1;
			if(!empty($items))
			{
				foreach($items as $i)
				{
		?>
					<div class="row panel radius">
					  <div class="small-12 medium-4 large-4 columns">
					  	<input type="hidden" name="item_name_<?php echo $j; ?>" value="<?php echo $i['name']; ?>" />
					  </div>
					  <div class="small-12 medium-4 large-4 columns">
					  	<input type="hidden" name="quantity_<?php echo $j; ?>" value="<?php echo $i['quantity']; ?>" />
					  </div>
					  <div class="small-12 medium-4 large-4 columns">
					  	<input type="hidden" name="amount_<?php echo $j; ?>" value="<?php echo $i['price']; ?>" />
					  </div>
					</div>
		<?php
					$j++;
				}
			}
		?>
		<div class="row">
		  <div class="small-12 medium-12 large-12 columns">
		  	<button id="ppcheckoutbtn" type="submit" class="tiny radius">
				Checkout
			</button>
		  </div>
		</div>
	</form>
</div>