<div id="blog" class="update row">
    <div class="row">
        <div class="large-12 columns">
            <h4>Update Blog</h4>
            <?php if($this->session->flashdata('update') == 'success'){ ?>
                <div class="alert-box success">Blog updated.</div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <?php echo validation_errors(); ?>
      </div>
    </div>
    <?php echo form_open('blog/update');?>
    <input type="hidden" name="id" value="<?php echo set_value('id', $blog->id); ?>" />      
    <div class="row">
        <div class="large-12 columns">
            Name: 
            <input type="text" name="name" value="<?php echo set_value('name', $blog->name); ?>" />
        </div>
        <div class="large-12 columns">
            Date Created: 
            <?php echo toHumanReadableDate($blog->date_time_created); ?>
        </div>


        <div class="large-6 columns">
            Author: 
            <input type="text" name="author" value="<?php echo set_value('author', $blog->author); ?>" />
        </div>
        
        <div class="large-6 columns">
            Publish State: 
            <?php 
                echo form_dropdown('publish_state', getBlogPublishStates(), set_value('publish_state', $blog->publish_state), 'class="datepicker"'); 
            ?>
        </div>

        <div class="large-6 columns">
            Slug: 
            <input type="text" name="slug" value="<?php echo set_value('slug', $blog->slug); ?>" />
        </div>
        <div class="large-6 columns">
            Tags: 
            <input type="text" name="tags" value="<?php echo set_value('tags', $blog->tags); ?>" />
        </div>
    
        <div class="large-12 columns">
            Content: 
            <textarea name="content"><?php echo set_value('content', $blog->content); ?></textarea>
        </div>

    </div>
    <div class="row">
        <div class="large-12 columns">
            <a href="<?php echo site_url('blog'); ?>" class="button alert tiny">Cancel</a>
            <a href="<?php echo site_url('blog/read/'  . $blog->id); ?>" class="button tiny">Preview</a>
            <button class="tiny">Update</button>
        </div>
    </div>
  </form>
</div>