<?php
session_start();
include('config.php');
$result=mysql_query("select * from login where userid='".$_POST['user']."' and pass='".$_POST['pass']."'");
//echo $action;
//$result=mysqli_query($koneksi, $action);
if(mysql_num_rows($result)==1)
{
while($row = mysql_fetch_array($result))
  { $_SESSION['user']=$row['userid'];
    $_SESSION['level']=$row['level'];
  }
}
else{$_SESSION['login']='fail';}
header('location:login.php');
//echo "".$_POST['user']."";