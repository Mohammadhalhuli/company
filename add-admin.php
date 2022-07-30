<?php session_start();  
    require('inc/header.php');
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Admins</h3>
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
                        <form method="post" action="handel/admin/add.php" enctype="multipart/from-data">
                            <div class="form-group">
                              <label>id</label>
                              <input name ="id" type="number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>name</label>
                                <input name ="name" value="<?php
                                    if(isset($_SESSION['name'])){
                                        echo $_SESSION['name'];
                                        unset($_SESSION['name']);
                                    }
                                    
                                ?> "type="text" class="form-control">
                                <!--select class="form-control">
                                  <option>one</option>
                                  <option>two</option>
                                  <option>three</option>
                                </select-->
                            </div>
                            

                            <div class="form-group">
                                <label>country</label>
                                <input type="text" name ="country" class="form-control">
                            </div>

                            <!--div class="form-group">
                                <label>Pieces</label>
                                <input type="number" class="form-control">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div-->
                            
                            <div class="custom-file">
                                <input type="file"  name="img" class="custom-file-input" id="customFile">
                                <label class="custom-file-label"  for="customFile">Choose Image</label>
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
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