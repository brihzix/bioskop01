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
	<center style="font-size:24px"><b>Register New User</b></center>
		<p style='margin-top:10px'>
<table style='margin-top:10px;background:white' class="table table-bordered table-striped table-hover">
<?php
if(isset($_POST['id']))
{
	$new=mysql_query("insert into login values('$_POST[id]','$_POST[password]','2','$_POST[balance]','$_POST[nama]')");
	$new=mysql_query("UPDATE  `bioskop`.`temp` SET  `tempnext` =  '$_POST[id]' WHERE  `temp`.`tempno` =1 ");
	echo"<font color='green' size='5' align='center'>SUKSES</font> <META HTTP-EQUIV='refresh' CONTENT='1;URL=index.php'>";
}
 if(($_SESSION['level'])==1)
{
$select = mysql_query("select * from temp where tempno=1");
while($id =  mysql_fetch_array($select)){
$idn=$id['tempnext']+1;
echo"<form action='regist_user.php' method='POST'>
<tr><td><input type='text' name='id' value='$idn' readonly></td></tr>
<tr><td><input type='text' name='nama' placeholder='Nama User Baru'></td></tr>
<tr><td><input type='text' name='password' placeholder='Password User Baru'></td></tr>
<tr><td><input type='number' name='balance' placeholder='Balance'></td></tr>
<tr><td><button class='btn btn-success'><i class='icon icon-white icon-plus'></i> Register</button></td></tr></form></table>";}}
else
{
header('location:forbidden.php');
}
?>