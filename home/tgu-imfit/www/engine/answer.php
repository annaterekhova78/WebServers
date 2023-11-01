<?php session_start();
	if (isset($_GET['exit'])){
		session_destroy();
		header('location:../index.html');
	}
if (empty($_SESSION ['login'])){
			echo "ДОСТУП ЗАПРЕЩЕН. НЕОБХОДИМО АВТОРИЗИРОВАТЬСЯ.<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=../enter.html'>";
			}
if ($_SESSION ['group_user']==0){
			echo "ДОСТУП К ДАННОЙ СТРАНИЦЕ ЗАПРЕЩЕН.<META HTTP-EQUIV='Refresh' CONTENT='0;  URL=../index.html'>";
			}
	include ('bd.php');
  $id_cm=$_SESSION['id_company']; /*идентификатор компании */
  $cm=$_SESSION['name_company']; /*название компании*/
  if ($_GET['id_question']=='' AND $_GET['n']=="") {$_GET['id_question']=1;$_GET['n']=1;}
	?>
<!DOCTYPE html>
<html class="no-js" lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ответ на вопрос.ТГУ Институт математики, физики и информационных технологий</title>
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
		 <link rel="stylesheet" href="../assets/css/modal.css">
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
<div class="shop-area pt-15 pb-150 gray-bg">
<div class="container">
	<div class="row">

<?php  
if ($_SESSION['group_user']==2) {
	$status="администратор";
	$menu1="<a class='blue' href='vacancy.php'>РАЗМЕЩЕНИЕ ВАКАНСИЙ</a> &#9672; <a class='red' href=''>ОТВЕТЫ НА ВОПРОСЫ</a> &#9672; <a class='blue' href='users.php'>ПОЛЬЗОВАТЕЛИ</a> ";
	}  
elseif(($_SESSION['group_user']==0)){
	$status="представитель компании";$menu1="";
	}
	
echo "<div class='col-12 text-center main-menu pb-15 pt-15' > ".$menu1." </div>";
echo "<div class='col-xl-5 col-lg-5 col-md-12 col-sm-12 pt-15' style='border-bottom:1px solid #5174ff'><h3 class='red'>Ответы на вопросы</h3><a href='../faq.html' target='_blank'>Перейти на страницу &laquo;ВОПРОС-ОТВЕТ&raquo;</a>
</div>
<hr>
<div class='col-xl-7 col-lg-7 col-md-12 col-sm-12 pt-15' style='border-bottom:1px solid #5174ff'>На сайте находится ".$status." ".$_SESSION['surname']." ".$_SESSION['name']." ".$_SESSION['secondname'].", &nbsp;<a href='?id_company=".$id_cm."#edit_company' class='blue' title='Редактировать' >".$cm."</a><span class='f-right'><a href='?exit'>Выход  <i class='ti-arrow-right'></i></a></span>
</div>";
?>

<div class="f-left col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-25">
<h4 class="blue">Вопрос</h4>
<?php include "bd.php";
$fg="SELECT * FROM im_question ORDER BY date_question";
$fg_ex=mysql_query($fg);
$num=mysql_num_rows($fg_ex);
$j=0;
echo "<table cellpadding='10px' cellspacing='10px'>";
if ($num>0){
while($fg_res=mysql_fetch_array($fg_ex)){
if($fg_res['status']==1) {
	$z="<span class='green2' style='font-size:12px;font-weight:600'> Размещён </span>";
	} 
	else {
		$z="<span class='blue' style='font-size:12px;font-weight:600'> Требует ответа </span>";
		}
$j++;
$s="";
if ($_GET['n']==$j) 
	{$s='color:#0d47a1;font-weight:bold';}
   echo "<tr style='border-bottom:1px dashed #24a277; height:35px'><td>".$j.". <a href='?id_question=".$fg_res['id_question']."&n=".$j."&#vacedt' style=".$s.">".$fg_res['question']."</a></td><td valign='bottom' > " .$z."<a href='?id_question=".$fg_res['id_question']."#del_quest' class='red' style='font-size:12px;font-weight:600'> Удалить </a></td></tr>";
   
}
?>
</table>
</div>
<div class="f-right col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-15 mt-25" id="vacedt" >
<h4 class='blue' >Ответ </h4>
<?php 
$id_quest=$_GET['id_question'];
$fw="SELECT id_question, question, answer, DATE_FORMAT(date_question,'%d.%m.%Y') as date_q, name_company, CONCAT(surname,' ',name,' ',secondname) as fio  FROM im_question, im_company WHERE im_company.id_company=im_question.id_company AND  id_question='$id_quest' ORDER BY date_question";
$fw_ex=mysql_query($fw);
$fw_res=mysql_fetch_array($fw_ex);
echo "Отвечает ".$_SESSION['surname']." ".$_SESSION['name']." ".$_SESSION['secondname'].", ".$_SESSION ['name_company'];


echo "<input type='hidden' name='id_company' id='id_company' value='".$_SESSION['id_company']."'>";
echo '<p class="red">Новая строка SHIFT+ENTER, новый абзац - ENTER</p>
<textarea name="answ"  id="answ"  class="minussize" >'.$fw_res['answer'];
?>
</textarea>
<script>
   CKEDITOR.replace("answ");
</script>
<!-- Кнопка редактирования  вопроса-->
<?php echo '	<input type="hidden" id="num_question" value="'.$_GET['n'].'">
<input type="submit" class="btn-vac" value=" Сохранить ответ " onClick="add_answer()">';?>
<div id="save"></div>
			</div>
        </div>
   </div>
</div>

<?php /*завершение цикла*/
}
else/*если запрос не имеет результата (пустой)*/
{echo "<h4 class='green3 mb-70' >Вопросов нет.</h4>";}
?>
		</div>
	</div>
</div>
<footer>
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
		
<!--окно с запросом об удалении вопроса -->
<a href="#x" class="overlay " id="del_quest"></a>	
<div class="popup text-center mt-25" > 
	<br><h5>Вы действительно хотите<br>удалить данный вопрос? </h5><br>
	<input type="hidden" id="id_question" value=<?php echo $_GET['id_question']; ?>>
	 <br><input type="submit" value="УДАЛИТЬ" class="publish" onClick="del_quest()">
	<a  class="publish" href="#close" style="padding-top:12px;padding-bottom:12px">ОТМЕНА</a>
	 <div id="del"></div>
     <a class="close" href="#close"></a>
</div>	 

<script>
/*Удаление вопроса*/
function del_quest(){
    var id_question = $('#id_question').val();
  	var result="";
    $.ajax({
        type: "POST",
        url: "del_question.php",
        data: {fid_question:id_question}
    }).done(function( result )
        {
            $("#del").html( result );
        });
}

/*Сохранение ответа*/
function add_answer(){
    var id_question = $('#id_question').val();
	var id_company = $('#id_company').val();
	var answ = $('#answ').val();
	var num_question = $('#num_question').val();
	answ = CKEDITOR.instances.answ.getData();
  	var result="";
    $.ajax({
        type: "POST",
        url: "add_answer.php",
        data: {fid_question:id_question,fid_company:id_company,fansw:answ,fnum_question:num_question}
    }).done(function( result )
        {
            $("#save").html( result );
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
