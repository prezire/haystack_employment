<div id="blog" class="read row">
      <div class="row">
        <h5 class="large-12 columns">
          <span class="header">
            <strong><?php echo $blog->name; ?></strong>
          </span> (<?php echo toHumanReadableDate($blog->publish_state); ?>)
        </h5>
      </div>
          
       <div class="row">
        <div class="large-12 columns">
          <?php echo $blog->content; ?>      
         </div>
       </div>
      
  </form>
</div>