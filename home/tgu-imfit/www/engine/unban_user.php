<?php session_start();
include 'bd.php';
$id_company=$_POST['fid_company'];	
	$query = "UPDATE im_company SET status=0 WHERE id_company='$id_company'";
	
	$res = mysql_query($query);

			echo "<img src='../assets/img/icon-img/loader.gif'><font color='blue'>Пользователь разблокирован <META HTTP-EQUIV='Refresh' CONTENT='2;  URL=users.php'>";

?>

