<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    function sendEmail($email, $password, $name){

        require './vendor/autoload.php';

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->IsHTML(true);

        $mail->Username = 'bloodbankmanagement2023@gmail.com';
        $mail->Password = 'kmqyzwlsessgpipi';

        $mail->setFrom('bloodbankmanagement2023@gmail.com', 'Bloodbank');
        $mail->addReplyTo('bloodbankmanagement2023@gmail.com', 'Bloodbank');

        $mail->addAddress($email, $name);

        $mail->Subject = 'Reset your password - Online Blood Bank Management System';
        $mail->Body = "Dear " . $name . ",<br>We have received a request to reset your password. <br>Your password: <strong>".$password."</strong><br><br>If you didn't make the request, just ignore this message<br>Thanks,<br>Bloodbank team";

        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }         
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodbank-Forgot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <style>

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#e36262, #f50537);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
</head>
<body>
<?php
  require_once './assets/config/connection.php';

  if(isset($_POST['reset'])){
    $res = mysqli_query($conn, "SELECT lm.login_password, um.user_email_id, um.user_name FROM login_master lm, user_master um
      WHERE lm.login_email_id = um.user_email_id AND um.user_status = 1 AND um.user_email_id = '$_POST[email]' AND lm.user_type = 'User'");

      if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        if(sendEmail($row['user_email_id'], $row['login_password'], $row['user_name'])){
          echo "<script type='text/javascript'>toastr.options = {
            'positionClass': 'toast-bottom-right'
          },toastr.success('Password sent to your registered email address!')</script>";
        } else{
          echo "<script type='text/javascript'>toastr.options = {
            'positionClass': 'toast-bottom-right'
          },toastr.error('Unable to process your request!')</script>";
        }
      }else{
        echo "<script type='text/javascript'>toastr.options = {
          'positionClass': 'toast-bottom-right'
        },toastr.error('Email id does not exists!')</script>";
      }
  }
?>
<section>
  <div class="container px-4 px-md-5 text-center text-lg-start">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <img src="assets/images/login.jpg" class="img-fluid"/>
      </div>
      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="POST">
              <div class="row">
              <h1 class="display-5 fw-bold ls-tight">Forgot Password</h1>
              <div class="form-outline mt-5">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" id="form3Example3" class="form-control" name="email" required/>
              </div>
              <button type="submit" class="btn btn-primary btn-block mt-5" name="reset">
                RESET
              </button>
              <div class="text-center mt-4">
                <p>Remember your password? <a href="index.php">Login</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 
</body>
</html>