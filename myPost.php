<?php 
    session_start();

    if(!$_SESSION['login']){
        header("location:index.php");
        exit;
    }
    include_once('backend/modul.php');
    if($_SESSION['idAkun'] == 1){
        $umkms = query("SELECT * FROM umkm ORDER BY created_at DESC"); 
    }else{
        $user_id =  $_SESSION['idAkun'];
        $umkms = query("SELECT * FROM umkm WHERE user_id = '$user_id' ORDER BY created_at DESC"); 
    }

    if(isset($_POST["saveData"])){
        $dir = "public/img/banner/";
    
        if(!empty($_FILES["img_banner"]["name"])){
            $str = explode('.', basename($_FILES["img_banner"]["name"]));
            $fileType = $str[1];
            $fileName = uniqid(rand()).'.'.$fileType;
            $filePath = $dir.$fileName;
    
            $allowedFile = array('jpg', 'png', 'jpeg');
            if(in_array($fileType, $allowedFile)){
                if(move_uploaded_file($_FILES["img_banner"]["tmp_name"], $filePath)){
                    $_POST["img_url"] = $fileName;
                    if(createBannerPromotion($_POST) > 0){
                        echo "
                            <script> 
                                alert('Data berhasil disimpan!!');
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
            echo "
                <script> 
                    alert('Pilih file yang ingin diupload');
                    document.location.href='mypost.php';
                </script>";
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('templates/header.php')?>
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Selamat datang kembali owner !!</h1>
            <p class="col-lg-10 fs-4">by <a target="_blank" href="https://www.ocumps.com/">GO UMKM</a></p>
            <div class="table-responsive mb-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Business Name</th>
                            <th>Owner</th>
                            <th>Web Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($umkms as $umkm) : ?>
                        <tr>
                            <th><?= $i++?></th>
                            <th><?= $umkm['business_name'] ?></th>
                            <th><?= $umkm['business_owner'] ?></th>
                            <th><?= $umkm['website'] ?></th>
                            <th>
                                <a href="updatePost.php?id=<?= $umkm['id']?>" class=""><i class="fas fa-fw fa-edit text-warning"></i></a>
                                <a href="deletePost.php?id=<?= $umkm['id']?>&filename=<?=$umkm['img_url']?>" class="" onclick="return confirm('Delete this promotion ?');"><i class="fas fa-fw fa-trash-alt text-danger"></i></a>
                            </th>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <div class="p-4 p-md-5 border rounded-3 bg-light">
                <div class="form-floating mb-3">
                    <a href="#" class="w-100 btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#postBanner">Post Banner</a>
                </div>
                <div class="form-floating mb-3">
                    <a href="logout.php" class="w-100 btn btn-lg btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal:post banner -->
    <div class="modal fade" id="postBanner" tabindex="-1" aria-labelledby="postBannerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postBannerModalLabel">Post Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?= $user_id?>">
                        <div class="row mb-3">
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name*" required>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="business_owner" name="business_owner" placeholder="Owner Name*" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="" class="col-form-label">Username : </label>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_instagram" name="url_instagram" placeholder="Instagram*" required>
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_facebook" name="url_facebook" placeholder="Facebook">
                            </div>
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="website_link" name="website_link" placeholder="Website Link" >
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-lg-3 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-dark" disabled>Store | Link</button>
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_bukalapak" name="url_bukalapak" placeholder="Bukalapak">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_shopee" name="url_shopee" placeholder="Shoppe">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_tokopedia" name="url_tokopedia" placeholder="Tokopedia">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-lg-3 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-dark" disabled>Banner Img*</button>
                            </div>
                            <div class="col-lg-9 mb-2">
                                <input class="form-control form-control-sm" id="img_banner" name="img_banner" type="file" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="saveData" name="saveData" class="btn bg-custom rounded-pill tebel-sedang shadow">Post Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<!-- Page level plugins -->
<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
</script>
</body>
</html>