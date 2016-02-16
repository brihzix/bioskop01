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
<?php
if(($_SESSION['level'])==2){
$my=mysql_query("select * from tiket join film on tiket.judul=film.id_film join teater on tiket.teater=teater.kode_teater where pemilik='".$_SESSION['user']."'");}
else if(($_SESSION['level'])==1){$my=mysql_query("select * from tiket join film on tiket.judul=film.id_film join teater on tiket.teater=teater.kode_teater where pemilik!=''");}
else {header('location:forbidden.php');}
echo"<table width='100%' border='1'> <tbody><tr>
                     <th>No.</th>
                     <th>Judul Film</th>
                     <th>Teater</th>
                     <th>No. Kursi</th>
                     <th>Tanggal</th>
					 <th>Jam</th>
					 <th>Harga</th>
					 <th>Atas Nama</th>
                     <!--<th rowspan='2'>Ke</th>-->
                  </tr>				";
while($data_film =  mysql_fetch_array($my)){
echo"
                 	 
                  
                     <tr>
                        <td align='center'><a href='tiket_cetak.php?kode=$data_film[id]'>$data_film[id]</a></td>
                        
                        <td align='center'> $data_film[judul_film]</td>
                        <td align='center'>$data_film[nama_teater]</td>
                        <td align='center'>$data_film[seat]</td>
						<td align='center'>$data_film[tglm]</td>
						<td align='center'>$data_film[jam]</td>
                     	<td align='center'>Rp $data_film[harga]</td>
						<td align='center'>$data_film[pemilik]</td>
                     
					 </tr>
	";}
	echo"</table>";
?>
	</div>
	</div>
	<?PHP include("inc/footer.php"); ?>
</div>
</div>
</body>
</html>