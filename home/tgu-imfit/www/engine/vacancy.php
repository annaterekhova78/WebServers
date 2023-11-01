<?php session_start();
	if (isset($_GET['exit'])){
		session_destroy();
		header('location:../index.html');
	}
if (empty($_SESSION ['login'])){
			echo "ДОСТУП ЗАПРЕЩЕН. НЕОБХОДИМО АВТОРИЗИРОВАТЬСЯ.<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=../enter.html'>";
			}
if ($_SESSION ['group_user']==1){
			echo "ДОСТУП К ДАННОЙ СТРАНИЦЕ ЗАПРЕЩЕН.<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=../index.html'>";
			}
	include ('bd.php');
  $id_cm=$_SESSION['id_company']; /*идентификатор компании */
  $cm=$_SESSION['name_company']; /*название компании*/
	?>
<!DOCTYPE html>
<html class="no-js" lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Вакансии.ТГУ Институт математики, физики и информационных технологий</title>
        <meta name="description" content="Информационно-просветительский сайт кафедральных специальностей: бизнес-информатика и системный анализ">
		<meta name="keywords" content="кафедральные специальности,бизнес-информатика,системный анализ">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
         <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
		 <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../assets/css/jquery-ui.css">
        <link rel="stylesheet" href="../assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
		 <link rel="stylesheet" href="../assets/css/modal.css">
		<link rel="stylesheet" href="../assets/css/style-basic.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
		<link rel="stylesheet" href="../assets/css/question.css">
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
		<script>$(document).ready(function() {
  if ($(document).height() <= $(window).height())
  $("footer.footer-area").addClass("navbar-fixed-bottom");
});
</script>
    </head>
    <body>
  <header class="header-area">
  <div class="theme-bg ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12" >
                            <div class="welcome-area ptb-5">
                               <a href="https://www.tltsu.ru/" target="_blank">
							   <img src="../assets/img/logo/logo2.png" style="text-center"></a>
                            </div>
                        </div>
						<div class="col-lg-4 col-md-4 col-xs-12" >
                            <div class="welcome-area ptb-5">
                               <a href="https://www.tltsu.ru/education/institutions/institut-matematiki-fiziki-i-informacionnyx-texnologii" target="_blank">
							   Институт математики, физики и информационных технологий</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12" >
                            <div class="account-curr-lang-wrap f-right ptb-5" >                 
                                    <a href="#">Тольятти, ул. Белорусская, д. 16В <br>+7 (8482) 44-93-82</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
 </div>
</header>
<div class="shop-area pt-15 pb-75 gray-bg">
<div class="container">
	<div class="row">
<?php  
if ($_SESSION['group_user']==2) {
	$status="администратор сайта ";
	$menu1="<a class='red' href=''>РАЗМЕЩЕНИЕ ВАКАНСИЙ</a> &#9672; <a class='blue' href='answer.php?id_question=1&n=1'>ОТВЕТЫ НА ВОПРОСЫ</a> &#9672; <a class='blue' href='users.php'>ПОЛЬЗОВАТЕЛИ</a>";
	}  
elseif(($_SESSION['group_user']==0)){
	$status="представитель компании ";$menu1="";
	}
	
echo "<div class='col-12 text-center main-menu pb-15 pt-15'>  ".$menu1." </div>";
echo "<div class='col-xl-5 col-lg-5 col-md-12 col-sm-12 pt-15'><h3 class='red'>Размещение вакансий</h3><a href='../vacancy.html' target='_blank'>Перейти на страницу &laquo;ТРУДОУСТРОЙСТВО&raquo;</a>
</div>
<div class='col-xl-7 col-lg-7 col-md-12 col-sm-12 pt-15'>На сайте находится ".$status."<a href='?id_company=".$id_cm."#edit_company' class='green3' title='Редактировать' > ".$cm."</a>, ".$_SESSION['surname']." ".$_SESSION['name']." ".$_SESSION['secondname']." <span class='f-right'><a href='?exit'>Выход  <i class='ti-arrow-right'></i></a></span>
</div>";
?>
		<div class="col-12">
				<div class="section__text pb-25">
                 <div class="accordion" >
                   <div class="accordion__item" >
                     <div class="accordion__item__trigger text-center green2">
                       		Добавить вакансию
                     </div>
                     <div class="accordion__item__content" >
