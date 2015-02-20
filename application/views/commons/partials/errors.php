<div class="row">
  <div class="small-12 medium-12 large-12 columns">
    <?php
      if(validation_errors() || isset($error)){ 
    ?>
      <div data-alert class="alert-box alert radius">
        <?php 
          echo validation_errors();
          echo isset($error) ? $error : '';
        ?>
      </div>
    <?php } ?>
  </div>
</div>