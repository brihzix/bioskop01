<?PHP
include("config.php");
$id_film = $_GET['id_film'];

$res = mysql_query("select image from film where id_film='".$_GET['id_film']."' LIMIT 1");
$img=mysql_fetch_object($res);
$sql = mysql_query("delete from film where id_film='$id_film'");
if ($sql)
{
	if (strlen($img->image)>3)
	{
		if (file_exists($img->image)) unlink($img->image);
	} 
	header("location:film_index.php?pesan=1&isi=Berhasil Menghapus Film Dengan Id $id_film");
}
else
{
	header("location:film_index.php?pesan=2&isi=Gagal Menghapus Film Dengan Id $id_film karena ".mysql_error());
}
?>