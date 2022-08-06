<?php

    require('inc/header.php');
    require('handel/admin/conn.php');
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Admin</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <?php
                                $sql="SELECT count(`id`) as counter_city FROM `city`;";
                                $rus=mysqli_query($conn,$sql);
                                $count=mysqli_fetch_assoc($rus);
                            ?>
                            <h5><?=$count['counter_city']?></h5>
                          <a href="admins.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>5</h5>
                          <a href="#" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>1120</h5>
                          <a href="#" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    require('inc/footer.php');
?>