<?php
session_start();
require('conn.php');
    if(isset($_GET['id'])){
        $id=(int)$_GET['id'];
        $qurey="SELECT * FROM `city` WHERE id=$id";
        $result1=mysqli_query($conn,$qurey);
        if(mysqli_num_rows($result1)==1){
            //unlink()//delete in file
           /* $admin=mysqli_fetch_assoc($result);
            $img=$admin['img'];
            unlink('\'../../uploade/$img');*/
              
        $sql="DELETE FROM `city` WHERE id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
            $_SESSION['success']="admin deleted successfully";
            header('location: ../../admins.php');
        }
        else{
            echo "error";
        }
    }else{
        $_SESSION['success']="no data found";
        header('location: ../../admins.php');
    }
    }else{
        header('location: ../../admins.php');
    }

?>