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
        
    ?>

<section class="w3l-bottom-grids-6 py-5 mt-5">
        <div class="container pt-lg-5 pt-md-5 pt-2">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h3 class="title-style">My Requests</h3>
            </div>
            <div class="row">
                <?php
                    $res = mysqli_query($conn, "SELECT * FROM blood_request WHERE user_id = '$_SESSION[user_id]'");
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
                                        <h6 class="mt-3 mb-2 text-danger">Request Status</h6>
                                        <?php 
                                            $resStatus = mysqli_query($conn, "SELECT um.user_name, am.approved_date FROM approve_master am, user_master um WHERE um.user_id = am.user_id AND am.request_id = '$row[request_id]'");
                                            if(mysqli_num_rows($resStatus)>0){

                                                $rowStatus = mysqli_fetch_assoc($resStatus);

                                                echo "<p>Status: Approved</p>";
                                                echo "<p>Approved By: ".$rowStatus['user_name']."</p>";
                                                echo "<p>Approved On: ".date_format(date_create($rowStatus['approved_date']), 'd M Y h:i A')."</p>";
                                            } else{

                                                echo "<p>Status: Pending</p>";
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
        require_once 'assets/pages/footer.php';
    ?>
