<div id="billing" class="employer row">
	<h4>Billing</h4>
	This page acts as a shopping cart. All the items listed below
	will be billed accordingly when you click the Checkout button. 
	You may select a Package Type if you have multiple Postings 
	to reduce the price per item.
	<a href="<?php echo site_url('billing/paid'); ?>" class="button tiny">
		Paid Postings
	</a>
	<div class="row">
	  <div class="postings small-12 medium-12 large-6 columns">
		<?php 
			$r = getRoleName();
			$bPermitted = $r == 'Administrator' || $r == 'Employer';
			if(count($positions) < 1)
			{ 
		?>
				<p>
					There are no postings to be billed.
					You may go to Paid Postings to check for 
					previous transactions.
				</p>
		<?php 
			} 
			else 
			{ 
		?>
		<table class="responsive">
			<thead>
				<tr>
					<th>Transaction ID</th>
					<th>Name</th>
					<th>Dates</th>
					<th>Industry</th>
					<th>Category</th>
					<th>Package Type</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($positions as $p){ ?>
				<tr>
					<td><?php echo $p->id; ?></td>
					<td>
						<a href="<?php echo site_url('position/read/' . $p->id); ?>" class="tiny">
							<?php echo $p->name; ?>
						</a>
					</td>
					<td>
						<?php echo toHumanReadableDate($p->date_from); ?> - 
						<?php echo toHumanReadableDate($p->date_to); ?>
					</td>
					<td><?php echo $p->industry; ?></td>
					<td><?php echo $p->working_hours; ?></td>
					<td><?php echo $p->category; ?></td>
					<td><?php echo $p->vacancy_count; ?></td>
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
		<?php 
			}
			echo $pagination; 
		?>
	  </div>
	  <div class="packages small-12 medium-12 large-6 columns">
	  	<h5>Packages</h5>
	  	<?php 
	  		$s = 'commons/partials/billings/package_type';
	  		$a = array
	  		(
	  			'lite' => array
	  			(
	  				'name' => 'Lite', 
	  				'minimumPostings' => 3, 
	  				'maximumDateDifference' => 90
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
	  		echo $this->parse->parser($s, $a['lite'], true);
	  		echo $this->parse->parser($s, $a['medium'], true);
	  		echo $this->parse->parser($s, $a['heavy'], true); 
	  	?>
	  </div>
	</div>
	<div class="overallTotal"></div>
	<a href="#" class="button tiny checkout">
		Checkout
	</a>
</div>