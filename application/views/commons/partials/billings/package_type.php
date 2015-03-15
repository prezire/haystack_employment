<div class="package <?php echo strtolower($name); ?>" 
		data-minimumPosting="{minimum}"
		data-maximumDateDifference="{maximumDateDifference}">
	<div class="header">
		<span>{name}</span>
		<span>
			<input type="checkbox" id="vip{name}" class="vip" />
			<label for="vip">VIP</label>
		</span>
		<span>
			Bid Amount (USD): 
			<input type="text" class="bidAmount" value="0" />
		</span>
	</div>
	<div class="items"></div>
	<div class="subTotal"></div>
</div>