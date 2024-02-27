<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer\src\Exception.php';
require_once 'PHPMailer\src\PHPMailer.php';
require_once 'PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $guest = $_POST['guest'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'colatlin@gmail.com';
        $mail->Password = 'mywkfgoflcoltkmn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->setFrom('colatlin@gmail.com');
        $mail->addAddress('colatlin@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Booking Recieved:'. $name;
        $mail->Body = "Name: $name <br> Phone: $phone <br> Email: $email <br> Number of guest: $guest<br> Date: $date<br> Time: $time <br> Message $message";


        $mail->send();
        $alert = "<div class='alert-success'><span>Booking Made</span></div>";
        header('Location: index.php');
    }catch(Exception $e){
        $alert = "<div class='alert-error'><span>.$e->getMessage().'</span></div>";
    };
};
?>