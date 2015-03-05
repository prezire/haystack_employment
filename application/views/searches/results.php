<div id="search" class="results row">
	<h4>Search Results</h4>
	<p>
		Results for <i><?php echo $keywords; ?></i>
		(<?php echo $total; ?>)
	</p>
	<a href="<?php echo site_url('search'); ?>" class="button tiny">
		Search again
	</a>
	<div class="row">
		<?php 
			$bEmpty = true;
			$ctr = 0;
			foreach($results as $items)
			{
				$bEmpty = count($items) < 1;
				if($bEmpty) continue;
				foreach($items as $i)
				{
		?>
					<div class="result panel small-12 medium-12 large-12 columns">
						<a href="<?php echo $i['href']; ?>">
							<?php echo $i['title']; ?>
						</a>
						<div class="description">
							<?php echo $i['description']; ?>
						</div>
					</div>
		<?php 
				$ctr++;
				}
			}  
		?>
	</div>
	<?php if(!$bEmpty && $ctr > 4){ ?>
	<a href="<?php echo site_url('search'); ?>" class="button tiny">
		Search again
	</a>
	<?php } ?>
</div>