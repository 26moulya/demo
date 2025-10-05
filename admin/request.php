<?php
    session_start();

    if(empty($_SESSION['is_admin_login'])){
        echo "<script>location.href='index.php';</script>";
    }

    require_once '../assets/config/connection.php';
    require_once './assets/pages/admin-link.php';
    require_once './assets/pages/admin-header.php';

?>
    
        <div id="layoutSidenav">
            <?php

                require_once './assets/pages/admin-sidebar.php';
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid p-4">
                        <h3 class="mb-3">Blood Request</h1>
                        <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient Name</th>
                                            <th>Hospital</th>
                                            <th>Blood Group</th>
                                            <th>Patient gender</th>
                                            <th>Patient Age</th>
                                            <th>Reason</th>
                                            <th>Requested Date</th>
                                            <th>Requested To</th>
                                            <th>Request Status</th>
                                            <th>Approve Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $res = mysqli_query($conn, "SELECT um.user_name, br.* FROM blood_request br, user_master um WHERE um.user_id = br.receiver_id ORDER BY br.request_id DESC");
                                        if (mysqli_num_rows($res) > 0) {

                                            $count = 1;
                                            while($row = mysqli_fetch_assoc($res)) {
                                                
                                                echo "<tr>"; 
                                                echo "<th>".$count."</th>"; 
                                                echo "<td>".$row['patient_name']."</td>";
                                                echo "<td>".$row['hospital_name']."</td>";
                                                echo "<td>".$row['blood_group']."</td>";
                                                echo "<td>".$row['patient_gender']."</td>";
                                                echo "<td>".$row['patient_age']."</td>";
                                                echo "<td>".$row['request_reason']."</td>";
                                                echo "<td>".$row['request_date_create']."</td>";
                                                echo "<td>".$row['user_name']."</td>";

                                                $resStatus = mysqli_query($conn, "SELECT approved_date FROM approve_master WHERE request_id = '$row[request_id]'");
                                                if(mysqli_num_rows($resStatus)>0){

                                                    $rowStatus = mysqli_fetch_assoc($resStatus);

                                                    echo "<td>Approved</td>";
                                                    echo "<td>".date_format(date_create($rowStatus['approved_date']), 'd M Y h:i A')."</td>";
                                                } else{

                                                    echo "<td>Pending</td>";
                                                    echo "<td>N/A</td>";
                                                }
                                                echo "</tr>"; 

                                                $count++;
                                                   
                                            }
                                        }
                                    ?>
                                    </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    
<?php

    require_once './assets/pages/admin-footer.php';
?>
