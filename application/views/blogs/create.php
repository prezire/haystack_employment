<div id="blog" class="create row">
    <div class="row">
      <div class="large-12 columns">
        <h4>New Blog</h4>
      </div>
    </div>
    <?php 
        echo validation_errors();
        echo form_open('blog/create'); 
    ?>     
    <div class="row">
      <div class="large-6 columns">
        Name: 
        <input type="text" name="name" />
      </div>
      <div class="large-6 columns">
        Weight: 
        <input type="text" name="weight" />
      </div>
      <div class="large-6 columns">
        Author: 
        <input type="text" name="author" />
      </div>
      <div class="large-6 columns">
        Publish State: 
        <?php 
            echo form_dropdown('publish_state', getBlogPublishStates(), set_value('publish_state'), 'class="datepicker"'); 
        ?>
      </div>
      <div class="large-6 columns">Slug: <input type="text" name="slug" /></div>
      <div class="large-6 columns">Tags: <input type="text" name="tags" /></div>

      <div class="large-12 columns">Content: <textarea name="content"></textarea></div>
    </div>
      <div class="row">
        <div class="large-12 columns">
          <a href="<?php echo site_url('blog'); ?>" class="button alert tiny">Cancel</a>
          <button class="tiny">Create</button>
        </div>
      </div>
  </form>
</div>