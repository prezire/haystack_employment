<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simplifie Haystack</title>
  </head>
  <body>
    <?php $s = base_url('public/img') . '/'; ?>
    <table border="0" 
            style="font-size: 13px; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      <tr>
        <td colspan="4">
          Hi,<br /><br />

          {complete_name} has forwarded you his updated
          <a href="{resume_url}" target="_blank">resume</a> for reference.
          
          <br /><br />
          
          Thank you,<br />
          The Simplifie Haystack Team

          <br /><br />
          This is an auto-generated email. Do not reply.
        </td>
      </tr>
       <tr>
        <td colspan="4">
          <br />

          <a href="{site_url}" target="_blank">
            <img src="<?php echo $s . 'logo.png'; ?>" width="90" />
          </a>
        </td>
      </tr>
    </table>
  </body>
</html>