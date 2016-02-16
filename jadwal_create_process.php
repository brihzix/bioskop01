<?PHP
include("config.php");
$id_jadwal = $_POST['id_jadwal'];
$judul = $_POST['judul_film'];
$teater = $_POST['teater'];
$tglm = $_POST['thn_tyg']."-".$_POST['bln_tyg']."-".$_POST['tgl_tyg'];
$jam = $_POST['jam_tyg'];

$cek_tiket=mysql_query("select max(id) as id from tiket");
$tiket = mysql_fetch_array($cek_tiket);
$id_tiket=$tiket['id'];
$id_tiket++;

$cek = mysql_query("select * from jadwal where kode_teater='$teater' and tanggal_tayang='$tglm' and id_shift='$jam'");

if(mysql_num_rows($cek)==0)
{
$sql = mysql_query("insert into jadwal values('$id_jadwal', '$judul', '$teater', '$tglm', '$jam')");
if($teater == (31||32||33||34))
	{
		for($i=1;$i<=50;$i++)
		{
			$input=mysql_query("insert into tiket values('$id_tiket','$id_jadwal', '$judul', '$teater', '$tglm', '$jam','$i','')");
			$id_tiket++;
		}
	}
else 
	{
		for($i=1;$i<=60;$i++)
		{
			$input=mysql_query("insert into tiket values('$id_tiket','$id_jadwal', '$judul', '$teater', '$tglm', '$jam','$i','')");
			$id_tiket++;
		}
	}
if ($sql){
header("location:jadwal_index.php?pesan=1&isi=Berhasil menambahkan jadwal film dengan Id $id_jadwal");
}else{
header("location:jadwal_index.php?pesan=2&isi=Gagal menambahkan jadwal film");
}}
else
{header("location:jadwal_index.php?pesan=2&isi=Jadwal telah ada");}
?>