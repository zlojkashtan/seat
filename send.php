<?php

use PHPMailer\PHPMailer\PHPMailer;

require './src/PHPMailer.php';
require './src/SMTP.php';
require './src/Exception.php';


if(isset($_POST['f_auto'], $_POST['f_dealer'], $_POST['f_name'], $_POST['f_phone'])){

  $fields = array(
    'auto'=>$_POST['f_auto'],
    'dealer'=>$_POST['f_dealer'],
    'name'=>$_POST['f_name'],
    'phone'=> $_POST['f_phone']
    );

  $mail = new PHPMailer;

  $mail->isSMTP();                                  // Set mailer to use SMTP
  $mail->Host       = 'smtp.gmail.com';             // Specify main and backup SMTP servers
  $mail->SMTPAuth   = true;                         // Enable SMTP authentication
  $mail->Username   = 'zlojkashtan@gmail.com';      // SMTP username
  $mail->Password   = 'secret';                     // SMTP password
  $mail->SMTPSecure = 'tls';                        // Enable TLS encryption, `ssl` also accepted
  $mail->Port       = 465;

  $mail->setFrom('from@example.com', 'Mailer');         // Отправитель
  $mail->addReplyTo('info@example.com', 'Information'); // Ответ
  $mail->addAddress('zlojkashtan@gmail.com', 'Joe User');     // Получатель

  $mail->isHTML();
  $mail->Subject = 'Заявка на тестдрайв';
  $mail->Body = '<p>' . $fields['auto'] . '</p>'.'<p>' . $fields['deler'] . '</p>'.'<p>' . $fields['name'] . '</p>'.'<p>' . $fields['phone'] . '</p>';


  if ($mail->send()) {
    echo "ok";
  } else {
    echo "error";
  }

} else {
  echo "error";
}
