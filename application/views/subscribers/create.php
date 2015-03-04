<div id="subscriber" class="create">
    <?php 
      echo validation_errors();
      echo form_open_multipart('subscriber/create'); 
    ?>          
      <input type="hidden" name="role" value="subscriber" />
      <?php echo $this->load->view('commons/partials/users/create', null, true); ?>
      <div class="row">
        <div class="large-12 columns">
          <button class="small radius">Register</button>
        </div>
      </div>
  </form>
</div>