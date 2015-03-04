<div id="internship" class="industry index row">
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <h4>Positions</h4>
    </div>
  </div>
  
  <div class="listing">
    <?php 
      foreach($positions as $p)
      { 
        echo $this->load->view
        (
          'commons/partials/positions/listing', 
          array('position' => $p, 'method' => 'read'), 
          true
        );
      }
    ?>
  </div>
</div>