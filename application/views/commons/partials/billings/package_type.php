<div class="small-12 medium-12 large-4 columns">
	<div class="package panel <?php echo strtolower($name); ?>" 
			data-minimumPosting="{minimumPostings}"
			data-maximumDateDifference="{maximumDateDifference}">
		<div class="header">
			<div>
				<strong>{name}</strong>
				<br />
				Place a minimum of {minimumPostings} postings, 
				up to {maximumDateDifference} days each.
			</div>
			<span>
				<?php 
					$s = 'vip' . $name;
					$data = array
					(
					    'name' => $s,
					    'id' => $s,
					    'class' => 'vip'
				    );
					echo form_checkbox($data); 
				?>
				<label for="vip{name}">VIP</label>
			</span>
			<span>
				<span>
					Bid Amount (USD):
				</span>
				<input type="text" class="bidAmount" value="0" />
			</span>
		</div>
		<div class="panel items">test</div>
		<div class="subTotal">
			<strong>Sub Total (USD):</strong>
			<span></span>
		</div>
	</div>
</div>