<?PHP include("config.php"); ?>
<!DOCTYPE html>
<head>
<title>Bioskop Sistem Informasi</title>
<meta name='Author' content='Kelompok Awak'/>
<meta name='Description' content='Bioskop Sistem Informasi'/>
<link rel='shortcut icon' type='image icon' href='favicon.ico'/>
<link rel='stylesheet' type='text/css' href='bootstrap/bootstrap.css'/>
<link rel='stylesheet' type='text/css' href='bootstrap/megasoft.css'/>
<script src="js/jquery.min.js"></script>
<body>
<div class='container-fluid' style='margin-top:20px;'>
<?php
include("inc/navbar.php");?>
<div class='row-fluid'>
	<div class='span12'>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'> 
<?php
if(isset($_SESSION['user'])){
header('location:index.php');
}
if(isset($_SESSION['login']))
{session_unset();
echo"";
echo"<table align='center'>
<tr><td align='center'><font color='red'>login gagal</font></td></tr>
<form action='logining.php' method='POST'>
<tr><td><input autofocus type='text' name='user' placeholder='username'></td></tr>
<tr><td><input type='password' name='pass' placeholder='password'></td></tr>
<tr><td align='center'><input type='submit' name='submit' value='login'></td></tr>
</form>
</table>";}
else if(!isset($_SESSION['user']))
{
echo"<table align='center'>
<form action='logining.php' method='POST'>
<tr><td><input autofocus type='text' name='user' placeholder='username'></td></tr>
<tr><td><input type='password' name='pass' placeholder='password'></td></tr>
<tr><td align='center'><input type='submit' name='submit' value='login'></td></tr>
</form>
</table>";
}?>

Login standar Admin: admin, admin<br>
Login standar User: user, user

</div>

<?php
include("inc/footer.php");
?>
</div>
	</div></div>
</body>