<?php session_start();
	if (isset($_GET['exit'])){
		session_destroy();
		header('location:../index.html');
	}
if (empty($_SESSION ['login'])){
			echo "ДОСТУП ЗАПРЕЩЕН. НЕОБХОДИМО АВТОРИЗИРОВАТЬСЯ.<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=../enter.html'>";
			}
	include ('bd.php');
  $id_cm=$_SESSION['id_company']; /*идентификатор компании */
  $cm=$_SESSION['name_company']; /*название компании*/

function clean($value = "") {/*функция для очистки данных от HTML и PHP тегов*/
   $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}

$vacancy = $_POST['fvacancy'];
$salarymin = $_POST['fsalarymin'];
$salarymax = $_POST['fsalarymax'];
$exp = $_POST['fexp'];
$shed = $_POST['fshed'];
$req = $_POST['freq'];
$date_add=date("Y-m-d");
$active=0;

$vacancy = clean($vacancy);
$salarymin=clean($salarymin);
$salarymax=clean($salarymax);
$exp = clean($exp);
$shed =clean($shed);

if (!empty($vacancy))
	{ 
		$ins="INSERT INTO `im_vacancy` (`id_vacancy`, `vacancy`, `salary_min`, `salary_max`, `experience`, `shedule`, `requirements`, `date_add`, `id_company`, `active`) VALUES (NULL , '$vacancy', '$salarymin' , '$salarymax', '$exp', '$shed','$req', '$date_add','$id_cm','$active')";

		mysql_query($ins);

		echo "<img src='../assets/img/icon-img/loader.gif'> <p class='green2'> Вакансия  успешно зарегистрирована.</font><META HTTP-EQUIV='Refresh' CONTENT='0;  URL=vacancy.php'></p>";
		
	}
	else
{
echo "<font color='red'>Заполните пустые поля! </font>";	
}
	

?>