<?php $i = $internship; ?>
<div class="row panel radius" id="<?php echo $i->id; ?>">
  <div class="small-12 medium-12 large-8 columns primary">

    <?php if(getRoleName() == 'Employer'){ ?>
      <a href="<?php echo site_url('internship/delete/' . $i->id); ?>" 
          class="delete alert">
        <i class="fa fa-times"></i>
      </a>
    <?php } ?>
      
    <a href="<?php echo site_url('internship/' . $method . '/' . $i->id); ?>">
      <b><?php echo $i->name; ?></b>
    </a>
    <div>
      <strong>Description:</strong>
      <?php echo character_limiter($i->description, 150); ?>
    </div>
  </div>
  <div class="small-12 medium-12 large-4 columns">
    <div class="calendar">
      <i class="fa fa-calendar"></i>
      <?php 
        echo toHumanReadableDate($i->date_from) . 
              ' - ' . 
              toHumanReadableDate($i->date_to); 
      ?>
    </div>
    <div><strong>Vacancy:</strong> <?php echo $i->vacancy_count; ?></div>
  </div>
</div>