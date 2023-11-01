<?php session_start();
include 'bd.php';
$id_question=$_POST['fid_question'];
$id_company=$_POST['fid_company'];
$answer=$_POST['fansw'];	
$num_question=$_POST['fnum_question'];
$query = "UPDATE im_question SET answer='$answer', status='1', id_company='$id_company' WHERE id_question='$id_question'";

	$res = mysql_query($query);

			echo "<img src='../assets/img/icon-img/loader.gif'><font color=blue '>Ответ добавлен.<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=answer.php?id_question=".$id_question."&n=".$num_question."&#vacedt'>";
?>

