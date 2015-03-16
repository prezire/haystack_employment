<div class="small-12 medium-12 large-4 columns">
	<div class="package panel <?php echo strtolower($name); ?>" 
			data-minimumPosting="{minimumPostings}"
			data-maximumDateDifference="{maximumDateDifference}">
		<div class="header">
			<div>
				<strong>{name}</strong>
				(Minimum of {minimumPostings} postings, 
				up to {maximumDateDifference} days)
			</div>
			<span>
				<input type="checkbox" id="vip{name}" class="vip" />
				<label for="vip">VIP</label>
			</span>
			<span>
				<span>
					Bid Amount (USD):
				</span>
				<input type="text" class="bidAmount" value="0" />
			</span>
		</div>
		<div class="items"></div>
		<div class="subTotal"></div>
	</div>
</div>