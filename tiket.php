<?php include("config.php"); ?>
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
		<p style='margin-top:10px'>
		
		
                  <thead>
                  </thead></head>
<?php
if(isset($_SESSION['level'])){
$s=$_GET['jadwal'];
$judul=mysql_query("select * from tiket JOIN film ON tiket.judul = film.id_film join teater on tiket.teater=teater.kode_teater where pemilik='' and id_jadwal='$s'");
$n=0;
while(($data_judul =  mysql_fetch_array($judul))&&($n==0)){
echo"<h3 align='center'>Tiket Untuk Film ".$data_judul['judul_film']."</h3>";
$harga=$data_judul['harga'];
$teater=$data_judul['nama_teater'];
$n++;}
if(isset($_GET['jadwal'])){
$s=$_GET['jadwal'];?>
<table align='center'>
<form action='tiket_confirm.php' method='POST'>
<?php if (($_SESSION['level'])==2){
echo"
<tr><td>Nama </td><td>: </td><td><input type='text' name='nama' value='".$_SESSION['user']."' readonly>";}
else{
echo"
<tr><td>Nama </td><td>: </td><td><input type='text' name='nama' placeholder='nama'>";}
?>
<?php
$ticket=mysql_query("select * from tiket where pemilik='' and id_jadwal='$s'");}
echo"<tr><td>No. Bangku </td><td>: </td><td><input type='hidden' name='jadwal' value='$s'><select name='seat' class='span12'>";
while($data_seat =  mysql_fetch_array($ticket)){
echo"<option value=\"$data_seat[seat]\">$data_seat[seat]</option>";
}
echo"</select></td></tr>
<tr><td>Teater</td><td>:</td><td>$teater</td></tr>
<tr><td>Harga</td><td>:</td><td>Rp $harga <input type='hidden' name='harga' value='$harga'></td></tr>
<tr><td><br></td></tr>
<tr><td></td><td></td><td><left><button class='btn btn-success'><i class='icon icon-white icon-plus'></i> Buat Tiket</button></left></td></tr>
</form></table><br><br>";}
else
{
header('location:forbidden.php');
}
?>
</div>
</div>
<?php include("inc/footer.php");?>
</div>