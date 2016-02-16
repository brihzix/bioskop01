<?PHP
include("config.php");
$id_film = $_POST['id_film_e'];
$judul = $_POST['judul_film_e'];
$rating = $_POST['rating_e'];
$genre = $_POST['kode_genre_e'];
$klas = $_POST['kode_klasifikasi_film_e'];
$thn = $_POST['tahun_produksi_e'];
$studio = $_POST['studio_produksi_e'];
$durasi = $_POST['durasi_e'];
$harga = $_POST['harga_e'];
$tglm = $_POST['thn_mulai']."-".$_POST['bln_mulai']."-".$_POST['tgl_mulai'];
$tgls = $_POST['thn_selesai']."-".$_POST['bln_selesai']."-".$_POST['tgl_selesai'];

if (!empty($_FILES["image"]["tmp_name"]))
    {
        $namafolder="image/"; //tempat menyimpan file
        $jenis_gambar=$_FILES['image']['type'];
        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
        {          
            $image = $namafolder . basename($_FILES['image']['name']);      
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $image))
            {
               die("Gambar gagal dikirim");
            }
            //Hapus image yang lama jika ada
            $res = mysql_query("select image from film where id_film='$id_film' LIMIT 1");
            $img=mysql_fetch_object($res);
            if (strlen($img->image)>3)
            {
                if (file_exists($img->image)) unlink($img->image);
            }                   
            //update image dengan yang baru
            mysql_query("UPDATE film SET image='$image' WHERE id_film='$id_film' LIMIT 1");
        }
        else { die("Jenis gambar yang anda kirim salah. Harus .jpg .gif .png"); }
    }

$sql = mysql_query("update film set id_film='$id_film', judul_film='$judul', rating='$rating', kode_genre='$genre', kode_klasifikasi_film='$klas', tahun_produksi='$thn', studio_produksi='$studio', durasi='$durasi', tanggal_mulai='$tglm', tanggal_selesai='$tgls', harga='$harga' where id_film='$id_film'");
if ($sql){
header("location:film_index.php?pesan=1&isi=Berhasil Mengedit Film dengan Judul $judul");
}else{
header("location:film_index.php?pesan=2&isi=Gagal Mengedit Film dengan Judul $judul karena ".mysql_error());
}
?>