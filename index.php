<?php
// memasukan file modul.php ke index
include_once('backend/modul.php');


// query untuk menampilkan data umkm
$umkms = query("SELECT * FROM umkm ORDER BY created_at DESC");


?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <!-- memasukan file header.php ke index -->
    <?php include_once('templates/header.php') ?>
</head>

<body>

    <!-- memasukan navbar ke index -->
    <?php include_once('templates/navbar.php'); ?>
    <!-- konten -->

    <div class="container">
        

        <br><br><br>

        <div class="row mt-5 mb-5">

            <div class="col-lg-12 gambar">
                <img src="public/assets/vector-konten.png" width="100%">
            </div>

            <div class="col-sm-12 position-relative p-4">

                <div class="position-absolute top-0 end-0">
                    <img src="public/assets/vector-konten.png" class="img">
                </div>

                <h1 class="display-1 text-truncate tebel-sedang">UMKM free</h1>
                <h1 class="display-1 text-truncate tebel-sedang">promotion</h1>

                <div class="desc mt-4">
                    <p>GO UMKM merupakan website yang mempromosikan UMKM secara gratis,
                        Hal ini dilakukan demi kemajuan dunia industri diindonesia.
                    </p>
                </div>

                <div class="mt-5">
                    <a href="#" class="button rounded-pill shadow tebel-sedang" data-bs-toggle="modal" data-bs-target="#loginModal">Post Banner</a>
                </div>

                <br>
            </div>
        </div>
        <br>
    </div>

<!-- batas bagian opang -->

<!-- mulai bagian naufal-->
    <div class="container-fluid">
        <div class="row mt-5 mb-2">
            <div class="col-lg-12">
                <hr>
                <h1 class="text-truncate tebel-sedang mt-3 text-center mb-3" id="umkm">All Promotion</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div id="gallery">
                <?php $i=0;?>
                <?php foreach ($umkms as $umkm) : ?>
                    <img data-src="public/img/banner/<?= $umkm['img_url'] ?>" data-id="<?=$i++?>" class="img-responsive lazy">
                <?php endforeach; ?>
            </div>
        </div>
    </div>



    <!--Modal: image zoom-->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Body-->
                <div class="modal-detail-body mb-0 p-0">
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">

                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <span class="mr-4">Kunjungi UMKM Di</span>
                    <p>
                        <a class="btn btn-outline-primary btn-rounded btn-sm ml-4" data-bs-toggle="collapse" href="#" id="btnCollaps" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Klik Disini
                        </a>
                    </p>
                    <?php $i=0;?>
                    <?php foreach ($umkms as $umkm) : ?>                        
                        <div class="collapse" id="collapse<?=$i++?>">
                            <div class="card card-body">
                                Shopee : <?=$umkm['shopee']?>, Tokopedia : <?=$umkm['tokopedia']?>, 
                                Instagram : <?=$umkm['instagram']?>, Facebook : <?=$umkm['facebook']?>,
                                Website : <?=$umkm['website']?>.
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <button type="button" class="btn btn-outline-danger btn-rounded btn-sm ml-4 " data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal login-->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="checkAccount.php" method="POST">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 p-2">
                            <input type="text" name="username" class="form-control mb-2" placeholder="Username">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="text-center">
                            <p>Tidak memiliki Akun ? <a href="register.php" class="text-decoration-none">daftar</a></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="buttonLogin" class="btn btn-outline-primary btn-sm">Login</button>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancle</button>
                </div>
            </form>
            </div>
        </div>
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script src="public/assets/js/script.js"></script>
    <script src="public/assets/js/onscroll.js"></script>
    <script type="text/javascript">
        $("img").click(function() {
            var t = $(this).attr("src");
            var index = $(this).attr('data-id');
            window.history.replaceState(null, null, "?id="+index+"");
            document.getElementById("btnCollaps").href = "#collapse"+index; 
            $('#index').append(index);
            $(".modal-detail-body").html("<img src='" + t + "' class='modal-img'>");
            $("#modal1").modal("show");
        });
    </script>


</body>

</html>