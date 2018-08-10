<?php
 
/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$phone = htmlspecialchars($_POST["phone"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);
 
/* Ваш адрес и тема сообщения */
$address = "norapolovnikova4@gmail.com";
$sub = "Сообщение с сайта Verzus";
 
/* Формат письма */
$mes = "Сообщение с сайта Verzus.\n
Имя отправителя: $name 
Телефон отправителя: $phone
Текст сообщения:
$message";
 
 
if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо отправлено, через 5 секунд вы вернетесь на страницу XXX</body>';}
else {
 header('Refresh: 5; URL=http://biznessystem.ru');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо не отправлено, через 5 секунд вы вернетесь на страницу YYY</body>';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>