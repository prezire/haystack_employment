<div id="blog" class="index row">
    <div class="row">
        <h4>Blogs</h4>
    </div>
    <?php
        if(getRoleName() == 'Admin')
        { 
    ?>
        <a href="<?php echo site_url('blog/create'); ?>" class="button tiny">
          New Blog
        </a>
        <table class="responsive" cellspacing="0">
          <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Publish State</th>
                <th>Tags</th>
                <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($blogs as $b){ ?>      
            <tr>
              <td><?php echo $b->name; ?></td>
              <td><?php echo $b->slug; ?></td>
              <td><?php echo $b->publish_state; ?></td>
              <td><?php echo $b->tags; ?></td>
              <td>
                <a href="<?php echo site_url('blog/update/' . $b->id); ?>" class="button radius small">Update</a>
                <a href="<?php echo site_url('blog/delete/' . $b->id); ?>" class="button radius small alert">Delete</a>
              </td>
            </tr>
            <?php } ?>      
          </tbody>
        </table>
    <?php
        }
        else
        {
    ?>
      <div class="row">
    <?php
          foreach($blogs as $b)
          { 
    ?>
        <div class="large-4 columns">
          <strong>
            <a href="<?php echo site_url('blog/read/' . $b->id); ?>">
              <?php echo $b->name; ?>
            </a>
          </strong>
          - <i>by <?php echo $b->author; ?></i>
        </div>
    <?php } ?>
      </div>
    <?php } ?>
</div>