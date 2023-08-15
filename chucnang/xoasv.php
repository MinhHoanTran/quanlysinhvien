<?php
    $link = mysqli_connect('localhost','root', '', 'webquanly');
     mysqli_query($link, "SET NAMES 'UTF8'");
						
     if(isset($_GET['id'])){
        $idSV = $_GET['id'];
    
        $query = "DELETE FROM sinhvien WHERE MSV='$idSV'";
        mysqli_query($link,$query);

        $query = "DELETE FROM diemthi WHERE MSV='$idSV'";
        mysqli_query($link,$query);

        $query = "DELETE FROM userlogin WHERE MSV='$idSV'";
        mysqli_query($link,$query);
        header('location:../sinhvien.php');
                            }
?>