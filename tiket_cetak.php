<?PHP include("config.php");
session_start(); 
$user= $_SESSION['user'];?>
<!DOCTYPE html>
<title>Bioskop Sistem  Informasi</title>
<meta name='Author' content='Kelompok Awak'/>
<meta name='Description' content='Bioskop Sistem  Informasi'/>
<link rel='shortcut icon' type='image icon' href='favicon.ico'/>
<link rel='stylesheet' type='text/css' href='bootstrap/bootstrap.css'/>
<link rel='stylesheet' type='text/css' href='bootstrap/megasoft.css'/>
<script src="js/jquery.min.js"></script>
<body>
<div class='container-fluid' style='margin-top:20px;'>
	<div class='row-fluid'>
	
	<div class='span12'>
	<div class='well' style='background:url(<?PHP echo "bootstrap/body8.png"; ?>) fixed center;'>
<?php
if(isset($_GET['kode']))
{
$s=$_GET['kode'];
  $tiket=mysql_query("select * from tiket join film on tiket.judul=film.id_film join teater on tiket.teater=teater.kode_teater where id=$s");
if(isset($_SESSION['level'])){
while($data_film =  mysql_fetch_array($tiket)){
if(($_SESSION['level'])==2){
if(($data_film['pemilik'])!=($_SESSION['user']))
{
header('location:forbidden.php');
}}
echo"	
<head><meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
         <title>Bioskop Sistem  Informasi</title>
      </head>
	  <body onload='window.print()'>
            <div class='page'>
   <div class='page-portrait'>
      <div class='nobreak'>
          <table border='0' width='80%'>
            <tbody><tr> 
                <td rowspan='2'><img src='favicon.ico' width='40' height='45'>
			   <td align='left'><h3>BIOSKOP SISTEM INFORMASI</h3></td>
			</tr>
			<tr><td><b>Gedung E Lantai 2 Unand Limau Manis</b></td></tr>
			<tr> 
               <td><hr></td>
			</tr>
          </tbody></table><table border='0' width='100%'>
            <tbody><tr> 
               <td align='center'><h3><u>TIKET BIOSKOP SISTEM INFORMASI</u><br></h3>Ticket reg : <font color='red'>$data_film[id]</font> </td>
            </tr>
            
         </tbody></table>
         
         <br>
               <table width='100%' border='1'>
                  <tbody><tr>
                     <th>No.</th>
                     <th>Judul Film</th>
                     <th>Teater</th>
                     <th>No. Kursi</th>
                     <th>Tanggal</th>
					 <th>Jam</th>
					 <th>Harga</th>
					 <th>Atas Nama</th>
                     <!--<th rowspan='2'>Ke</th>-->
                  </tr>					 
                  
                     <tr>
                        <td align='center'>1</td>
                        
                        <td>$data_film[judul_film]</td>
                        <td align='center'>$data_film[nama_teater]</td>
                        <td align='center'>$data_film[seat]</td>
						<td align='center'>$data_film[tglm]</td>
						<td align='center'>$data_film[jam]</td>
                     	<td align='center'>Rp $data_film[harga]</td>
						<td align='center'>$data_film[pemilik]</td>
                     
					 </tr>
                  <tr>
                        <td colspan='8' rowspan='2'>&nbsp;<b><u>Catt</u></b> : Tiket wajib dibawa saat akan menonton <br>untuk verifikasi data oleh petugas</td>
                     </tr>
               </tbody></table>
			   <br>
         <table width='55%' class='tabel-info'>
            <tbody><tr> 
             
            </tr>
         </tbody></table>
         <div align='right'>
            <table width='70%' cellpadding='0' cellspacing='0' border='0'>
               <tbody><tr> 
                  <td width='20%'>&nbsp;</td><td>&nbsp;</td>
                  <td align='left' width='45%'>Padang, ........................</td>
               </tr>
               <tr><td width='60%' rowspan='4' align='right' valign='top'>
					<div><br><br><img src='image/brush_lunas.jpg'width='155' height='70'></div>
				</td>
				</tr><tr> 
                 
                  <td>&nbsp;</td><td align='left' width='45%'>Terima Kasih</td>
               </tr>
               <tr> 
               
                  <td></td>
               </tr>
               <tr> 
                  <td>&nbsp;</td><td colspan='3' height='50'>ttd</td>
               </tr>
               <tr> 
                  <td width='10%'>&nbsp;</td>
				  <td>&nbsp;</td><td align='left'><b>Bioskop Mantap Unand</b></td>
               </tr>
            </tbody></table>
         </div>
      </div>
   </div>
            </div>
      
   
</body></html>";}}
else{
header('location:forbidden.php');
}}