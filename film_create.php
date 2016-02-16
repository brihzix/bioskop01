<?PHP include("config.php");
$query = mysql_query("SELECT MAX(id_film) AS id_film FROM film");
$film = mysql_fetch_array($query);
$kode = $film['id_film'];
$kode++;
?>
<!DOCTYPE html>
<html>
<head>
<title>Bioskop Mantap - Tambah film</title>
<meta name='Author' content='Dewa'/>
<meta name='Description' content='Crud PHP Mysql Sederhana'/>
<link rel='shortcut icon' type='image icon' href='favicon.ico'/>
<link rel='stylesheet' type='text/css' href='bootstrap/bootstrap.css'/>
<link rel='stylesheet' type='text/css' href='bootstrap/megasoft.css'/>
<script src="js/jquery.min.js"></script>
<body>
<div class='container-fluid' style='margin-top:20px;'>
	<?PHP include("inc/navbar.php"); ?>
	<div class='row-fluid'>
	<div class='span2'>
		<div class="well" style="padding: 8px 0;">
			<ul class="nav nav-list">
			  <li class="nav-header">Menu</li>
			  <li><a href="film_index.php"><i class="icon icon-home"></i> Daftar Film</a></li>
			  <li class='active'><a href="film_create.php"><i class="icon icon-plus"></i> Tambah Film</a></li>
			</ul>
		</div>
	</div>
	<div class='span10'>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'>
		<!-- content di mulai di sini -->
		<b>Tambah Film Baru</b>
		<p style='margin-top:15px;'>
		<form action='film_create_process.php' enctype='multipart/form-data' method='post'>
			<label>Id Film</label>
			<input type='text' name='id_film'>
			<label>Judul Film</label>
			<input required type='text' name='judul_film' class='span12'>
			<label>Rating</label>
			<input required type='text' name='rating' class='span12'>
			<label>Genre</label>
			<select name='kode_genre' class='span12'>
			<?PHP
			
			$sql_g = mysql_query("select * from genre");
			while($dt_g = mysql_fetch_array($sql_g)){
			echo "<option value=\"$dt_g[kode_genre]\">$dt_g[nama_genre]</option>";
			}
			?>
			</select>
			<label>Klasifikasi Film</label>
			<select name='kode_klasifikasi_film' class='span12'>
			<?PHP
			
			$sql_k = mysql_query("select * from klasifikasi_film");
			while($dt_k = mysql_fetch_array($sql_k)){
			echo "<option value=\"$dt_k[kode_klasifikasi_film]\">$dt_k[nama_klasifikasi]</option>";
			}
			?>
			</select>
			
			<label>Tahun Produksi</label>
			<select name='tahun_produksi'><?php
				for ($i=1990;$i<=2014;$i++)
				{
					echo "<option  value=".$i.">".$i."</option>";
				}?>
			</select>
			
			<label>Studio Produksi</label>
			<input type='text' name='studio_produksi' class='span12'>
			<label>Durasi</label>
			<input required placeholder='hh:mm:ss' type='text' name='durasi' class='span12'>
			<label>Tanggal Mulai Tayang</label>
			<select name='tgl_mulai' class='span1'><?php
				for ($i=1;$i<=31;$i++)
				{
					echo "<option  value=".$i.">".$i."</option>";
				}?>
			</select>
			<select name='bln_mulai'><?php
				$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
				for ($i=1;$i<=12;$i++)
				{
					echo "<option  value=".$i.">".$bulan[$i]."</option>";
				}?>
			</select>
			<select name='thn_mulai'><?php
				for ($i=2014;$i<=2019;$i++)
				{
					echo "<option  value=".$i.">".$i."</option>";
				}?>
			</select>
			
			<label>Tanggal Selesai Tayang</label>
			<select name='tgl_selesai' class='span1'><?php
				for ($i=1;$i<=31;$i++)
				{
					echo "<option  value=".$i.">".$i."</option>";
				}?>
			</select>
			<select name='bln_selesai'><?php
				$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
				for ($i=1;$i<=12;$i++)
				{
					echo "<option  value=".$i.">".$bulan[$i]."</option>";
				}?>
			</select>
			<select name='thn_selesai'><?php
				for ($i=2014;$i<=2019;$i++)
				{
					echo "<option  value=".$i.">".$i."</option>";
				}?>
			</select>
			
			<label>Harga</label>
			<input type='number' name='harga'>
			
			<label>Image</label>
			<input required type='file' name='image'  class='span12' id='image'>
			
			
			<br></br>
			
			<button class='btn btn-success'><i class='icon icon-white icon-plus'></i> Tambahkan</button>
		</form>
		</p>
	</div>
	</div>
	<?PHP include("inc/footer.php"); ?>
</div>
</div>
</body>
</html>