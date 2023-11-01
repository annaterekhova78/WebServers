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
$id_vacancy = $_POST['fid_vacancy'];
$vacancy = $_POST['fvacancy'];
$salarymin = $_POST['fsalarymin'];
$salarymax = $_POST['fsalarymax'];
$exp = $_POST['fexp'];
$shed = $_POST['fshed'];
$req = $_POST['freq'];

$vacancy = clean($vacancy);
$salarymin=clean($salarymin);
$salarymax=clean($salarymax);
$exp = clean($exp);
$shed =clean($shed);
$anchor="v".$id_vacancy; /*якорь, чтобы курсор возвращался на редактируемую вакансию*/
		$upd="UPDATE  `im_vacancy`  SET `vacancy`='$vacancy', `salary_min`='$salarymin', `salary_max`='$salarymax', `experience`='$exp', `shedule`='$shed', `requirements`='$req'  WHERE `id_vacancy`='$id_vacancy'";
		
		mysql_query($upd);
		
		$vac = "SELECT  * from im_vacancy where id_vacancy='$id_vacancy'" ;
		
		$vac_ex=mysql_query($vac); 
		$vac_res=mysql_fetch_array($vac_ex);
		echo "<img src='../assets/img/icon-img/loader.gif'> <p class='green2'> Вакансия успешно изменена.</font><META HTTP-EQUIV='Refresh' CONTENT='0;  URL=vacancy.php?id_vac=".$id_vacancy."#".$anchor."'></p>";
?>