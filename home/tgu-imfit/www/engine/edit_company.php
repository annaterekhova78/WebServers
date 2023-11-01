<?php setlocale(LC_ALL, 'ru_RU.utf8'); /*для корректной кодировки кириллицы*/
Header("Content-Type: text/html;charset=UTF-8");

include "bd.php";
$id_company=$_POST['fid_company'];
$email = $_POST['femail'];
$name_company = $_POST['fname_company'];
$phone_company= $_POST['fphone_company'];
$city = $_POST['fcity'];
$address = $_POST['faddress'];
$surname = $_POST['fsurname'];
$nam=$_POST['fnam'];
$secondname=$_POST['fsecondname'];

	
$upd="UPDATE `im_company`  SET `login`='$email',`name_company`='$name_company',`phone_company`='$phone_company', `city`='$city',`address`='$address',`surname`='$surname',`name`='$nam',`secondname`='$secondname' WHERE `id_company`='$id_company'";

		mysql_query($upd);

		echo "<font color='green'>Информация о компании обновлена. </font><META HTTP-EQUIV='Refresh' CONTENT='0;  URL=vacancy.php'>";


?>