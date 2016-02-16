<?PHP 
include("config.php");
if (isset($_GET['id_jadwal'])){
$id_jadwal = abs((int)$_GET['id_jadwal']);
//untuk mengambil data berdasarkan id
$sql = mysql_query("select * from jadwal join film on jadwal.id_film=film.id_film join teater on jadwal.kode_teater=teater.kode_teater where id_jadwal='$id_jadwal'");
$data_jadwal = mysql_fetch_array($sql);
$jd_id = $data_jadwal['id_jadwal'];
$jd_film = $data_jadwal['judul_film'];
$jd_teater = $data_jadwal['nama_teater'];
$jd_tgl = $data_jadwal['tanggal_tayang'];
$jd_jam = $data_jadwal['id_shift'];
}else{
header("location:jadwal_index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Bioskop Sistem Informasi - Ubah jadwal film</title>
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
			  <li class='active'><a href="jadwal_index.php"><i class="icon icon-home"></i> Daftar Jadwal Film</a></li>
			  <li><a href="jadwal_create.php"><i class="icon icon-plus"></i> Tambah Jadwal Film</a></li>
			</ul>
		</div>
	</div>
	<div class='span10'>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'>
		<!-- content di mulai di sini -->
		<b>Ubah Jadwal Film</b>
		<p style='margin-top:15px;'>
		<form action='jadwal_edit_process.php' method='post'>
			<label>Id Jadwal</label>
			<input readonly type='text' name='id_jadwal_e' value='<?PHP echo $jd_id; ?>' class='span12'>
			
			<label>Judul Film</label>
			<select name='judul_film_e' class='span12'>
			<?PHP
			$sql_f = mysql_query("select * from film");
			while($dt_f = mysql_fetch_array($sql_f)){
			if ($jd_film==$dt_f['judul_film']){
				echo "<option value=\"$dt_f[id_film]\" selected>$dt_f[judul_film]</option>";}
			else {
				echo "<option value=\"$dt_f[id_film]\">$dt_f[judul_film]</option>";}
			}
			?>
			</select>
			
			<label>Teater</label>
			<select name='teater_e' class='span12'>
			<?PHP
			$sql_t = mysql_query("select * from teater");
			while($dt_t = mysql_fetch_array($sql_t)){
			if ($jd_teater==$dt_t['nama_teater']){
				echo "<option value=\"$dt_t[kode_teater]\" selected>$dt_t[nama_teater]</option>";}
			else {
				echo "<option value=\"$dt_t[kode_teater]\">$dt_t[nama_teater]</option>";}
			}
			?>
			</select>
			
			<label>Tanggal Tayang</label>
			<?php list($thn_tyg,$bln_tyg,$tgl_tyg) = explode('-',$jd_tgl); ?>
			<select name="tgl_tyg">
            <?php
             for ($i=1;$i<=31;$i++)
             {
                if($tgl_tyg==$i) {
                    echo "<option value=".$i." selected>".$i."</option>";
                } else {
                    echo "<option value=".$i.">".$i."</option>";
                }
             }
			?>
            </select>
			<select name="bln_tyg">
            <?php
             $namabulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
             for ($i=1;$i<=12;$i++)
             {
                if($bln_tyg==$i) {
                    echo "<option value=".$i." selected>".$namabulan[$i]."</option>";
                } else {
                    echo "<option value=".$i.">".$namabulan[$i]."</option>";
                }
             }
			?>
            </select>
			<select name="thn_tyg">
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
            </select>
			
			<label>Jam Tayang</label>
			<select name='jam_e' class='span3'>
			<?PHP
			$sql_jt = mysql_query("select * from shift_jam");
			while($dt_jt = mysql_fetch_array($sql_jt))
			{
				if ($jd_jam==$dt_jt['id_shift']){
					echo "<option value=\"$dt_jt[id_shift]\" selected>$dt_jt[shift] - $dt_jt[jam_mulai]</option>";}
				else {
					echo "<option value=\"$dt_jt[id_shift]\">$dt_jt[shift] - $dt_jt[jam_mulai]</option>";}
			}
			?></select>
			
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