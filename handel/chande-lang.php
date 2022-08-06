<?php session_start();

  if(isset($_GET['lang'])){
    if($_GET['lang']=='ar'){
        $_SESSION['lang']='ar';
    }
    elseif($_GET['lang']=='en'){
        $_SESSION['lang']='en';
    }
  } else{
    $_SESSION['lang']='en';
  } 
  header("location: ".$_SERVER['HTTP_REFERER']);//ليتمكن من العودة على مكان الصفحة الذي كان بها 
  /*
  echo"<pre>";
  print_r($_SERVER);
  echo"</pre>";
  */
?>