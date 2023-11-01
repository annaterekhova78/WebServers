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
         <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/favicon.png">
		 <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../assets/css/jquery-ui.css">
        <link rel="stylesheet" href="../assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
		<link rel="stylesheet" href="../assets/css/style-basic.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
		<link rel="stylesheet" href="../assets/css/question.css">
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
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
		<div class="col-12">
<?php 
include "bd.php";
if ($_SESSION['group_user']==0) {$w=" AND id_company='$id_cm'";} elseif ($_SESSION['group_user']==2) {$w="";}
$id_vac=$_GET['id_vac'];
if ($_SESSION['group_user']==0) {$w=" AND bs_company.id_company='$id_cm'";} elseif ($_SESSION['group_user']==2) {$w="";}
$vace="SELECT `id_vacancy` , `vacancy` , `salary_min`, `salary_max` , `experience` , `shedule` , `requirements` , `id_company` , `active`  
FROM `im_vacancy` 
WHERE id_vacancy='$id_vac'"; 
$vace_ex=mysql_query($vace);
$vace_res=mysql_fetch_array($vace_ex);
echo "<a href='vacancy.php?id_cm=". $id_cm."'> << Размещение вакансий</a> <h5>Компания <b>".$cm."</b></h5><div class='f-right'><a  href='?exit'>Выход <i class='ti-arrow-right'></i></a></div>";
?>
<br><h4 class="red f-left">Редактирование вакансии <span class="red"><?php $vace_res['vacancy']; ?></h4>
</div>
<div class="col-4" id="vacedt">
<?php  
echo "<input type='hidden' name='id_vacancy', id='id_vacancy' value='".$vace_res['id_vacancy']."'>
<br><textarea name='vacancy' id='vacancy' class='titl'>".$vace_res['vacancy']."</textarea><br>
<br>Зарплата от <input type='text' name='salarymin' id='salarymin' class='ncy' style='width:100px' value='".$vace_res['salary_min']."'> до <input type='text' name='salarymax' id='salarymax' class='ncy' style='width:100px' value='".$vace_res['salary_max']."'> &#8381; <br>
<br>Опыт работы<input type='text' name='exp' id='exp' class='ncy' style='width:200px' value='".$vace_res['experience']."'><br>
<br><textarea name='shed' id='shed' >".$vace_res['shedule']."</textarea>";
?>
<div id="msg"></div>
</div>
<div class="col-8 pb-75 red">
Новая строка - SHIFT+ENTER, новый абзац - ENTER

<textarea name='req' id='req'  style="font-size:12px; line-height:12px;" width="100%" cols="50" rows="40" >
<?php echo $vace_res['requirements']; ?>
</textarea>
<script>
   CKEDITOR.replace("req");
   enterMode: CKEDITOR.ENTER_P;
   shiftEnterMode: CKEDITOR.ENTER_BR;
</script>
	 <br><input type="submit" value="Сохранить" class="btn-vac" onClick="edit_vacancy()">
	 <div id="mes"></div>
</div>
	</div>
</div>
<footer class="footer-area" data-spy="affix" data-offset-bottom="0">
            <div class="footer-bottom gray-bg-3 pt-17 pb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright text-center">
                                <p><a href="enter.html">Copyright © ТГУ Институт математики, физики и информационных технологий </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</footer>
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
<script>
/*регистрация через Ajax*/
function edit_vacancy(){
	var id_vacancy = $('#id_vacancy').val();
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
        url: "edit_vacancy.php",
        data: {fid_vacancy:id_vacancy,fvacancy:vacancy,fsalarymin:salarymin,fsalarymax:salarymax,fexp:exp,fshed:shed,freq:req}
    }).done(function( result )
        {
            $("#msg").html( result );
        });
}
</script>
</body>
</html>
