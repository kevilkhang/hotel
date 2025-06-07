<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_email($mail_khachhang, $noi_dung, $ten_khachhang)
{
    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = 'utf-8';
        $mail->SMTPDebug = 0; // 0: Tắt thông báo gỡ lỗi, 2: Hiển thị chi tiết lỗi
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tranvanhoa2341@gmail.com';
        $mail->Password = 'Hoa123456@';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        //Recipients
        $mail->setFrom('tranvanhoa2341@gmail.com', 'RamBoHotel');
        $mail->addAddress($mail_khachhang, $ten_khachhang);
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Quên Mật Khẩu';
        $mail->Body = nl2br($noi_dung);
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
