<div id="search" class="positions row">
	<?php
		echo validation_errors(); 
		echo form_open('search/positions'); 
	?>
		<div class="row">
		    <div class="smal-12 medium-6 large-12 columns">
		      <div class="row collapse">
		        <div class="small-10 medium-11 large-11 columns">
		          <input type="text" 
		          			name="keywords" 
		          			placeholder="Search for positions.">
		        </div>
		        <div class="small-2 medium-1 large-1 columns">
		          <button class="postfix tiny">Go</button>
		        </div>
		      </div>
		    </div>
		</div>
	</form>
</div>