<div class="f-left col-xl-4 col-lg-4 col-md-12 col-sm-12" >
<table >
<tr><td cols="2">&nbsp;</td></tr>
<tr><td>Вакансия</td><td><input type="text" name="vacancy" id="vacancy" class="ncy" style="width:200px" ></td></tr>
<tr><td cols="2">&nbsp;</td></tr>
<tr><td>Зарплата от </td><td><input type="text" name="salarymin" id="salarymin" class="ncy" style="width:80px"> до <input type="text" name="salarymax" id="salarymax" class="ncy" style="width:80px"> &#8381; </td></tr>
<tr><td cols="2">&nbsp;</td></tr>
<tr><td>Опыт работы </td><td><input type="text" name="exp" id="exp" class="ncy" style="width:200px"  ></td></tr>
<tr><td cols="2"></td></tr>
<tr><td cols="2">&nbsp;</td></tr>
<tr><td>Занятость </td><td><input type="text" name="shed" id="shed" class="ncy" style="width:200px" ></td></tr>
</table>
<!-- сообщение о добавлении вакансии  -->
<div id="msg"></div>
</div>
<div class="f-right col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-15" >
<p class="red">Новая строка SHIFT+ENTER, новый абзац - ENTER <br><textarea name='req' id='req'  class="minussize" ></textarea>
<script>
   CKEDITOR.replace("req", {height: 250});
</script>
</p>
<input type="submit" value=" СОХРАНИТЬ " onClick="getdetails()" class="btn-vac">
</div>
				</div>
			</div>
        </div>
   </div>
</div>
<?php 
if (($_SESSION['group_user']==0) || ($_SESSION['group_user']==1)){$w=" AND im_company.id_company='$id_cm'";} elseif ($_SESSION['group_user']==2) {$w="";}
include "bd.php";
$vac="SELECT `id_vacancy` , `vacancy` , `salary_min`, `salary_max` , `experience` , `shedule` , `requirements` , `im_company`.`id_company` , `active` , `name_company` , `phone_company` , `city` , `address`, DATE_FORMAT(`date_add`,'%d.%m.%Y') as date_pub, active
FROM `im_vacancy` , `im_company`
WHERE im_company.`id_company` = im_vacancy.id_company".$w." ORDER BY date_pub desc";

$vac_ex=mysql_query($vac);
if ($vac_ex)
{$num_vac=mysql_num_rows($vac_ex);}
$i=0;
if($num_vac>0){/*если запрос имеет результат, то в цикле проходим по записям таблицы Вакансии*/
while($vac_res=mysql_fetch_array($vac_ex)){
	$i++;
	/* Изображение "Вакансия активна" или "Вакансия на рассмотрении"*/
	if ($vac_res['active']==1) {$im="<img src='../assets/img/icon-img/active.png'>";} else {$im="<img src='../assets/img/icon-img/noactive.png'>";}

echo '<p id="v'.$vac_res['id_vacancy'].'"></p>';?>
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" >							
<div class="product-img" >
<div class="green3 plussize">
	<?php				echo $vac_res['vacancy']."
						<br>".$vac_res['salary_min']." - ".$vac_res['salary_max']."&#8381
						<br>".$im."
						<p>Опыт работы: ".$vac_res['experience']."
						<br>".$vac_res['shedule']."
						<br><b>".$vac_res['name_company']."</b>
						<br>".$vac_res['phone_company']."
						<br><em>Дата размещения: ".$vac_res['date_pub']."</em>";
						
/* Если на сайте администратор, то он может изменить статус публикации вакансии */
if ($_SESSION['group_user']==2) {
	
if($vac_res['active']==1) {$a="СНЯТЬ С ПУБЛИКАЦИИ"; $d=0;} elseif($vac_res['active']==0) {$a="ОПУБЛИКОВАТЬ"; $d=1;}
echo'<form action="accsess_pub.php" method="POST" name="form1">
<input type="hidden" name="id_vac" value="'.$vac_res['id_vacancy'].'">
<input type="hidden" name="act" value="'.$d.'">
<input type="submit" class="publish" value="'.$a.'">';
}
?>
<div id="mes"></div>
	        </form></p></div>
		</div>
	</div>
<div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 minusssize" >
<?php echo $vac_res['requirements']; ?>
</div>
<div class="col-12" id="vacedt">
<!-- Кнопки редактирования и удаления вакансии-->
<?php echo '<a  href="?id_vac='.$vac_res['id_vacancy'].'&vac='.$vac_res['vacancy'].'&#del_vac" class="btn-vac"  style="background-color:#e73a4d;">Удалить вакансию </a>
<a  href="vacancy_edit.php?id_vac='.$vac_res['id_vacancy'].'" class="btn-vac" >Редактировать вакансию </a>';?>
<!-- Разделительная линия -->
<br><hr class="mp-20 ">
</div>

<?php /*завершение цикла*/
}}
else/*если запрос не имеет результата (пустой)*/
{echo "<h4 class='green3 mb-70' >Вакансий не добавлено.</h4>";}
?>
<!---->
</div>
</div>
</div>
<footer style="position:fixed; top:92%;left:0; right:0" >
<div class="gray-bg-3 pt-17 pb-15">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="copyright text-center">
				<p><a href="enter.html">Copyright © ТГУ Институт математики, физики и информационных технологий</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
</footer>
			<!--окно с запросом об удалении вакансии -->
