<?PHP
include("config.php");
$id = $_POST['id'];
$nama = $_POST['nama'];
$sql = mysql_query("update jurusan set nama_jurusan='$nama' where id='$id'");
if ($sql){
header("location:jurusan.php?pesan=1&isi=Berhasil Mengedit jurusan Dengan id $id");
}else{
header("location:jurusan.php?pesan=1&isi=Gagal Mengedit jurusan Dengan id $id karena ".mysql_error());
}
?>