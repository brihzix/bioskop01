<?PHP
include("config.php");
$jd_id = $_POST['id_jadwal_e'];
$jd_film = $_POST['judul_film_e'];
$jd_teater = $_POST['teater_e'];
$jd_tgl = $_POST['thn_tyg']."-".$_POST['bln_tyg']."-".$_POST['tgl_tyg'];
$jd_jam = $_POST['jam_e'];
$sql = mysql_query("update jadwal set id_jadwal='$jd_id', id_film='$jd_film', kode_teater='$jd_teater', tanggal_tayang='$jd_tgl', id_shift='$jd_jam' where id_jadwal='$jd_id'");
if ($sql){
header("location:jadwal_index.php?pesan=1&isi=Berhasil mengedit jadwal film dengan Id $jd_id");
}else{
header("location:jadwal_index.php?pesan=2&isi=Gagal mengedit jadwal film ".mysql_error());
}
?>