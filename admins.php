<?php
    require('inc/header.php');
    require('handel/admin/conn.php');
    
   
    //$query="SELECT * FROM `city`";
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $sql="SELECT COUNT('id') AS TOTAL FROM city";
    $rus=mysqli_query($conn,$sql);
    $totalcount=mysqli_fetch_assoc($rus);
    $totalcount =$totalcount['TOTAL'];
    $limit=2;
    $offset=($page-1)*$limit;
    $numberofpage=ceil($totalcount/$limit);
    //echo $numberofpage; 
    if($page < 1 || $page >$numberofpage){
        header("location: admins.php?page=1");
    }
    $query="SELECT * FROM `city`limit $limit offset $offset";
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
                    <?php 
                      //  if($admin['role']==1):?>
                    <a href="add-admin.php" class="btn btn-success"><?=$message['addadmin']?></a>
                    <?php //endif:?>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?=$message['name']?></th>
                        <th scope="col"><?=$message['country']?></th>
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
                    <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item active <?=($PAGE==1)?'disabled':''?>">
                        <a class="page-link"  href="admins.php?page=<?=$page-1?>" tabindex="-1">Previous</a>
                        </li>
                        <?php for ($i=1; $i <=$numberofpage ; $i++) :?>
                        <li class="page-item"><a class="page-link" href="admins.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php endfor;?>
                        <li class="page-item active <?=($PAGE==$numberofpage)?'disabled':''?>">
                        <a class="page-link" href="admins.php?page=<?=$page+1?>">Next</a>
                        </li>
                    </ul>
                    </nav>
            </div>

        </div>
    </div>
    <?php
    require('inc/footer.php');
?>