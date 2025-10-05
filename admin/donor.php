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
                        <h3 class="mb-3">Our Donor</h1>
                        <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Donor Name</th>
                                            <th>Mobile No</th>
                                            <th>Email Id</th>
                                            <th>City</th>
                                            <th>Gender</th>
                                            <th>Aget</th>
                                            <th>Address</th>
                                            <th>Blood Group</th>
                                            <th>Status</th>
                                            <th>Date Create</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $res = mysqli_query($conn, "SELECT * FROM user_master");
                                        if (mysqli_num_rows($res) > 0) {

                                            $count = 1;
                                            while($row = mysqli_fetch_assoc($res)) {
                                                
                                                echo "<tr>"; 
                                                echo "<th>".$count."</th>"; 
                                                echo "<td>".$row['user_name']."</td>";
                                                echo "<td>".$row['user_phone_number']."</td>";
                                                echo "<td>".$row['user_email_id']."</td>";
                                                echo "<td>".$row['user_city']."</td>";
                                                echo "<td>".$row['user_gender']."</td>";
                                                echo "<td>".$row['user_age']."</td>";
                                                echo "<td>".$row['user_address']."</td>";
                                                echo "<td>".$row['user_blood_group']."</td>";
                                                echo "<td>";
                                                if($row['user_status']){
                                                    echo 'Active';
                                                }else{
                                                    echo 'In-Active';
                                                }
                                                echo "</td>";
                                                echo "<td>".date_format(date_create($row['user_date_create']), 'd M, Y') . "</td>"; 
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
