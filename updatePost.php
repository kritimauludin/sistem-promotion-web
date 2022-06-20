<?php
    session_start();

    if(!$_SESSION['login']){
        header("location:index.php");
        exit;
    }

    include_once('backend/modul.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = query("SELECT * FROM umkm WHERE id = $id");

    if(isset($_POST["saveData"])){
        $dir = "public/img/banner/";
    
        if(!empty($_FILES["img_banner"]["name"]) && $_FILES["img_banner"]["name"] != $_POST['oldImage']){
            $str = explode('.', basename($_FILES["img_banner"]["name"]));
            $fileType = $str[1];
            $fileName = uniqid(rand()).'.'.$fileType;
            $filePath = $dir.$fileName;
            $oldImage = $dir.$_POST['oldImage'];
    
            $allowedFile = array('jpg', 'png', 'jpeg');
            if(in_array($fileType, $allowedFile)){
                if(move_uploaded_file($_FILES["img_banner"]["tmp_name"], $filePath)){
                    $_POST["img_url"] = $fileName;
                    if(updateBannerPromotion($_POST) > 0){
                        unlink($oldImage);
                        echo "
                            <script> 
                                alert('Data berhasil diubah!!');
                                document.location.href='mypost.php';
                            </script>";
                    }else{
                        unlink($filePath);
                        echo "
                            <script> 
                                alert('Data gagal upload, Coba upload ulang');
                                document.location.href='mypost.php';
                            </script>";
                    }
                }else{
                    echo "
                            <script> 
                                alert('File gagal diupload, Coba refresh halaman dan upload ulang');
                                document.location.href='mypost.php';
                            </script>";
                }
            }else{
                echo "
                            <script> 
                                alert('Hanya file jpg, png dan jpeg yang diizinkan!!');
                                document.location.href='mypost.php';
                            </script>";
            }
        }else{
            $_POST['img_url'] = $_POST['oldImage'];
            if(updateBannerPromotion($_POST) > 0){
                echo "
                    <script> 
                        alert('Data berhasil diubah!!');
                        document.location.href='mypost.php';
                    </script>";
            }else{
                echo "
                    <script> 
                        alert('Data gagal upload, Coba upload ulang');
                        document.location.href='mypost.php';
                    </script>";
            }
        }
    
    }

?>

<?php include_once('templates/header.php');?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
                <div class="modal-header">
                    <h5 class="modal-title" id="postBannerModalLabel">Update Promotion</h5>
                </div>
                <div class="modal-body m-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$data[0]['id']?>">
                        <div class="row mb-3">
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name*" value="<?=$data[0]['business_name']?>" required>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="business_owner" name="business_owner" placeholder="Owner Name*" required value="<?= $data[0]['business_owner']?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="" class="col-form-label">Username : </label>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_instagram" name="url_instagram" placeholder="Instagram*" required value="<?=$data[0]['instagram']?>">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_facebook" name="url_facebook" placeholder="Facebook" value="<?=$data[0]['facebook']?>">
                            </div>
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="website_link" name="website_link" placeholder="Website Link" value="<?=$data[0]['website']?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-lg-3 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-dark" disabled>Store | Link</button>
                            </div>
                            <div class="col-lg-5 mb-2">
                                <input type="text" class="form-control" id="url_shopee" name="url_shopee" placeholder="Shoppe" value="<?=$data[0]['shopee']?>">
                            </div>
                            <div class="col-lg-4 mb-2">
                                <input type="text" class="form-control" id="url_tokopedia" name="url_tokopedia" placeholder="Tokopedia" value="<?=$data[0]['tokopedia']?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <p class="text-danger text-xs">Upload ulang banner, jika ingin merubah banner sebelumnya!!</p>
                            <div class="col-lg-3 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-dark" disabled>Banner Img*</button>
                            </div>
                            <div class="col-lg-9 mb-2">
                                <input class="form-control form-control-sm" id="img_banner" name="img_banner" type="file">
                                <input type="hidden" name="oldImage" value="<?=$data[0]['img_url']?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="saveData" name="saveData" class="btn bg-custom rounded-pill tebel-sedang shadow">Update Now</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<?php
}else{
        echo "<script>alert('Eror 403 : You Dont Have Access To This Page !!'); document.location.href = 'mypost.php'</script>";

}
?>