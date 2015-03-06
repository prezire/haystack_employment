<div id="pooledApplicant" class="index row">
	<div class="row">
		<div class="small-12 medium-12 large-12 columns">
			<h4>Pooled Applicants</h4>
		</div>
	</div>
	<?php foreach($pooledApplicants as $p){ ?>
	<div class="row panel radius">
		<?php echo form_open('pooledapplicant/update'); ?>
		<input type="hidden" name="id" value="<?php echo $p->pool_id; ?>" />
		<div class="small-12 medium-6 large-6 columns">
			<strong>Full Name:</strong>
			<a href="<?php echo site_url('applicant/read/' . $p->applicant_id); ?>">
				<?php echo $p->full_name; ?>
			</a>
		</div>
		<div class="small-12 medium-6 large-6 columns">
			<strong>Current Position Title:</strong>
			<?php echo $p->current_position_title; ?>
		</div>
		<div class="small-12 medium-12 large-11 columns">
			<textarea placeholder="Notes: e.g. get requirements, hire this applicant, rate this applicant soon." name="notes"><?php echo $p->pooled_applicant_notes; ?></textarea>
		</div>
		<div class="small-12 medium-12 large-1 columns">
			<button class="tiny">Update</button>
		</div>
	</form>
</div>
<?php } ?>
</div>