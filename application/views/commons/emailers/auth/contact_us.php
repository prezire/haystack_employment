<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simplifie Haystack - Contact Us</title>
  </head>
  <body>
    <?php $s = base_url('public/img') . '/'; ?>
    <table border="0" 
            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      <tr>
        <td colspan="4">
        	Dear Simplifie Haystack admin,

        	<br /><br />

        	An inquiry has been sent by "<i style="color: #666;">{full_name}</i>" 
        	from his email 
        	<i style="color: #666;">
        		"<a href="mailto:{email}" target="_blank">{email}</a>"
        	</i>.

        	<br />

        	The topic is about "<i style="color: #666;">{topic}</i>" 
        	with the message: <br />
        	"<i style="color: #666;">{message}</i>".

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