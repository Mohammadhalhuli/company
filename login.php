<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>company | Dashboard</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
</head>
<body>
    

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Login</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <ul>
                        <?php
                                    if(isset($_SESSION['errorr'])):
                                        foreach((array)$_SESSION['errorr'] as $err):
                                            echo "<p style='font-size: 30px; color: red;'>$err</p>";
                                        endforeach;
                                    endif;
                                    unset($_SESSION['errorr']);
                                ?>
                        </ul>
                        <form action="handel/login.php" method="post">
                            <div class="form-group">
                              <label>id</label>
                              <input type="number" name="id" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>name</label>
                              <input type="name" name="name" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
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