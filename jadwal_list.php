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
		<center style="font-size:24px"><b>Jadwal Film Bioskop</b></center>
		<p style='margin-top:10px'>
		<table style='margin-top:10px;background:white' class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
					  <th>Judul Film</th>
					  <th>Teater</th>
					  <th>Tanggal</th>
					  <th>Jam</th>
					  <?php if(isset($_SESSION['user'])){echo "<th>Aksi</th>";}?>
					</tr>
                  </thead>
                  <tbody>
				  <?PHP
					$sql_jadwal = mysql_query("select * from jadwal join film on jadwal.id_film=film.id_film join teater on jadwal.kode_teater=teater.kode_teater join shift_jam on jadwal.id_shift=shift_jam.id_shift order by id_jadwal");
					$no = 1;
					while($data_jadwal =  mysql_fetch_array($sql_jadwal)){
					$jd_id = $data_jadwal['id_jadwal'];
					$jd_film = $data_jadwal['judul_film'];
					$jd_teater = $data_jadwal['nama_teater'];
					$jd_tgl = $data_jadwal['tanggal_tayang'];
					$jd_shift = $data_jadwal['shift'];
					$jd_jam = $data_jadwal['jam_mulai'];
					$kd_teater = $data_jadwal['kode_teater'];
					?>
				  <tr>
					  <td><?PHP echo "$no" ;?></td>
					  <td><?PHP echo "$jd_film"; ?></td>
					  <td><?PHP /*echo "<a href='jadwal_teater.php?kode=$kd_teater'>$jd_teater</a>"*/ echo "$jd_teater";?></td>
					  <td><?PHP echo "$jd_tgl";?></td>
					  <td><?PHP echo "$jd_shift - $jd_jam"; ?></td>
					  <?php if(isset($_SESSION['user'])){echo "<td><a href='tiket.php?jadwal=$jd_id'><left class='btn btn-danger'>pesan</left></a></td>";}?>
				 </tr>
				  <?PHP
				  $no++;
				  }
				  ?>
                  </tbody>
            </table>
	</div>
	</div>
	<?PHP include("inc/footer.php"); ?>
</div>
</div>
</body>
</html>