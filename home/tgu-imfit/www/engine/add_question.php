<?php 
include ('bd.php');

function clean($value = "") {/*функция для очистки данных от HTML и PHP тегов*/
   $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}

$question = $_POST['fquestion'];
$date_question=date("Y-m-d");
$status=0;
$question = clean($question);

if (!empty($question))
	{ 
		$ins="INSERT INTO `im_question` (`id_question`, `question`, `answer`, `date_question`, `status`,`id_company`) VALUES (NULL , '$question', '' , '$date_question', '$status','1')";

		mysql_query($ins);

		echo "<img src='../assets/img/icon-img/loader.gif'> <p class='green3'> Ваш вопрос получен. После проверки и получения ответа от специалиста мы опубликуем информацию на странице &laquo;ВОПРОСЫ-ОТВЕТЫ &raquo;.</font><META HTTP-EQUIV='Refresh' CONTENT='2;  URL=faq.html'></p>";
		
	}
	else
{
echo "<font color='red'>Заполните пустые поля! </font>";	
}
	

?>