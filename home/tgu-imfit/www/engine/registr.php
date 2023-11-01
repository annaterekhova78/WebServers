<?php setlocale(LC_ALL, 'ru_RU.utf8'); /*для корректной кодировки кириллицы*/
Header("Content-Type: text/html;charset=UTF-8");

function clean($value = "") {/*функция для очистки данных от HTML и PHP тегов*/
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}
include "bd.php";

$email = $_POST['femail'];
$password = $_POST['fpassword'];
$company = $_POST['fcompany'];
$phone = $_POST['fphone'];
$city = $_POST['fcity'];
$address = $_POST['faddress'];
$surname = $_POST['fsurname'];
$nam=$_POST['fnam'];
$secondname=$_POST['fsecondname'];
$group_user=$_POST['fgroup_user'];
$date_reg=date("Y-m-d");

$email = clean($email);
$company=clean($company);
$city = clean($city);
$address =clean($address);
$password=MD5($password);


$qwe="SELECT * FROM im_company WHERE login='$email'";
$qwe_ex=mysql_query($qwe);
$qwe_r=mysql_fetch_array($qwe_ex);

if (!empty($email) && !empty($password))
	{ 
		if(!empty($qwe_r))
		{
		echo "<font color='red'>E-mail ".$qwe_r['login']." уже используется! </font>";
		}
		else
		{	
		$ins="INSERT INTO `im_company` (`id_company` ,`login` ,`password` ,`name_company` ,`phone_company` ,`city`,`address`,`surname`,`name`,`secondname`,`group_user`,`date_reg`,`status`) VALUES (NULL , '$email', '$password' , '$company', '$phone', '$city','$address','$surname','$nam','$secondname','$group_user', '$date_reg', 0)";
		mysql_query($ins);
		
		$comp = "SELECT  * from im_company where login='$email'" ;
		$comp_ex=mysql_query($comp);
		$comp_res=mysql_fetch_array($comp_ex);
		echo "<font color='green'>Организация ".$comp_res['name_company']." успешно зарегистрирована. Авторизируйтесь, пожалуйста. </font><META HTTP-EQUIV='Refresh' CONTENT='2;  URL=../enter.html'>";
		}
	}
	else
{
echo "<font color='red'>Заполните пустые поля! </font>";	
}
	

?>