<?PHP 
include("config.php");
if (isset($_GET['id_film'])){
$id_film = abs((int)$_GET['id_film']);
//untuk mengambil data berdasarkan id
$sql = mysql_query("select * from film join genre on film.kode_genre=genre.kode_genre join klasifikasi_film on film.kode_klasifikasi_film=klasifikasi_film.kode_klasifikasi_film where id_film='$id_film'");
$data_film = mysql_fetch_array($sql);
$id_film = $data_film['id_film'];
$judul = $data_film['judul_film'];
$rating = $data_film['rating'];
$genre = $data_film['nama_genre'];
$klas = $data_film['nama_klasifikasi'];
$thn = $data_film['tahun_produksi'];
$studio = $data_film['studio_produksi'];
$durasi = $data_film['durasi'];
$tgmulai = $data_film['tanggal_mulai'];
$tgselesai = $data_film['tanggal_selesai'];
$harga = $data_film['harga'];
}else{ // sebaliknya jika parameter id_film kosong
header("location:film_index.php");//alihkan ke film_index.php
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Bioskop Sistem  Informasi - Ubah data film</title>
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
			  <li class='active'><a href="film_index.php"><i class="icon icon-home"></i> Daftar Film</a></li>
			  <li><a href="film_create.php"><i class="icon icon-plus"></i> Tambah Film</a></li>
			</ul>
		</div>
	</div>
	<div class='span10'>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'>
		<!-- content di mulai di sini -->
		<b>Ubah Data Film</b>
		<p style='margin-top:15px;'>
		<form action='film_edit_process.php' enctype='multipart/form-data' method='post'>
			<label>Id Film</label>
			<input readonly type='text' name='id_film_e' value='<?PHP echo $id_film; ?>' class='span12'>
			<label>Judul Film</label>
			<input required type='text' name='judul_film_e' value='<?PHP echo $judul; ?>' class='span12'>
			<label>Rating</label>
			<input required type='text' name='rating_e' value='<?PHP echo $rating; ?>' class='span12'>
			
			<label>Genre</label>
			<select name='kode_genre_e' class='span12'>
			<?PHP
			//untuk menampilkan semua genre yang ada di database
			$sql_g = mysql_query("select * from genre");
			while($dt_g = mysql_fetch_array($sql_g)){
			if ($genre==$dt_g['nama_genre']){
				echo "<option value=\"$dt_g[kode_genre]\" selected>$dt_g[nama_genre]</option>";}
			else {
				echo "<option value=\"$dt_g[kode_genre]\">$dt_g[nama_genre]</option>";}
			}
			?>
			</select>
			
			<label>Klasifikasi Film</label>
			<select name='kode_klasifikasi_film_e' class='span12'>
			<?PHP
			//untuk menampilkan semua klasifikasi yang ada di database
			$sql_k = mysql_query("select * from klasifikasi_film");
			while($dt_k = mysql_fetch_array($sql_k)){
			if ($klas==$dt_k['nama_klasifikasi']){
				echo "<option value=\"$dt_k[kode_klasifikasi_film]\" selected>$dt_k[nama_klasifikasi]</option>";}
			else {
				echo "<option value=\"$dt_k[kode_klasifikasi_film]\">$dt_k[nama_klasifikasi]</option>";}
			}
			?>
			
			</select>
			<label>Tahun Produksi</label>
			<select name="tahun_produksi_e" size="1" id="thn">
            <?php
            for ($i=1990;$i<=2014;$i++)
             {
                if($thn==$i) {
                    echo "<option value=".$i." selected>".$i."</option>";
                } else {
                    echo "<option value=".$i.">".$i."</option>";
                }
             }
			?>
            </select></td>
			
			<label>Studio Produksi</label>
			<input type='text' name='studio_produksi_e' value='<?PHP echo $studio; ?>' class='span12'>
			<label>Durasi</label>
			<input required type='time' name='durasi_e' value='<?PHP echo $durasi; ?>' class='span12'>
			
			<label>Tanggal Mulai Tayang</label>
			<?php list($thn_mulai,$bln_mulai,$tgl_mulai) = explode('-',$tgmulai); ?>
			<select name="tgl_mulai">
            <?php
             for ($i=1;$i<=31;$i++)
             {
                if($tgl_mulai==$i) {
                    echo "<option value=".$i." selected>".$i."</option>";
                } else {
                    echo "<option value=".$i.">".$i."</option>";
                }
             }
			?>
            </select>
			<select name="bln_mulai">
            <?php
             $namabulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
             for ($i=1;$i<=12;$i++)
             {
                if($bln_mulai==$i) {
                    echo "<option value=".$i." selected>".$namabulan[$i]."</option>";
                } else {
                    echo "<option value=".$i.">".$namabulan[$i]."</option>";
                }
             }
			?>
            </select>
			<select name="thn_mulai">
            <?php
             for ($i=2014;$i<=2019;$i++)
             {
                if($thn_mulai==$i) {
                    echo "<option value=".$i." selected>".$i."</option>";
                } else {
                    echo "<option value=".$i.">".$i."</option>";
                }
             }
			?>
            </select></td>
			
			<label>Tanggal Selesai Tayang</label>
			<?php list($thn_selesai,$bln_selesai,$tgl_selesai) = explode('-',$tgselesai); ?>
			<select name="tgl_selesai">
            <?php
             for ($i=1;$i<=31;$i++)
             {
                if($tgl_selesai==$i) {
                    echo "<option value=".$i." selected>".$i."</option>";
                } else {
                    echo "<option value=".$i.">".$i."</option>";
                }
             }
			?>
            </select>
			<select name="bln_selesai">
            <?php
             $namabulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
             for ($i=1;$i<=12;$i++)
             {
                if($bln_selesai==$i) {
                    echo "<option value=".$i." selected>".$namabulan[$i]."</option>";
                } else {
                    echo "<option value=".$i.">".$namabulan[$i]."</option>";
                }
             }
			?>
            </select>
			<select name="thn_selesai">
            <?php
             for ($i=2014;$i<=2019;$i++)
             {
                if($thn_selesai==$i) {
                    echo "<option value=".$i." selected>".$i."</option>";
                } else {
                    echo "<option value=".$i.">".$i."</option>";
                }
             }
			?>
            </select>
			
			<label>Harga</label>
			<input required type='number' name='harga_e' value='<?PHP echo $harga; ?>' class='span12'>
			
			<label>Image</label>
			<input type='file' name='image'  class='span12' id='image'><label>*Pilih cover jika ingin di ganti</label>
			<br></br>
			
			<button class='btn btn-success'><i class='icon icon-white icon-edit'></i> Ubah Dan Simpan</button>
		</form>
		</p>
	</div>
	</div>
	<?PHP include("inc/footer.php"); ?>
</div>
</div>
</body>
</html>