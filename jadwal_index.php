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
	<!-- untuk menampilkan pesan -->
		<?PHP
		if (isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		$isi = $_GET['isi'];
		if ($pesan == 1){
		echo "<div class='alert alert-success'>
		<a class='close' data-dismiss='alert'>×</a>
		<b>Sukses!</b> $isi
		</div>";
		}
		if ($pesan == 2){
		echo "<div class='alert alert-danger'>
		<a class='close' data-dismiss='alert'>×</a>
		<b>Gagal!</b> $isi
		</div>";
		}
		}
		?>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'>
		<!-- content di mulai di sini -->
		<center style="font-size:24px"><b>Jadwal Film Bioskop</b></center>
		<p style='margin-top:10px'>
		<a href='jadwal_create.php' class='btn btn-primary'><i class='icon icon-white icon-plus'></i> Tambah Jadwal Film</a>
		<table style='margin-top:10px;background:white' class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
					  <th>Id Jadwal</th>
					  <th>Judul Film</th>
					  <th>Teater</th>
					  <th>Tanggal</th>
					  <th>Jam</th>
					  <th>Aksi</th>
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
					?>
				  <tr>
					  <td><?PHP echo "$no" ?></td>
					  <td><?PHP echo "$jd_id" ?></td>
					  <td><?PHP echo "$jd_film" ?></td>
					  <td><?PHP echo "$jd_teater" ?></td>
					  <td><?PHP echo "$jd_tgl" ?></td>
					  <td><?PHP echo "$jd_shift - $jd_jam" ?></td>
					  <td>
					  <div class='btn-group'>
					  <a href="jadwal_delete.php?id_jadwal=<?PHP echo $jd_id; ?>" onclick="return confirm('Anda yakin menghapus jadwal film <?php echo "$jd_film" ?>?')" class="btn btn-mini btn-danger tipsy-kiri-atas" title='hapus film'> <i class="icon-remove icon-white"></i> </a> 
					 <!-- <a href="jadwal_edit.php?id_jadwal=<?PHP echo $jd_id; ?>" class="btn btn-mini btn-info tipsy-kiri-atas" title='Edit data film'> <i class="icon-edit icon-white"></i> </a> -->
					  </div>
					  </td>
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