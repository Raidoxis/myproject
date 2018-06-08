<?php
 
/* Задаем переменные */
$name = htmlspecialchars($_POST["Name"]);
$email = htmlspecialchars($_POST["Email"]);
$message = htmlspecialchars($_POST["Message"]);
 
/* моя адреса і тема пов */
$address = "forostenko.mx@gmail.com";
$sub = "Сообщение с сайта myproject.com";
 
/* Формат листа  ПОЧИТАТИ В НЕТІ!! */
$mes = "Повідомлення з сайту myproject.com.\n
Імя відправника: $name 
Электронна адреса відправника: $email

Сайт відправника: $website
Текст повідомлення:
$message";
 
 
if (empty($bezspama)) /* оцінка поля bezspama - має бути  пустим*/
{
/* відправкв повідомлення,  mail() функція */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
 header('Refresh: 3; URL=http://myproject.com/');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Email sent. You return to the main page in 3 seconds</body>';}
else {
 header('Refresh: 3; URL=http://myproject.com/');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Your letter has not been sent.Something is probably wrong. I am just learning).You return to the main page in 3 seconds</body>';}
}
exit; /* вихід без повідомлення, якщо поле bezspama заповнено спам ботами */
?>