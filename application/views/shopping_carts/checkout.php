<div id="shoppingCart" class="checkout row">
	<h4>Checkout</h4>
	<div class="row">
	  <div class="small-12 medium-12 large-12 columns">
	  	<input type="radio" id="directBankTransfer">
		<label for="directBankTransfer">Direct Bank Transfer</label>
		<div class="panel radius">
			<?php echo form_open('shoppingcart/directBankTransfer'); ?>
				
				<input type="hidden" name="user_id" value="<?php echo $userId; ?>" />

				<h5>Billing Details (Linked to your account)</h5>
				<div class="row">
				  <div class="small-12 medium-12 large-12 columns">
				  	<?php echo $fullName; ?>
				  </div>
				</div>
				<div class="row">
				  <div class="small-12 medium-12 large-12 columns">
				  	<?php echo $companyName; ?>
				  </div>
				</div>
				<div class="row">
				  <div class="small-12 medium-12 large-12 columns">
				  	<?php echo $companyAddress; ?>
				  </div>
				</div>
				<div class="row">
				  <div class="small-6 medium-6 large-6 columns">
				  	<?php echo $companyCity; ?>
				  </div>
				  <div class="small-6 medium-6 large-6 columns">
				  	<?php echo $companyState; ?>
				  </div>
				</div>
				<div class="row">
				  <div class="small-6 medium-6 large-6 columns">
				  	<?php echo $companyCountry; ?>
				  </div>
				  <div class="small-6 medium-6 large-6 columns">
				  	<?php echo $companyZipCode; ?>
				  </div>
				</div>
				<div class="row">
				  <div class="small-6 medium-6 large-6 columns">
				  	<?php echo $companyEmail; ?>
				  </div>
				  <div class="small-6 medium-6 large-6 columns">
				  	<?php echo $companyLandline; ?>
				  </div>
				</div>
				<textarea name="notes" placeholder="Order Notes"></textarea>	
				<br /><br />
				<h5>Your Order</h5>
				<?php foreach($items as $i){ ?>
					
					<input type="hidden" name="" value="" />

					<div class="row">
						<div class="small-12 medium-12 large-12 columns">
							Name x Quantity
						</div>
					 </div>
				<?php } ?>
				<br /><br />
				<button class="tiny radius">
					Place Order
				</button>
			</form>
		</div>
	  </div>
	  <div class="small-12 medium-12 large-12 columns">
	  	<input type="radio" id="chequePayment">
		<label for="chequePayment">Cheque Payment</label>
		<div class="panel radius">
		Please send your cheque to {Company Name}, 
		Cebu Street, 
		Cebu City, 
		Cebu,
		Philippines, 
		6000.

		<h6>Important:</h6> All job postings will be made 
		available, 1 week after sending the cheque.

	</div>
	  </div>
	  <div class="small-12 medium-12 large-12 columns">
	  	<input type="radio" id="payPal">
		<label for="payPal">PayPal</label>
		<div class="panel radius">
			<a href="<?php echo site_url('shoppingcart/paypal'); ?>" class="payPal button tiny radius">
				Proceed To PayPal
			</a>
		</div>
	  </div>
	</div>
</div>