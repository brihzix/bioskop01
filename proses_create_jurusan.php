<?PHP
include("config.php");
$nama_jurusan = $_POST['nama'];
$sql = mysql_query("insert into jurusan values('', '$nama_jurusan')");
if ($sql){
header("location:jurusan.php?pesan=1&isi=Berhasil Menambahkan Jurusan Baru Dengan nama $nama_jurusan");
}else{
header("location:jurusan.php?pesan=1&isi=Gagal Menambahkan Jurusan Baru Dengan nama $nama_jurusan karena ".mysql_error());
}
?>