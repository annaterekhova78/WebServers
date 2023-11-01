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
$login = $_POST['flogin'];
$password_new = $_POST['fpassword_new'];

$login = clean($login);
$password_new = clean($password_new);

if(!empty($login) && !empty($password_new))
	{
$sql = "SELECT  login from im_company where login='$login'" ;
$result = mysql_query($sql);
		if($row=mysql_fetch_array($result))
		{
$password_new=md5($password_new);	
			
$upd="UPDATE im_company SET password='$password_new' WHERE login='$login'";
mysql_query($upd);
echo "<font class='green'>Ваш пароль изменён.</font><br><a href='../enter.html' ><< АВТОРИЗАЦИЯ</a><br>";
		}
		else
		{
			echo "<font class='red'>Пользователь с логином $login не зарегистрирован.</font><br><a href='../enter.html' ><< Регистрация</a><br>";
		}
	}
else
	{
	echo "<font class='red'>Заполните пустые поля! </font><br>";	
	}
?>