<div id="blog" class="create row">
    <div class="row"><h4 class="large-12 columns">New Blog</h4></div>
    <?php 
        echo validation_errors();
        echo form_open('blog/create'); 
    ?>     
    <div class="row">
      <div class="large-6 columns">Name: <input type="text" name="name" /></div>
        <div class="large-6 columns">Publish State: <input type="text" name="publish_state" class="datepicker" /></div>      
    </div>
    <div class="row">
      <div class="large-12 columns">Content: <textarea name="content"></textarea></div>
    </div>
    <div class="row">
      <div class="large-6 columns">Slug: <input type="text" name="slug" /></div>
      <div class="large-6 columns">Tags: <input type="text" name="tags" /></div>
    </div>
        <a href="<?php echo site_url('blog'); ?>" class="button alert small radius">Cancel</a>
        <button class="small radius">Create</button>
  </form>
</div>