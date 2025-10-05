<?php
  session_start();

  require_once './assets/config/connection.php';

  if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] == false){

    echo "<script>location.href='index.php'</script>";
  }

  require_once 'assets/pages/link.php';
  
?>
<body>
    <?php
        require_once 'assets/pages/header.php';
        require_once 'assets/pages/slider.php';

        if(isset($_POST['approve'])){
    
            if(mysqli_query($conn, "INSERT INTO approve_master (user_id, request_id, approved_date) VALUES ('$_SESSION[user_id]', '$_POST[request]', NOW())")){
        
                echo "<script type='text/javascript'>toastr.options = {
                    'positionClass': 'toast-bottom-right'
                  },toastr.success('Blood requested approved successfully!')</script>";
            } else{
        
                echo "<script type='text/javascript'>toastr.options = {
                    'positionClass': 'toast-bottom-right'
                  },toastr.error('Unable to process your request!')</script>";
            }
        }
    ?>

    <section class="w3l-bottom-grids-6 py-5">
        <div class="container pt-lg-5 pt-md-4 pt-2">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h5 class="sub-title">Request</h5>
                <h3 class="title-style">Blood Donation Requests</h3>
            </div>
            <div class="row">
                <?php
                    $res = mysqli_query($conn, "SELECT * FROM blood_request WHERE receiver_id = '$_SESSION[user_id]'");
                    if(mysqli_num_rows($res)>0){

                        while($row = mysqli_fetch_assoc($res)){
                            ?>
                                <div class="col-lg-4 col-md-6 mb-lg-4">
                                    <div class="area-box h-100">
                                        <p class="mt-2">Patient Name: <?php echo $row['patient_name'];?></p>
                                        <p class="mt-1">Hospital: <?php echo $row['hospital_name'];?></p>
                                        <p class="mt-1">Blood Group: <?php echo $row['blood_group'];?></p>
                                        <p class="mt-1">Gender: <?php echo $row['patient_gender'];?></p>
                                        <p class="mt-1">Age: <?php echo $row['patient_age'];?></p>
                                        <p class="mt-1">Reason: <?php echo $row['request_reason'];?></p>
                                        <p class="mt-1">Date: <?php echo date_format(date_create($row['request_date_create']), 'd M Y h:i A');?></p>
                                    
                                        <?php 
                                            $resStatus = mysqli_query($conn, "SELECT * FROM approve_master WHERE user_id = '$_SESSION[user_id]' AND request_id = '$row[request_id]'");
                                            if(mysqli_num_rows($resStatus)>0){
                                                ?>
                                                <div class="text-center">
                                                    <button class="btn btn-style mt-4 disabled">Approved</button>
                                                </div>
                                            <?php
                                            } else{

                                                ?>
                                                <div class="text-center">
                                                    <form method="POST">
                                                        <input type="hidden" name="request" value="<?php echo $row['request_id'];?>"/>
                                                        <button class="btn btn-style mt-4" name="approve">Approve Now</button>
                                                    </form>
                                                </div>
                                            <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php
                        }
                    } else{
                        echo "<h4 class='title-head'>Oops, No requests found!</h4>";
                    }
                ?>
                
            </div>
        </div>
    </section>
    
   
    <?php
        require_once 'assets/pages/helpline.php';
        require_once 'assets/pages/footer.php';
    ?>
