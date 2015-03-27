<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simplifie JobFormity - Forgot Password</title>
  </head>
  <body>
    <table style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      <tr>
        <?php $s = base_url('public/img/emailers') . '/'; ?>
        <td>
          <a href="{site_url}" target="_blank">
            <img src="<?php echo $s . 'logo.png'; ?>" />
          </a>
        </td>
      </tr>
      <tr>
        <td>
          <br />
          Hi {full_name},<br /><br />
          
          You requested a password reset for your forgotten password.
          
          <br />

          Click <a href="{url}" target="_blank">here</a> 
          to create a new password.

          <br /><br />
          
          Thank you,<br />
          The Simplifie JobFormity Team

          <br /><br />
          <a href="{site_url}" target="_blank">
            <img src="<?php echo $s . 'logo_jobformity.png'; ?>" />
          </a>
        </td>
      </tr>
    </table>
  </body>
</html>