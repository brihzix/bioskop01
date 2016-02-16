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
			  <li class='active'><a href="film_index.php"><i class="icon icon-home"></i> Daftar Film</a></li>
			  <li><a href="film_create.php"><i class="icon icon-plus"></i> Tambah Film</a></li>
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
		<center style="font-size:24px"><b>Daftar Film Bioskop</b></center>
		<p style='margin-top:10px'>
		<a href='film_create.php' class='btn btn-primary'><i class='icon icon-white icon-plus'></i> Tambah Daftar Film</a>
		<table style='margin-top:10px;background:white' class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
					  <th>Judul Film</th>
					  <th>Rating</th>
					  <th>Genre</th>
					  <th>Klasifikasi</th>
					  <th>Tahun Produksi</th>
					  <th>Studio Produksi</th>
					  <th>Durasi</th>
					  <th>Tanggal Mulai</th>
					  <th>Tanggal Selesai</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?PHP
					$sql_film = mysql_query("select * from film join genre on film.kode_genre=genre.kode_genre join klasifikasi_film on film.kode_klasifikasi_film=klasifikasi_film.kode_klasifikasi_film order by id_film");
					$no = 1;
					while($data_film =  mysql_fetch_array($sql_film)){
					$dt_id = $data_film['id_film'];
					$dt_judul = $data_film['judul_film'];
					$dt_rating = $data_film['rating'];
					$dt_genre = $data_film['nama_genre'];
					$dt_klas = $data_film['nama_klasifikasi'];
					$dt_thn = $data_film['tahun_produksi'];
					$dt_studio = $data_film['studio_produksi'];
					$dt_durasi = $data_film['durasi'];
					$dt_tgmulai = $data_film['tanggal_mulai'];
					$dt_tgselesai = $data_film['tanggal_selesai'];
				  ?>
				  <tr>
					  <td><?PHP echo "$no" ?></td>
					  <td><?PHP echo "<b><a href='film_detail.php?kode=$dt_id'>$dt_judul</a></b>" ?></td>
					  <td><?PHP echo "$dt_rating" ?></td>
					  <td><?PHP echo "$dt_genre" ?></td>
					  <td><?PHP echo "$dt_klas" ?></td>
					  <td><?PHP echo "$dt_thn" ?></td>
					  <td><?PHP echo "$dt_studio" ?></td>
					  <td><?PHP echo "$dt_durasi" ?></td>
					  <td><?PHP echo "$dt_tgmulai" ?></td>
					  <td><?PHP echo "$dt_tgselesai" ?></td>
					  <td>
					  <div class='btn-group'>
					  <a href="film_delete.php?id_film=<?PHP echo $dt_id; ?>" onclick="return confirm('Anda yakin menghapus film <?php echo "$dt_judul" ?>?')" class="btn btn-mini btn-danger tipsy-kiri-atas" title='hapus film'> <i class="icon-remove icon-white"></i> </a> 
					  <a href="film_edit.php?id_film=<?PHP echo $dt_id; ?>" class="btn btn-mini btn-info tipsy-kiri-atas" title='Edit data film'> <i class="icon-edit icon-white"></i> </a> 
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