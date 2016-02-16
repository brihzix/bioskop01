<?PHP include("config.php");
if (isset($_GET['kode'])){
$idfilm=$_GET['kode']; }?>
<!DOCTYPE html>
<html>
<head>
<title>Bioskop Sistem  Informasi</title>
<meta name='Author' content='Kelompok Awak'/>
<meta name='Description' content='Bioskop Sistem  Informasi'/>
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
                  </thead>
                  <tbody>
				  <?PHP
					$sql_film = mysql_query("select * from film join genre on film.kode_genre=genre.kode_genre join klasifikasi_film on film.kode_klasifikasi_film=klasifikasi_film.kode_klasifikasi_film where id_film='$idfilm' order by id_film ");
					
					echo"<table align='center'>";
					while($data_film =  mysql_fetch_array($sql_film)){
					//echo"<table style='margin-top:10px;background:white' class='table table-bordered table-striped table-hover'>";
					$dt_id = $data_film['id_film'];
					$dt_judul = $data_film['judul_film'];
					$dt_rating = $data_film['rating'];
					$dt_genre = $data_film['nama_genre'];
					$dt_klas = $data_film['nama_klasifikasi'];
					$dt_thn = $data_film['tahun_produksi'];
					$dt_rmh = $data_film['studio_produksi'];
					$dt_durasi = $data_film['durasi'];
					$dt_tgmulai = $data_film['tanggal_mulai'];
					$dt_tgselesai = $data_film['tanggal_selesai'];
					$dt_image = $data_film['image'];
					$dt_harga = $data_film['harga'];
					
			?>
				  
					 <tr><td rowspan="8"><img src="<?php echo $dt_image?>" width="250"></td><td colspan="3"><?PHP echo "<b style='font-size:24px';>$dt_judul ($dt_thn)</b>" ?></td></tr>
					 <tr><td>Rating</td><td>:</td><td><?PHP echo "$dt_rating" ?></td></tr>
					 <tr><td>Genre</td><td>:</td><td><?PHP echo "$dt_genre" ?></td></tr>
					 <tr><td>Klasifikasi</td><td>:</td><td><?PHP echo "$dt_klas" ?></td></tr>
					 <tr><td>Stasiun Produksi</td><td>:</td><td><?PHP echo "$dt_rmh" ?></td></tr>
					 <tr><td>Durasi</td><td>:</td><td><?PHP echo "$dt_durasi" ?></td></tr>
					 <tr><td>tanggal Mulai</td><td>:</td><td><?PHP echo "$dt_tgmulai" ?></td></tr>
					 <tr><td>Tanggal Selesai</td><td>:</td><td><?PHP echo "$dt_tgselesai" ?></td></tr>
					 <tr><td></td><td>Harga Tiket</td><td>:</td><td><?PHP echo "Rp $dt_harga" ?></td></tr>
					 <?php echo "<tr><td></td><td><a href='jadwal_film.php?kode=$dt_id'>Jadwal Detail</a></td></tr>" ?>
											
					 <tr><td><br></td></tr>
				  <?PHP
				  			  
				  }
				  echo"</table>";?>
                  </tbody>
            
	</div>
	</div>
	<?PHP include("inc/footer.php"); ?>
</div>
</div>
</body>
</html>