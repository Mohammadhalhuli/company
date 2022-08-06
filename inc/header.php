<?php session_start();  
  require('handel/admin/conn.php');

  /*
  if(!isset($_SESSION['adminId'])){
    header("location: handel/login.php");
  }
  
     $id=$_SESSION['adminId'];
     $sql="SELECT * FROM city WHERE id=$id";
     $rus=mysqli_query($conn,$sql);
     $admin=mysqli_fetch_assoc($rus);
     */
    $loge='en';
    if($_SESSION['lang']){
      $loge=$_SESSION['lang'];
    }

    if($loge=='en')
      require_once 'meesage_en.php';
    else
      require_once 'meesage_ar.php';
?>
<!DOCTYPE html>
<html lang="<?=$lang;?>"dir="<?=($lang=='en')?'ltr':'rtl'?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company | Dashboard</title>
    <?php if($loge =='en'):?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <?php else :?><!-- https://cssjanus.github.io/                         convert ltr to rtl css-->
      <link rel="stylesheet" href="assets/css/style.css">
       <?php endif;?>
    <link rel="stylesheet" href="assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><?=$message['dash']?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="#"><?=$message['Products']?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./admins.php">Admins</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <!--?=$admin['name']?-->
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Profile</a>
                      <a class="dropdown-item" href="handdel/logout.php">Logout</a>
                    </div>
                </li>
                <li>
                  <a class="nav-link" href="handel/chande-lang.php?lang=en">En</a>
                </li>
                <li>
                  <a class="nav-link" href="handel/chande-lang.php?lang=ar">Ar</a>
                </li>
            </ul>
        </div>
    </nav>  