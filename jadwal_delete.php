<?PHP
include("config.php");
$id_jadwal = $_GET['id_jadwal'];

$sql = mysql_query("delete from jadwal where id_jadwal='$id_jadwal'");
if ($sql){
header("location:jadwal_index.php?pesan=1&isi=Berhasil menghapus jadwal dengan Id $id_jadwal");
}else{
header("location:jadwal_index.php?pesan=2&isi=Gagal menghapus jadwal dengan Id $id_jadwal karena ".mysql_error());
}
?>