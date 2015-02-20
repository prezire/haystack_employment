<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title>Simplifie Haystack - {posiiton} Closed</title>
	</head>
	<body>
		<?php $s = base_url('public/img/emailers') . '/'; ?>
    	<table border="0" 
            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
      		<tr>
				<td>
					Dear {full_name},<br /><br />

					Thank you for applying online to the following position advertised at
					{site_url}:<br /><br />

					Position: {position}<br />
					URL: {internship_url}<br />
					Company: {company}<br />
					Posting Dates: {dates}<br /><br />

					{site_url} would like to inform you that the position above has been closed in our system.
					We would like to congratulate those who have been hired for this position.<br /><br />

					For the rest, we thank you for using {site_url} and wish you all the best in your job search.<br /><br />

					Sincerely,<br />
					The Simplifie Haystack Team.
				</td>
			</tr>
		</table>
	</body>
</html>