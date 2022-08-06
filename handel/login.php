<?php
require('admin/conn.php');
if(isset($_POST['login'])){
    $id=htmlspecialchars(trim($_POST['id']));
    $name=htmlspecialchars(trim($_POST['name']));
    //echo $id.$name;
    $error=[];
        if(empty($name)){
            $error="name is required";
        }elseif(is_numeric($name)){
            $error="name must be String ";
        }elseif(strlen($name)>50){
            $error="name size more than 50 ";
        }
    
        if(empty($error)){
            $sql="SELECT * FROM `city` WHERE `c_name`=$name";
            $rus=mysqli_query($conn,$sql);
             if(mysqli_num_rows($rus)>0){
                //$admin=mysqli_fetch_assoc($rus);
                //
            
                $adminpass=$admin['password'];
                if(password_verify($password,$adminpass)){
                    header("location: ../admins.php");
                }else{
                    $_SESSION['errorr']=['plz enter password'];
                    header("location: ../login.php");
                }
                // اذا في رقم سر مشفر
                
                //$_SESSION['adminId']=$admin['id'];
                header("location: ../admins.php");
            }else{
                $_SESSION['errorr']="OOops enter correct name";
               header("location: ../login.php");
            }
        
        }else{
            $_SESSION['errorr']=$error;
            header("location: ../login.php");
        }
}else{
    header("location: ../login.php");
}

?>