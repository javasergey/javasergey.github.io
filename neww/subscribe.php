<?php 

$email = $_POST['email'];

if (mail("simracing11@mail.ru", "Заявка с сайта", "ФИО:".$fio.". E-mail: ".$email ,"From: test@localhost \r\n"))
 {     echo "сообщение успешно отправлено"; 
} else { 
    echo "при отправке сообщения возникли ошибки";
}?>


?>