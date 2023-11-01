<?php session_start();
include 'bd.php';
$id_vac=$_POST['fid_vac'];	
	$query = "DELETE FROM im_vacancy WHERE id_vacancy='$id_vac'";
	
	$res = mysql_query($query);
	if($res){
			echo "<img src='../assets/img/icon-img/loader.gif'><font color=blue '>Вакансия удалена.<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=vacancy.php?id_cm=".$_SESSION['id_company']."'>";
	}else{
		echo "<p style='color:red '>Ошибка удаления<br></p>";
	}
?>

