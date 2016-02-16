<?php
include("config.php");
include("inc/navbar.php");
?>
<!DOCTYPE html>
<title>Bioskop Sistem  Informasi</title>
<meta name='Author' content='Kelompok Awak'/>
<meta name='Description' content='Bioskop Sistem  Informasi'/>
<link rel='shortcut icon' type='image icon' href='favicon.ico'/>
<link rel='stylesheet' type='text/css' href='bootstrap/bootstrap.css'/>
<link rel='stylesheet' type='text/css' href='bootstrap/megasoft.css'/>
<script src="js/jquery.min.js"></script>
<body>
<div class='container-fluid' style='margin-top:20px;'>
	<div class='row-fluid'>
	
	<div class='span12'>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'>

<?php


		$nama=$_POST['nama'];
		$seat=$_POST['seat'];
		$jadwal=$_POST['jadwal'];
		$harga=$_POST['harga'];

$accept=0;
if(isset($_SESSION['level'])){
if(($_SESSION['level'])==2){
$cek=mysql_query("select balance from login where userid='$nama'");
while($tes = mysql_fetch_array($cek))
{
  if((($tes['balance'])-$harga)>0)
  {
	$new_balance=(($tes['balance'])-$harga);
	$accept=1;
  }
  else
  {
	echo"<font color='green' size='5' align='center'>SALDO TIDAK MENCUKUPI</font> <META HTTP-EQUIV='refresh' CONTENT='1;URL=index.php'>";
  }
}
}
else if(($_SESSION['level'])==1)
{
	$accept=1;
}
if($accept==1)
{
	$do = mysql_query("UPDATE  `bioskop`.`tiket` SET  `pemilik` =  '$nama' WHERE `tiket`.`id_jadwal` ='$jadwal'  AND  `tiket`.`seat` ='$seat'");
	if(($_SESSION['level'])==2)
	{
		$do2 = mysql_query("UPDATE  `bioskop`.`login` SET  `balance` =  '$new_balance' WHERE `login`.`userid` ='$nama'");
	}
	$cetak=mysql_query("select id from tiket WHERE `tiket`.`id_jadwal` ='$jadwal'  AND  `tiket`.`seat` ='$seat'");
	while($cetak2 = mysql_fetch_array($cetak)){
	header("location:tiket_cetak.php?kode=$cetak2[id]");}
}
}
else
{
header('location:forbidden.php');
}
?>