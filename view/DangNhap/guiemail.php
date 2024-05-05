
<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
include '../../dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy email từ form
    $email = $_POST["email"];

    // Truy vấn mật khẩu từ cơ sở dữ liệu
    $sql = "SELECT password FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        // Mật khẩu được tìm thấy
        $row = $result->fetch_assoc();
        $password = $row["password"];

        // Gửi email chứa mật khẩu đến người dùng
        $to = $email;
        $subject = "MY PASSWORD FOR LOGIN";
        $message = "Mật khẩu của bạn là | MY PASSWORD IS : $password";
        
        // Gọi hàm gửi email
        sendEmail($to, $subject, $message);
      
    } else {
        // Mật khẩu không được tìm thấy
        echo "Không tìm thấy thông tin với địa chỉ email này.";
    }
}
function sendEmail($to, $subject, $content) {
   
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'zantlytm@gmail.com';
        $mail->Password = 'rxaypqcmtmtxerbq';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('zantlytm@gmail.com');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $content;

        $mail->send();
        include './thongbao.php';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

