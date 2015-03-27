<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simplifie JobFormity</title>
  </head>
  <body>
    <?php $s = base_url('public/img') . '/'; ?>
    <table border="0" 
            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      <tr>
        <td colspan="4">
          Hi {full_name},<br /><br />

          Your registration was successful.
          <br />
          
          Click <a href="{activation_url}" target="_blank">here</a> 
          to activate your account and start using 
          <a href="{site_url}" target="_blank">Simplifie JobFormity</a>.
          
          <br /><br />
          
          Thank you,<br />
          The Simplifie JobFormity Team
        </td>
      </tr>
       <tr>
        <td colspan="4">
          <br />

          <a href="{site_url}" target="_blank">
            <img src="<?php echo $s . 'logo_jobformity.png'; ?>" />
          </a>
        </td>
      </tr>
    </table>
  </body>
</html>