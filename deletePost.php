<?php
    session_start();

    if(!$_SESSION['login']){
        header("location:index.php");
        exit;
    }
    
    include_once('backend/modul.php');

    if(isset($_GET['id'])){
        $idPost = $_GET['id'];
        $filename = $_GET['filename'];

        if(deleteBannerPromotion($idPost, $filename) > 0){
            echo "
                <script>
                    alert('Data Berhasil dihapus');
                    document.location.href = 'myPost.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data Gagal dihapus');
                    document.location.href = 'myPost.php';
                </script>
            ";
        }
    }else{
        echo "<script>alert('Eror 403 : You Dont Have Access To This Page !!')</script>";
    }