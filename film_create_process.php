<?PHP
include("config.php");
$id_film = $_POST['id_film'];
$judul = $_POST['judul_film'];
$rating = $_POST['rating'];
$genre = $_POST['kode_genre'];
$klas = $_POST['kode_klasifikasi_film'];
$thn = $_POST['tahun_produksi'];
$studio = $_POST['studio_produksi'];
$durasi = $_POST['durasi'];
$tglm = $_POST['thn_mulai']."-".$_POST['bln_mulai']."-".$_POST['tgl_mulai'];
$tgls = $_POST['thn_selesai']."-".$_POST['bln_selesai']."-".$_POST['tgl_selesai'];
$harga = $_POST['harga'];

if (!empty($_FILES["image"]["tmp_name"]))

        {

          $namafolder="image/";  //tempat menyimpan file

          $jenis_gambar=$_FILES['image']['type'];

          if($jenis_gambar=="image/jpeg"  || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png")

          {           

            $image  = $namafolder . basename($_FILES['image']['name']);       

            if  (!move_uploaded_file($_FILES['image']['tmp_name'], $image))

            { die("Gambar gagal dikirim"); }

          } else  { die("Jenis gambar yang anda kirim salah. Harus .jpg .gif .png"); }

        }

$sql = mysql_query("insert into film values('$id_film', '$judul', '$rating', '$genre', '$klas', '$thn', '$studio', '$durasi', '$tglm', '$tgls', '$image','$harga')");
if ($sql){
header("location:film_index.php?pesan=1&isi=Berhasil Menambahkan Film dengan Judul $judul");
}else{
header("location:film_index.php?pesan=2&isi=Gagal Menambahkan Film dengan Judul $judul karena ".mysql_error());
}
?>