<div id="blog" class="read row">
  <div class="row header">
    <h4><?php echo $blog->name; ?></h4>
    by: <?php echo $blog->author; ?>
    <br />
    <i><?php echo toHumanReadableDate($blog->publish_state); ?></i>
  </div>
      
   <div class="row">
    <div class="large-12 columns">
      <?php echo nl2br($blog->content); ?>      
     </div>
   </div>

   <div class="row">
     <div class="small-12 medium-12 large-12 columns">
      <a href="<?php echo site_url('blog'); ?>" class="back button tiny">Back to Blogs</a>
     </div>
   </div>
</div>