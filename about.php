<?php
  session_start();

  require_once './assets/config/connection.php';

  if(!isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == false){

    echo "<script>location.href='login.php'</script>";
  }
  
  require_once 'assets/pages/link.php';
?>

<body>
    <?php
        require_once 'assets/pages/header.php';
    ?>

<section class="w3l-about-2 py-5 mt-5">
        <div class="container py-lg-5 py-md-5 py-2">
            <div class="row justify-content-between align-items-center pb-lg-5">
                <div class="col-lg-6 about-2-secs-right mb-lg-0 mb-5">
                    <div class="image-box inverse position-relative">
                        <div class="image-box__static">
                            <img src="assets/images/about1.jpg" alt="" width="364" height="459">
                        </div>
                        <div class="image-box__float">
                            <img src="assets/images/about2.jpg" alt="" width="364" height="459">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 about-2-secs-left ps-lg-5 mt-lg-4 mt-5">
                    <h5 class="sub-title">About Blood Bank</h5>
                    <h3 class="title-style">Online Blood Bank Management System</h3>
                    <p class="mt-4">   blood  bank is a centre where blood gathered as a result donation 
                        is stored and preserved for later   use </p>
                </div>
            </div>
        </div>
    </section>
    
   
    <?php
        require_once 'assets/pages/helpline.php';
        require_once 'assets/pages/footer.php';
    ?>
