<?php session_start();
    require('conn.php');
    $id=$_POST['id'];
    $query="SELECT * FROM `city` where id=$id";
    $res=mysqli_query($conn,$query);
    $admin= mysqli_fetch_assoc($res);
    /*
     echo"<pre>";
        print_r($admin);
    echo"</pre>";
    */

         $name=htmlspecialchars(trim($_POST['name']));
         $country=htmlspecialchars(trim($_POST['country']));
        // $img=htmlspecialchars(trim($_POST['img']));
         $oldImage=$admin['img'];
        $error=[];
        if(empty($name)){
            $error="name is required";
        }elseif(is_numeric($name)){
            $error="name must be String ";
        }elseif(strlen($name)>50){
            $error="name size more than 50 ";
        }

         //img
      if ($_FILES == true && $_FILES['img']['name']){ //Check if there is a picture or not 
        $image=$_FILES['img'];
        /*
        echo"<pre>";
        print_r($image);
        echo"</pre>";
        */
        $imagename=$image['name'] ;
        $imgtempname=$image['tmp_name'];
        $size=$image['size'];
        $sizeMB=$size/(1024*1024);
        $ext=pathinfo($imagename,PATHINFO_EXTENSION);
        echo $ext;
        $NewName=uniqid().".".$ext;

        if($sizeMB>1){
            $error[]="image size more than 1MB";
        }
        elseif(!in_array(strtolower($ext),['png','jpg','jpeg','gif'])){
             $error[]="image not correct";
        }
      }
      else{
        $NewName=$oldImage;    
    }
    if(empty($error)){
        $sql="UPDATE `city` SET `c_name`='$name',`country`='$country',`img`='$NewName' WHERE  `id`=$id";
        $ruselt=mysqli_query($conn,$sql);
        if($ruselt){
            if($_FILES['img']['c_name']){
                move_uploaded_file($imgtempname,"../../uploads/$NewName");
                unlink("../../uploads/$oldImage");
            }
            $_SESSION['success']="admin update successfully";
            header('location: ../../admins.php');
        }
        else{
            $_SESSION['success']=$error;
            header('location: ../../add-admin.php');
        }
    }
        

?>