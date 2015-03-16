<div id="billing" class="employer row">
	<h4>
		Billing for 
		<?php 
			$this->load->helper('inflector');
			echo singular(getRoleName());
		?>
	</h4>
	<a href="<?php echo site_url('billing'); ?>" class="button tiny">
		Unpaid Postings
	</a>
	<a href="<?php echo site_url('billing/paid'); ?>" class="button tiny">
		Paid Postings
	</a>
		<?php if(count($paidBillings) < 1){ ?>
				<p>
					There are no posted positions to be billed.
					You may go to Paid Postings to check for 
					previous transactions.
				</p>
		<?php 
			}
			else 
			{
		?>
			<div class="row">
				<div class="row">
				  <div class="small-12 medium-12 large-12 columns">
				  	<p>
						This page acts as a shopping cart. Please pay
						the specified amount in order for your Posted Postiions
						to be shown.
						You may select a Package Type if you have 
						multiple Postings to reduce your cost.
					</p>
				  </div>
				</div>
				<div class="postings small-12 medium-12 large-12 columns">
					<table class="responsive">
						<thead>
							<tr>
								<th>Transaction ID</th>
								<th>Name</th>
								<th>Category</th>
								<th>Dates</th>
								<th>Vacancy</th>
								<th>Price (USD)</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($paidBillings as $p){ ?>
							<tr>
								<td><?php echo $p->transaction_id; ?></td>
								<td>
									<a href="<?php echo site_url('position/read/' . $p->id); ?>" class="tiny">
										<?php echo $p->name; ?>
									</a>
									<br />
									<?php echo $p->industry; ?>
								</td>
								<td>
									<?php echo $p->category; ?>
								</td>
								<td>
									<?php echo toHumanReadableDate($p->date_from); ?> - 
									<?php echo toHumanReadableDate($p->date_to); ?>
								</td>
								<td><?php echo $p->vacancy_count; ?></td>
								<td>5</td>
								<td>
									<?php 
										$a = array
										(
											'lite' => 'Lite',
											'medium' => 'Medium',
											'heavy' => 'Heavy'
										);
										echo form_dropdown('packageType', $a, null, 'class="packageType"');
									?>
									<a href="<?php echo site_url('position/archive/' . $p->id . '/0'); ?>" class="button tiny move">
										Move
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
	  			</div>
			 	<div class="packages small-12 medium-12 large-12 columns">
			  		<h5>Packages</h5>
			  		<?php 
			  		$s = 'commons/partials/billings/package_type';
			  		$a = array
			  		(
			  			'lite' => array
			  			(
			  				'name' => 'Lite', 
			  				'minimumPostings' => 3, 
			  				'maximumDateDifference' => 90,
			  			),
			  			'medium' => array
			  			(
			  				'name' => 'Medium', 
			  				'minimumPostings' => 7, 
			  				'maximumDateDifference' => 60
			  			),
			  			'heavy' => array
			  			(
			  				'name' => 'Heavy', 
			  				'minimumPostings' => 15, 
			  				'maximumDateDifference' => 30
			  			)
			  		);
			  		echo '<div class="row">';
				  		echo $this->parser->parse($s, $a['lite'], true);
				  		echo $this->parser->parse($s, $a['medium'], true);
				  		echo $this->parser->parse($s, $a['heavy'], true); 
			  		echo '</div>';
			  		?>
				</div>
			</div>
			<div class="overallTotal">
				<strong>Overall Total (USD):</strong>
				<span></span>
			</div>
			<a href="#" class="button tiny checkout">
				Checkout
			</a>
	<?php } ?> 
</div>