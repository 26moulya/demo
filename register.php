<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodbank-Register</title>
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

  if(isset($_POST['login'])){

    if($_POST['password'] == $_POST['confirm']){

      $res = mysqli_query($conn, "SELECT user_id FROM user_master WHERE user_email_id = '$_POST[email]' AND user_status = 1");

      if(mysqli_num_rows($res)>0){

        echo "<script type='text/javascript'>toastr.options = {
          'positionClass': 'toast-bottom-right'
        },toastr.error('Email id already exists!')</script>";
      } else{

        if(mysqli_query($conn, "INSERT INTO user_master (user_name, user_email_id, user_gender, user_address, 
            user_status, user_date_create, user_blood_group, user_phone_number, user_age, user_city) VALUES ('$_POST[name]', 
            '$_POST[email]', '$_POST[gender]', '$_POST[address]', 1, NOW(), '$_POST[blood]', '$_POST[phone]', '$_POST[age]', '$_POST[city]')")){

          if(mysqli_query($conn, "INSERT INTO login_master (login_email_id, login_password, login_date_create, user_type) VALUES (
              '$_POST[email]', '$_POST[password]', NOW(), 'User')")){

            echo "<script type='text/javascript'>toastr.options = {
              'positionClass': 'toast-bottom-right'
            },toastr.success('User registered successfully!')</script>";
          }  else{

            echo "<script type='text/javascript'>toastr.options = {
              'positionClass': 'toast-bottom-right'
            },toastr.error('Unable to process your request!')</script>";
          }
        }else{

          echo "<script type='text/javascript'>toastr.options = {
            'positionClass': 'toast-bottom-right'
          },toastr.error('Unable to process your request!')</script>";
        }
      }
    } else{

      echo "<script type='text/javascript'>toastr.options = {
        'positionClass': 'toast-bottom-right'
      },toastr.error('Password does not match!')</script>";
    }

  }

?>

<section>
  <div class="container px-4 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-5 mb-5 mb-lg-0" style="z-index: 10">
        <img src="assets/images/login.jpg" class="img-fluid"/>
      </div>
      <div class="col-lg-7 mb-5 mb-lg-0 position-relative">
        <!-- <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div> -->
        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="POST">
              <div class="row">
              <h1 class="display-5 fw-bold ls-tight">Register</h1>
                <div class="col-md-7 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" required pattern="^([A-Za-z]+[ ]?|[A-Za-z])+$" title="Only alphabets and space are allowed."/>
                  </div>
                </div>
                <div class="col-md-5 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" required name="phone" pattern="[0-9]{10}" title="Accept 10 digit numbers only."/>
                  </div>
                </div>
                <div class="col-md-7 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" required title="Please enter valid email addreess."/>
                  </div>
                </div>
                <div class="col-md-5 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Age</label>
                    <input type="number" class="form-control" name="age" required min="18" max="100"/>
                  </div>
                </div>
                <div class="col-md-7 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" required value="Male" title="Please select an option.">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" required value="Female" title="Please select an option.">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Blood Group</label>
                    <select class="form-select" aria-label="Blood group" required name="blood">
                      <option selected value="">Choose</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                    </select>
                  </div>
                </div>
              <div class="col-md-8 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" required></textarea>
                  </div>
              </div>
              <div class="col-md-4 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Area</label>
                    <input type="text" class="form-control" name="city" required/>
                  </div>
                </div>
              <div class="col-md-7 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                  </div>
                </div>
                <div class="col-md-5 mt-3">
                  <div class="form-outline">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm" required/>
                  </div>
                </div>
              <button type="submit" class="btn btn-primary btn-block mt-4" name="login">
                REGISTER
              </button>
              <div class="text-center mt-4">
                <p>Already have an account? <a href="index.php">Login</a></p>
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