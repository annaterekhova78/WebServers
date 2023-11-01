<?php setlocale(LC_ALL, 'ru_RU.utf8'); /*для корректной кодировки кириллицы*/
Header("Content-Type: text/html;charset=UTF-8");
include "bd.php";
$id_vac = $_POST['id_vac'];
$act = $_POST['act'];
if ($act==1) {$k="<font color='green'>Вакансия опубликована</font>";}
if ($act==0) {$k="<font color='blue'>Вакансия снята с публикации</font>";}
$anchor="v".$id_vac; /*якорь, чтобы курсор возвращался на редактируемую вакансию*/

$updt="UPDATE im_vacancy SET active='$act' WHERE id_vacancy='$id_vac'";

mysql_query($updt);
echo "<div style='font-family:Arial; width:30%; text-align:center; font-size:25px; border:1px dashed #24a277; border-radius:5px; padding:15px;margin:10% auto'><img src='../assets/img/icon-img/loader.gif'>".$k."<META HTTP-EQUIV='Refresh' CONTENT='1;  URL=vacancy.php#".$anchor."'></div>";
?>