<?php session_start();
	if (isset($_GET['exit'])){
		session_destroy();
		header('location:../index.html');
	}
if (empty($_SESSION ['login']))
{
			echo "ДОСТУП ЗАПРЕЩЕН. НЕОБХОДИМО АВТОРИЗИРОВАТЬСЯ.<META HTTP-EQUIV='Refresh' CONTENT='2;  URL=../enter.html'>";
}
	/*Запрет доступа для преподавателей и представителей компании*/	
if((!empty($_SESSION ['login'])) AND (($_SESSION['group_user']==0) || ($_SESSION['group_user']==1)))	
{
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
        <title>Пользователи.ТГУ Институт математики, физики и информационных технологий</title>
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
<div class="shop-area pt-15 pb-150 gray-bg">
	<div class="container">
		<div class="row">

			<?php  
if ($_SESSION['group_user']==2) {$status="администратор"; } 
	
echo "<div class='col-12 text-center main-menu pb-15 pt-15'> <a class='blue' href=''>РАЗМЕЩЕНИЕ ВАКАНСИЙ</a> &#9672;<a class='blue' href='answer.php?id_question=1&n=1'>ОТВЕТЫ НА ВОПРОСЫ</a> &#9672; <a class='red' href=''>ПОЛЬЗОВАТЕЛИ</a> 
</div>";
echo "<div class='col-xl-5 col-lg-5 col-md-12 col-sm-12 pt-15'><h3 class='red'>Пользователи</h3><a href='../index.html' target='_blank'>Перейти на Главную страницу</a>
</div>
<div class='col-xl-7 col-lg-7 col-md-12 col-sm-12 pt-15'>На сайте находится ".$status." ".$_SESSION['surname']." ".$_SESSION['name']." ".$_SESSION['secondname'].", &nbsp;<a href='?id_company=".$id_cm."#edit_company' class='blue' title='Редактировать' >".$cm."</a><span class='f-right'><a href='?exit'>Выход  <i class='ti-arrow-right'></i></a></span>
</div>";
?>
 <hr class='mb-20'>
 			<div class="col-12 mb-25">
 <table width="100%" class="mt-25 minussize" cellspacing="10" class="d-flex" >
 <?php include "bd.php";
$fg="SELECT * FROM im_company WHERE group_user<>2 ORDER BY group_user desc";
$fg_ex=mysql_query($fg);
$num=mysql_num_rows($fg_ex);
$i=0;
if ($num>0){
while($fg_res=mysql_fetch_array($fg_ex)){
	if ($fg_res['status']==1) {
		$g='background-color:#FFB2B2';$m="<span class='green2'><b>Разблокировать</b></span>"; $win='unban_user';
		}
		else{
			$g="";$m="<span class='red'><b>Заблокировать</b></span>";$win='ban_user';
		}
	if ($fg_res['group_user']==0) {
		$fnt='color:#404040';
		}
		elseif ($fg_res['group_user']==1) {
		$fnt='color:#337a61';	
		}
	$i++;
   echo "<tr style='border-bottom:1px dashed #24a277; height:35px;color:#000'><td valign='top'>".$i.". </td><td>".$fg_res['surname']."<br>".$fg_res['name']." ".$fg_res['secondname']."</td><td style='".$g.";".$fnt."'><b> ".$fg_res['name_company']."</b></td><td> ".$fg_res['phone_company']."</td><td> ".$fg_res['city']."</td><td> ".$fg_res['address']."</td><td>
   
   <a href='?id_company=".$fg_res['id_company']."&name_company=".$fg_res['name_company']."&surname=".$fg_res['surname']."&name=".$fg_res['name']."&secondname=".$fg_res['secondname']."#del_user' class='minussize'><font color='blue'><b>Удалить</b></a><br>
   
   <a href='?&id_company=".$fg_res['id_company']."&name_company=".$fg_res['name_company']."&surname=".$fg_res['surname']."&name=".$fg_res['name']."&secondname=".$fg_res['secondname']."#".$win."' class=' minussize'>".$m."</a></td></tr>";
  }

?>
 </table>

 <?php
 }else/*если запрос не имеет результата (пустой)*/
{echo "<h4 class='green3 mb-250' >Пользователи не зарегистрированы.</h4>";}
 ?>

			</div>
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

		
<!--окно с запросом о блокировке -->
<a href="#x" class="overlay " id="ban_user"></a>	
<div class="popup text-center mt-25" > 
	<br><h5>Вы действительно хотите заблокировать пользователя <br><?php echo $_GET['surname']." ".$_GET['name']." ".$_GET['secondname']; ?> &#40;<?php echo $_GET['name_company']; ?>&#41;? </h5><br>
	<input type="hidden" id="id_company" value="<?php echo $_GET['id_company']; ?>">
	 <br><input type="submit" value="ЗАБЛОКИРОВАТЬ" class="publish" onClick="ban_user()">
	 <div id="ban"></div>
     <a class="close" href="#close"></a>
</div>	

<!--окно с запросом о разблокировке -->
<a href="#x" class="overlay " id="unban_user"></a>	
<div class="popup text-center mt-25" > 
	<br><h5>Вы действительно хотите разблокировать пользователя <br><?php echo $_GET['surname']." ".$_GET['name']." ".$_GET['secondname']; ?> &#40;<?php echo $_GET['name_company']; ?>&#41;? </h5><br>
	<input type="hidden" id="id_company" value="<?php echo $_GET['id_company']; ?>">
	 <br><input type="submit" value="РАЗБЛОКИРОВАТЬ" class="publish" onClick="unban_user()">
	 <div id="unban"></div>
     <a class="close" href="#close"></a>
</div> 

<!--окно с запросом об удалении -->
<a href="#x" class="overlay " id="del_user"></a>	
<div class="popup text-center mt-25" > 
	<br><h5>Вы действительно хотите удалить пользователя <br><?php echo $_GET['surname']." ".$_GET['name']." ".$_GET['secondname']; ?> &#40;<?php echo $_GET['name_company']; ?>&#41;? </h5><br>
	<input type="hidden" id="id_company" value="<?php echo $_GET['id_company']; ?>">
	 <br><input type="submit" value="УДАЛИТЬ" class="publish" onClick="del_user()">
	 <a class="publish" href="#close" style="padding-top:12px; padding-bottom:12px;">ОТМЕНА</a>
	 <div id="del"></div>
     <a class="close" href="#close"></a>
</div>

<script>
/*Блокировка пользователя*/
function ban_user(){
    var id_company = $('#id_company').val();
  	var result="";
    $.ajax({
        type: "POST",
        url: "ban_user.php",
        data: {fid_company:id_company}
    }).done(function( result )
        {
            $("#ban").html( result );
        });
}

/*Разблокировка пользователя*/
function unban_user(){
    var id_company = $('#id_company').val();
  	var result="";
    $.ajax({
        type: "POST",
        url: "unban_user.php",
        data: {fid_company:id_company}
    }).done(function( result )
        {
            $("#unban").html( result );
        });
}

/*Удаление пользователя*/
function del_user(){
    var id_company = $('#id_company').val();
  	var result="";
    $.ajax({
        type: "POST",
        url: "del_user.php",
        data: {fid_company:id_company}
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
