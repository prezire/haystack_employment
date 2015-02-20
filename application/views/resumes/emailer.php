<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simplifie Haystack</title>
  </head>
  <body>
    <?php $s = base_url('public/img') . '/'; ?>
    <table border="0" 
            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      <tr>
        <td colspan="4">
          Hi,<br /><br />

          {complete_name} has forwarded you an updated
          {resume_url} for reference.
          
          <br /><br />
          
          Thank you,<br />
          The Simplifie Haystack Team
        </td>
      </tr>
       <tr>
        <td colspan="4">
          <br />

          <a href="{site_url}" target="_blank">
            <img src="<?php echo $s . 'logo.png'; ?>" />
          </a>
        </td>
      </tr>
    </table>
  </body>
</html>