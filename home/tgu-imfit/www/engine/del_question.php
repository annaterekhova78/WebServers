<?php session_start();
include 'bd.php';
$id_question=$_POST['fid_question'];	
	
	$query = "DELETE FROM im_question WHERE id_question='$id_question'";
	
	$res = mysql_query($query);
	if($res){
			echo "<img src='../assets/img/icon-img/loader.gif'><font color=blue '>Вопрос удалён.<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=answer.php?id_cm=".$_SESSION['id_company']."'>";
	}else{
		echo "<p style='color:red '>Ошибка удаления<br></p>";
	}
?>

