<div id="blog" class="update row">
    <div class="row"><div class="large-12 columns"><h4>Update Blog</h4></div></div>
    <?php if($this->session->flashdata('update') == 'success'){ ?>
        <div class="alert-box success radius">Blog updated.</div>
    <?php } ?>
    <?php 
        echo validation_errors();
        echo form_open('blog/update'); 
    ?>          
      <input type="hidden" name="id" value="<?php echo set_value('id', $blog->id); ?>" />      
    <div class="row">
        <div class="large-6 columns">Name: <input type="text" name="name" value="<?php echo set_value('name', $blog->name); ?>" /></div>
        <div class="large-6 columns">Publish State: <input type="text" name="publish_state" value="<?php echo set_value('publish_state', $blog->publish_state); ?>" /></div>
    </div>
    <div class="row">
      <div class="large-12 columns">Content: <textarea name="content"><?php echo set_value('content', $blog->content); ?></textarea></div>   
    </div>
    <div class="row">
      <div class="large-6 columns">Slug: <input type="text" name="slug" value="<?php echo set_value('slug', $blog->slug); ?>" /></div>     
      <div class="large-6 columns">Tags: <input type="text" name="tags" value="<?php echo set_value('tags', $blog->tags); ?>" /></div>     
    </div>
    <div class="row">
        <a href="<?php echo site_url('blog/read/'  . $blog->id); ?>" class="button alert small radius">Cancel</a>
        <button class="small radius">Update</button>
    </div>
  </form>
</div>