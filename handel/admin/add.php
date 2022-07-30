<?php session_start();
    require('conn.php');
    if(isset($_POST['submit'])){
         $id=htmlspecialchars(trim($_POST['id']));
         $name=htmlspecialchars(trim($_POST['name']));
         $country=htmlspecialchars(trim($_POST['country']));
         $img=htmlspecialchars(trim($_POST['img']));
        $error=[];
        if(empty($name)){
            $error="name is required";
        }elseif(is_numeric($name)){
            $error="name must be String ";
        }elseif(strlen($name)>50){
            $error="name size more than 50 ";
        }


        //email
        /*
        if(empty($email)){
              $error="name is required";
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error="name must be String ";
        }elseif(strlen($email)>50){
            $error="name size more than 50 ";
        }
        */
        //password
        /*** search in google ---> password php validation */
        /*
        if(empty($password)){
            $error="name is required";
      }elseif(!filter_var($password,FILTER_VALIDATE_EMAIL)){
          $error="name must be String ";
      }elseif(strlen($password )>50){
          $error="name size more than 50 ";
      }
      */


      //img
      if ($_FILES == true && $_FILES['img']['name']){ //Check if there is a picture or not 
        $image=$_FILES['img'];
        /*
        echo"<pre>";
        print_r($image);
        echo"</pre>";
        */
        $imagename=$image['name'];
        $imgtempname=$image['tmp_name'];
        $size=$image['size'];
        $sizeMB=$size/(1024*1024);
        $ext=pathinfo($imagename,PATHINFO_EXTENSION);
        $NewName=uniqid().".".$ext;

        if($sizeMB>1){
            $error[]="image size more than 1MB";
        }
        elseif(!in_array(strtolower($ext),['png','jpg','jpeg','gif'])){
             $error[]="image not correct";
        }
        else{
            $NewName="default.png";    
        }
      }
      else{
        // no image
      }

        if(empty($error)){
           $query="INSERT INTO `city`(`id`, `c_name`, `country`, `img`) VALUES ('$id','$name','$country','$img')";
           $rus=mysqli_query($conn,$query);
           if($rus){
            if($_FILES['img']['name']){
                move_uploaded_file($imgtempname,"../../uploads/$NewName");
            }
            $_SESSION['success']="admin added successfully";
            header('location: ../../admins.php');
           }
        }else{
            /*
            foreach((array)$error as $err){
                echo $err;
            }*/
            $_SESSION['error']=$error;
            $_SESSION['name']=$name;
            header('location: ../../add-admins.php');
        }


    }else{
        header('location: ../../admins.php');
    }
?>