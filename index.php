<?PHP include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Bioskop Sistem Informasi</title>
<meta name='Description' content='Bioskop Sistem Informasi'/>
<link rel='shortcut icon' type='image icon' href='favicon.ico'/>
<link rel='stylesheet' type='text/css' href='bootstrap/bootstrap.css'/>
<link rel='stylesheet' type='text/css' href='bootstrap/megasoft.css'/>
<script src="js/jquery.min.js"></script>
<body>
<div class='container-fluid' style='margin-top:20px;'>
	<?PHP include("inc/navbar.php"); ?>
	<div class='row-fluid'>
	<div class='span12'>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'>
	<div class='well' style='background:white fixed center;'>
		<center style="font-size:24px"><b></b></center>
		<p style='margin-top:10px'>
		<?php
			if(isset($_SESSION['level']))
				{
					if(($_SESSION['level'])==2)
					{
						$sel=mysql_query("select * from login where userid = '$_SESSION[user]'");
						while($id =  mysql_fetch_array($sel))
						{
							echo"<center><font color='red'>Saldo kamu Rp $id[balance]
							</font></center><br>
							<center><a href=my_tiket.php>Forget tiket?</a>";
						}
					}
					else if (($_SESSION['level'])==1)
					{
						include("admin.php");
					}
					
				}
		?>
		
		
		
	</div>
	</div>
	<?PHP include("inc/footer.php"); ?>
</div>
</div>
</body>
</html>