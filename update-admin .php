<?php 
    require('inc/header.php');
    require('handel/admin/conn.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        //echo $id;
        $sql="SELECT * FROM `city` where id=$id";
        $rus=mysqli_query($conn,$sql);
        $admin=mysqli_fetch_assoc($rus);
        /*echo"<pre>";
        print_r($admin);
        echo"</pre>";
        */
    }
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">UPDATE Admins</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <?php
                            if(isset($_SESSION['error'])):
                                foreach((array)$_SESSION['error'] as $err):
                                    echo "<p style='font-size: 30px; color: red;'>$err</p>";
                                endforeach;
                            endif;
                            unset($_SESSION['error']);
                        ?>
                        <form method="post" action="handel/admin/update.php" enctype="multipart/from-data">
                            <input type="hidden" value="<?=$admin['id']?>" name="id">
                            <!--div class="form-group">
                              <label>id</label>
                              <input name ="id" type="number" class="form-control">
                            </div-->

                            <div class="form-group">
                                <label>name</label>
                                <input name ="name" type="text" class="form-control" value="<?=$admin['c_name']?>">
                                <!--select class="form-control">
                                  <option>one</option>
                                  <option>two</option>
                                  <option>three</option>
                                </select-->
                            </div>
                            

                            <div class="form-group">
                                <label>country</label>
                                <input type="text" name ="country" class="form-control" value="<?=$admin['country']?>">
                            </div>

                            <!--div class="form-group">
                                <label>Pieces</label>
                                <input type="number" class="form-control">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div-->
                            <div class="form-group">
                                <h1>sv</h1>
                                <!-- <=$admin['img']?> -->
                                <img src="uploade/default.png" alt="" class="w-100">
                            </div>
                            <div class="custom-file">
                                <input type="file"  name="img" class="custom-file-input" id="customFile">
                                <label class="custom-file-label"  for="customFile">Choose Image</label>
                            </div>
                            
                              
                            <div class="text-center mt-5">
                                <button type="submit" name ="submit" class="btn btn-primary">UPDATE</button>
                                <a class="btn btn-dark" href="#">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    require('inc/footer.php');
?>