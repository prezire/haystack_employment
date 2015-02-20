    <script src="<?php echo base_url('public/libs/foundation-5.4.7/js/foundation.min.js'); ?>"></script>
    <script>
        $(document).foundation();
        $(document).ready(function()
        {
          var h = new Haystack();
          h.baseUrl = '<?php echo base_url(); ?>';
          h.init();
          //
          new Pool().init();
          new Resume().init();
          //
          $(
            '#home.index .row.works .work a, ' + 
            '#user .avatar, ' +
            '#resume .avatar'
          ).imgLiquid();
          //
          $('.from, .to').datepicker({dateFormat: 'yy-mm-dd'});
          //
          var a = new Analytics();
          a.siteUrl = '<?php echo site_url(); ?>';
          a.init();
        });
    </script>
  </section><!-- end main -->  
  </body>
</html>