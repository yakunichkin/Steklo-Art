<?php

$recipient = "d.yakunichkin@gmail.com";
$author = $_POST['author'];
$email = $_POST['email'];
$title = $_POST['title'];
$mess = $_POST['message'];

if (isset($_POST['email'])) {	
	if (preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,})', $_POST['email'])) {
		$msg = 'E-mail адрес введен верно';
	} else {
		$msg = 'Некорректный E-mail!';
	}

  $ip = getenv('REMOTE_ADDR');
  $host = gethostbyaddr($ip);	
  $message .= "Это письмо было отправлено с вашего сайта!\n\n";
  $message .= "Имя отправителя: ".$author."\n";
  $message .= "E-mail: ".$email."\n";
  $message .= "Тема письма: ".$title."\n";
  $message .= "Сообщение: \n".$mess."\n\n";
  $message .= "IP:".$ip."\n HOST: ".$host."\n";
  
  $headers .= "From: <".$email.">\r\n"; 

  $sent = mail($recipient, $title, $message, $headers); 
  

$text = "Благодарим, что вы обратились к нам!";
	
echo '<xml>	<someText>'.$text.'</someText> </xml>';

} else {
	die('Неверный ввод данных!');
}


?>