<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

  require_once __DIR__ . '/../PHPMailer/src/Exception.php';
  require_once __DIR__ . '/../PHPMailer/src/PHPMailer.php';
  require_once __DIR__ . '/../PHPMailer/src/SMTP.php';
  

$mail = new PHPMailer(true);

function sendMailOrder($mail, $receiver, $content) {
    try {
        // Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thien2211334@gmail.com';                     //SMTP username
        $mail->Password   = 'kspp rswr skzy yutd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                 
                              
        $mail->CharSet = 'UTF-8';
        // Recipients
        $mail->setFrom('thien2211334@gmail.com', 'Shop-olivia Admin');
        $mail->addAddress($receiver['email'], $receiver['name']);     
      
        $mail->addReplyTo('thien2211334@gmail.com', 'Shop-olivia Admin');

        // Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Shop-olivia xác nhận đơn hàng #'.$receiver['id'];
        $mail->Body = ' <html>
                            <body>
                                <h3>Xin chào '.$receiver['name'].'</h3>
                                <p>Cảm ơn quý khách đã đặt hàng tại <a href="#">Shop-olivia Admin</a>.</p>
                                <p>Đơn hàng quý khách sẽ sớm được gửi đi sau khi nhân viên của chúng tôi hoàn tất các thủ tục.</p>
                                <div>'.$content.'</div>
                                <p>Mọi thắc mắc xin vui lòng liên hệ qua gmail: thien.cheviet1404@hcmut.edu.vn</p>
                                <p>Xin kính chúc sức khỏe và may mắn!</p>
                                <p><b style="color: blue">Shop-olivia Admin</b></p>
                            </body>
                        </html>';

        $mail->send();
        
        return true;
    } catch (Exception $e) {
        
        return false;
    }
}

function verifyEmail($mail, $receiver, $verifyCode) {
    try {
        // Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thien2211334@gmail.com';                     //SMTP username
        $mail->Password   = 'kspp rswr skzy yutd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                        
        $mail->CharSet = 'UTF-8';
        // Recipients
        $mail->setFrom('thien2211334@gmail.com', 'Shop-olivia Admin');
        $mail->addAddress($receiver['email'], $receiver['name']);     
        $mail->addReplyTo('thien2211334@gmail.com', 'Shop-olivia Admin');

        // Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Shop-olivia xác thực tài khoản tạo mới';
        $mail->Body = ' <html>
                            <body>
                                <h3>Xin chào '.$receiver['name'].'</h3>
                                <p>Thông tin tài khoản của quý khách vừa đăng ký:</p>
                                <p>Tên đăng nhập: <b style="color:blue">'.$receiver['email'].'</b></p>
                                <p>Mật khẩu: <b style="color:blue">'.$receiver['password'].'</b></p>
                                <p>Quý khách vui lòng điền mã xác thực để sử dụng tài khoản này trên Website của chúng tôi.</p>
                                <p>Mã xác thực kích hoạt tài khoản:</p>
                                <div><b>'.$verifyCode.'</b></div>
                                <p>Mọi thắc mắc xin vui lòng liên hệ qua gmail: tungnd.goat@gmail.com</p>
                                <p>Xin kính chúc sức khỏe và may mắn!</p>
                                <p><b style="color: blue">HongTraNgoGia_ADMIN</b></p>
                            </body>
                        </html>';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function resetPassword($mail, $receiver) {
    try {
        // Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thien2211334@gmail.com';                     //SMTP username
        $mail->Password   = 'kspp rswr skzy yutd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                        
        $mail->CharSet = 'UTF-8';
        // Recipients
        $mail->setFrom('thien2211334@gmail.com', 'Shop-olivia Admin');
        $mail->addAddress($receiver['email'], $receiver['name']);     
        $mail->addReplyTo('thien2211334@gmail.com', 'Shop-olivia Admin');

        // Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Shop-olivia xác thực thông tin tài khoản';
        $mail->Body = ' <html>
                            <body>
                                <h3>Xin chào '.$receiver['name'].'</h3>
                                <p>Thông tin tài khoản của bạn:</p>
                                <p>Tên đăng nhập: <b style="color:blue">'.$receiver['email'].'</b></p>
                                <p>Mật khẩu: <b style="color:blue">'.$receiver['password'].'</b></p>
                                <p>Từ giờ quý khách có thể đăng nhập lại trên Website của chúng tôi.</p>
                                <p>Mọi thắc mắc xin vui lòng liên hệ qua gmail: thien.cheviet1404@hcmut.edu.vn</p>
                                <p>Xin kính chúc sức khỏe và may mắn!</p>
                                <p><b style="color: blue">Shop-olivia-Admin</b></p>
                            </body>
                        </html>';

        $mail->send();
       
        return true;
    } catch (Exception $e) {
        
        return false;
    }
}

function sendLink2ChangePWD($mail, $receiver, $content) {
    try {
        // Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'thien2211334@gmail.com';                     //SMTP username
        $mail->Password   = 'kspp rswr skzy yutd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                        
        $mail->CharSet = 'UTF-8';
        // Recipients
        $mail->setFrom('thien2211334@gmail.com', 'Shop-olivia Admin');
        $mail->addAddress($receiver['email'], $receiver['name']);     
        $mail->addReplyTo('thien2211334@gmail.com', 'Shop-olivia Admin');

        // Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Shop-olivia gửi link thay đổi mật khẩu';
        $mail->Body = ' <html>
                            <body>
                                <h3>Xin chào '.$receiver['name'].'</h3>
                                <p>Chúng tôi vừa nhận được yêu cầu thay đổi mật khẩu cho tài khoản của bạn:</p>
                                <p>Bạn hãy Click vào đường dẫn dưới đây để có thể thay đổi mật khẩu:</p>
                                <div>'.$content.'</div>
                                <p>Mọi thắc mắc xin vui lòng liên hệ qua gmail: thien.cheviet1404@hcmut.edu.vn</p>
                                <p>Xin kính chúc sức khỏe và may mắn!</p>
                                <p><b style="color: blue">Shop-olivia Admin</b></p>
                            </body>
                        </html>';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

?>