<div id="member" class="create">
	<?php
		echo validation_errors();
		echo form_open('member/create');
	?>
	<div>Email: <input type="text" name="email" /></div>
	<div>Password: <input type="text" name="password" /></div>
	<div>Full Name: <input type="text" name="full_name" /></div>
	<div>Enabled: <input type="checkbox" name="enabled" /></div>
	<div>Mobile: <input type="text" name="mobile" /></div>
	<button>Create</button>
	</form>
</div>