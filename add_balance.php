<?PHP include("config.php"); ?>
<!DOCTYPE html>
<html>
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
	<?PHP include("inc/navbar.php"); ?>
	<div class='row-fluid'>
	<div class='span12'>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'>
		<!-- content di mulai di sini -->
		<center style="font-size:24px"><b>Tambah Balance</b></center><br>
<?php
if(isset($_SESSION['level']))
{
if(isset($_POST['userid']))
{
$userid=$_POST['userid'];
$balance=$_POST['balance'];
$add=mysql_query("UPDATE  `bioskop`.`login` SET  `balance` =  `balance`+'$balance' WHERE `login`.`userid` ='$userid'");
if(mysql_affected_rows()==0)
{
echo"OPERASI GAGAL";
}
else
{
echo"Transaksi Berhasil";
}
}
else
{
	if(($_SESSION['level']==1))
	{
		echo"<table align='center' background:white'><form action='add_balance.php' method='POST'><tr><td>User ID</td><td> :</td><td><input autofocus type='text' name='userid' placeholder='User ID'>";
		echo"</select></td></tr>";
		echo"<tr><td>Tambahan</td><td>:</td><td><input type='number' name='balance' placeholder='Balance added'></td></tr>";
		echo"<tr><td></td><td></td><td><button class='btn btn-success'><i class='icon icon-white icon-plus'></i> Tambahkan Balance</button></td></tr></form></table>";
	}
}	
}
else
{
header('location:forbidden.php');
}