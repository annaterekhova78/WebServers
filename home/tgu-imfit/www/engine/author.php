<?php session_start();
setlocale(LC_ALL, 'ru_RU.utf8'); /*для корректной кодировки кириллицы*/
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
$passw = $_POST['fpassw'];

$login = clean($login);
$passw = clean($passw);
$passw = MD5($passw);/*MD5*/

$query = 'SELECT * FROM im_company WHERE login="'.$login.'" AND password ="'.$passw.'"';
$res = mysql_query ($query);
		if($row = mysql_fetch_array($res)){
			if($row['status']==1) {echo "<font color='red'>Вам отказано в доступе. Обратитесь к администратору</font><META HTTP-EQUIV='Refresh' CONTENT='4;  URL=../index.html'>";}
			else {
			$_SESSION ['login'] = $row['login'];
			$_SESSION['id_company'] = $row['id_company'];
			$_SESSION ['name_company'] = $row['name_company'];
			$_SESSION ['name'] = $row['name'];
			$_SESSION ['secondname'] = $row['secondname'];
			$_SESSION ['surname'] = $row['surname'];
			$_SESSION ['group_user'] = $row['group_user'];
			echo "<img src='../assets/img/icon-img/loader.gif'><font color='blue'>Идёт перенаправление...";
			if (($_SESSION ['group_user']==0) || ($_SESSION ['group_user']==2)){
				echo "<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=engine/vacancy.php'>";
					}
			elseif($_SESSION ['group_user']==1) 
					{
				echo "<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=engine/answer.php?id_question=1&n=1'>";
					}
			
				}	
		}
	else
	{
		
echo "<font color='red'>Логин или пароль неправильные!</font>";
	}


?>