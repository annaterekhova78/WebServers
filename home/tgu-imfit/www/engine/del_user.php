<?php session_start();
include 'bd.php';
$id_company=$_POST['fid_company'];
	$query1="DELETE FROM im_vacancy WHERE id_company='$id_company'";
	$res1 = mysql_query($query1);

	$query = "DELETE FROM im_company WHERE id_company='$id_company'";
		$res = mysql_query($query);
			echo "<img src='../assets/img/icon-img/loader.gif'><font color='blue'>Пользователь удалён. <META HTTP-EQUIV='Refresh' CONTENT='0;  URL=users.php'>";

?>

