<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simplifie Haystack - Forgot Password</title>
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
          The Simplifie Haystack Team
        </td>
      </tr>
    </table>
  </body>
</html>