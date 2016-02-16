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
		<center style="font-size:24px"><b>Daftar Film Bioskop</b></center>
		<p style='margin-top:10px'>
		
		
                  <thead>
                  </thead>
                  <tbody>
				  <?PHP
					$sql_film = mysql_query("select * from film join genre on film.kode_genre=genre.kode_genre join klasifikasi_film on film.kode_klasifikasi_film=klasifikasi_film.kode_klasifikasi_film order by id_film");
					
					echo"<table align='center'>";
					while($data_film =  mysql_fetch_array($sql_film)){
					echo"<table style='margin-left:80px;'>";
					
					$dt_id = $data_film['id_film'];
					$dt_judul = $data_film['judul_film'];
					$dt_rating = $data_film['rating'];
					$dt_genre = $data_film['nama_genre'];
					$dt_klas = $data_film['nama_klasifikasi'];
					$dt_thn = $data_film['tahun_produksi'];
					$dt_image = $data_film['image'];
					
				  ?>
					 <tr>
						<td colspan="3"><?PHP echo "<h3><a href='film_detail.php?kode=$dt_id'>$dt_judul</a> ($dt_thn)</h3>" ?></td>
					 </tr>
					 <tr>
						<td rowspan="4" width="150" height="150"><img src="<?php echo $dt_image?>" width="100"></td>
						<td width="90">Rating</td>
						<td width="20">:</td>
						<td><?PHP echo "$dt_rating" ?></td>
					 </tr>
					 <tr>
						<td>Genre</td>
						<td>:</td>
						<td><?PHP echo "$dt_genre" ?></td>
					 </tr>
					 <tr>
						<td>Klasifikasi</td>
						<td>:</td>
						<td><?PHP echo "$dt_klas" ?></td>
					 </tr>
					 <tr>
						<td><?php echo "<a href='jadwal_film.php?kode=$dt_id'>Jadwal Detail</as>" ?></td>
					 </tr>
					 
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