<a href="#x" class="overlay " id="del_vac"></a>	
<div class="popup text-center mt-25" > 
	<br><h5>Вы действительно хотите удалить вакансию <br>
	<b><?php echo $_GET['vac'] ?></b>?</h5>
	<input type="hidden" id="id_vac" value=<?php echo $_GET['id_vac']; ?>>
	 <br><input type="submit" value="УДАЛИТЬ" class="publish" onClick="del_vac()">
	 <a href="#close" class="publish" style="padding-top:12px; padding-bottom:12px">Отмена</a>
	 <div id="del"></div>
     <a class="close" href="#close"></a>
</div>
<!--Редактирование информации о компании -->
<a href="#x" class="overlay " id="edit_company"></a>	
<div class="popup  mt-25" > 
<br><h4 class="green2">Редактирование информации о компании</h4>
<?php $id_company=$_SESSION['id_company'];
$y="SELECT * FROM im_company WHERE id_company='$id_company'";
$y_ex=mysql_query($y);
$y_res=mysql_fetch_array($y_ex);
 ?>
 <input type="hidden" name="id_company" id="id_company" value="<?php echo $id_company;?>">
 <table cellpadding="7" width="100%" cellspacing="7" align="center">
<tr><td>Название</td><td><input type="text" name="name_company" id="name_company" value="<?php echo $y_res['name_company']; ?>" ></td></tr>
<tr><td>Город</td><td><input type="text" name="city" id="city" value="<?php echo $y_res['city']; ?>"></td></tr>
<tr><td>Адрес</td><td><input type="text" name="address" id="address" value="<?php echo $y_res['address']; ?>" style="width:500px"></td></tr>
<tr><td>Телефон</td><td><input type="text" name="phone_company" id="phone_company" value="<?php echo $y_res['phone_company']; ?>"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="email" id="email" value="<?php echo $y_res['login']; ?>"></td></tr>
<tr><td>Фамилия</td><td><input type="text" name="surname" id="surname" value="<?php echo $y_res['surname']; ?>"></td></tr>
<tr><td>Имя</td><td><input type="text" name="nam" id="nam" value="<?php echo $y_res['name']; ?>"></td></tr>
<tr><td>Отчество</td><td><input type="text" name="secondname" id="secondname" value="<?php echo $y_res['secondname']; ?>"></td></tr>
</table>
	 <p align="center" class="mt-15">
<input type="submit" value="СОХРАНИТЬ" class="publish text-center" onClick="edit_company()" >
<a class="publish" href="#close" style="padding-top:12px; padding-bottom:12px;">ОТМЕНА</a>
	 </p>
	 <div id="com"></div>
     <a class="close" href="#close"></a>
</div>	
<script>
/*Редактирование информации о компании*/
function edit_company(){
    var id_company = $('#id_company').val();
	var email = $('#email').val();
	var name_company = $('#name_company').val();
	var city = $('#city').val();
	var address = $('#address').val();
	var phone_company = $('#phone_company').val();
	var surname = $('#surname').val();
	var nam = $('#nam').val();
	var secondname = $('#secondname').val();
	var result="";
    $.ajax({
        type: "POST",
        url: "edit_company.php",
        data: {fid_company:id_company, femail:email,fname_company:name_company, fcity:city, faddress:address, femail:email, fphone_company:phone_company, fsurname:surname, fnam:nam, fsecondname:secondname}
    }).done(function( result )
        {
            $("#com").html( result );
        });
}
</script>
<script>
/*регистрация через Ajax*/
function getdetails(){
	var vacancy = $('#vacancy').val();
    var salarymin = $('#salarymin').val();
	var salarymax = $('#salarymax').val();
	var exp = $('#exp').val();
	var shed = $('#shed').val();
	/*получение данных из встроенного редактора */
	var req = $('#req').val();
	req = CKEDITOR.instances.req.getData();
	var result="";
    $.ajax({
        type: "POST",
        url: "add_vacancy.php",
       data: {fvacancy:vacancy,fsalarymin:salarymin,fsalarymax:salarymax,fexp:exp,fshed:shed,freq:req}
    }).done(function( result )
        {
            $("#msg").html( result );
        });
}
</script>
<script>
/*Удаление вакансии*/
function del_vac(){
    var id_vac = $('#id_vac').val();
  	var result="";
    $.ajax({
        type: "POST",
        url: "del_vacancy.php",
        data: {fid_vac:id_vac}
    }).done(function( result )
        {
            $("#del").html( result );
        });
}
</script>
        <script src="../assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.counterup.min.js"></script>
        <script src="../assets/js/waypoints.min.js"></script>
        <script src="../assets/js/elevetezoom.js"></script>
        <script src="../assets/js/ajax-mail.js"></script>
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
		<script src="../assets/js/question.js"></script>
		<script src="../assets/js/change_goods.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
