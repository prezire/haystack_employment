    <script src="<?php echo base_url('public/libs/foundation-5.4.7/js/foundation.min.js'); ?>"></script>
    <script>
        $(document).foundation();
        $(document).ready(function()
        {
          var h = new Haystack();
          h.siteUrl = '<?php echo site_url(); ?>';
          h.init();
          //
          var r = new Resume();
          r.siteUrl = h.siteUrl;
          r.init();
          //
          $(
            '#home.index .row.works .work a, ' + 
            '#user .avatar, ' +
            '#resume .avatar'
          ).imgLiquid();
          //
          $('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
          //
          var a = new Analytics();
          a.siteUrl = h.siteUrl;
          a.init();
          //
          var b = new Billing();
          b.siteUrl = a.siteUrl;
          b.init();
          //
          var c = new Comment();
          c.siteUrl = a.siteUrl;
          c.init();
          //
          var p = new Position();
          p.siteUrl = a.siteUrl;
          p.init();
        });
    </script>
  </section><!-- end main -->  
  </body>
</html>