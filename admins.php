<?php
    require('inc/header.php');
    require('handel/admin/conn.php');
    
   
    $query="SELECT * FROM `city`";
    $result= mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $admin=mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else {
        $msg="no data";
    }
?>

<?php

?>
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                    <br>
                    <p><?php
                        if(isset($_SESSION['success'])):
                            foreach((array)$_SESSION['success'] as $su):
                                echo $su;
                            endforeach;
                        endif;
                        unset($_SESSION['success']);
                    ?></p>
                    <a href="add-admin.php" class="btn btn-success"> Add admin</a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">country</th>
                        <!--th scope="col">Actions</th-->
                      </tr>
                    </thead>
                    <tbody>

                        <?php
                        if(!empty($admin)): 
                        foreach ($admin as $admin_s):?>
                      <tr>
                        <th scope="row"><?=$admin_s['id']?></th>
                        <td><?=$admin_s['c_name']?></td>
                        <td><?=$admin_s['country']?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="update-admin .php?id=<?=$admin_s['id']?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="handel/admin/delete.php?id=<?=$admin_s['id']?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php
                      endforeach;
                        else:
                        echo $msg;
                      endif;

                      mysqli_close($conn);
                     
                      ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php
    require('inc/footer.php');
?>