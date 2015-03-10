<div id="blog" class="index row">
    <div class="row"><h4>Blogs</h4></div>
    <?php
        if(@getRoleById(getLoggedUser()->role_id)->row()->name == 'Admin')
        { 
    ?>
        <a href="<?php echo site_url('blog/create'); ?>" class="button radius small">New Blog</a>
        <table border="1">
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
            foreach($blogs as $b)
            { 
    ?>
        <div class="large-4 columns">
            <a href="<?php echo site_url('blog/read/' . $b->id); ?>"><?php echo $b->name; ?></a>
        </div>
    <?php 
            }
        }
    ?>
</div>