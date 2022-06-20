<?php 
    include_once('backend/modul.php');

    if(isset($_POST["saveAccount"])){
        if(createAccount($_POST) > 0){
            echo "<script>alert('Akun berhasil dibuat!!'); document.location.href = 'index.php'</script>";
        }else{
            echo "<script>alert('Gagal Membuat akun!!'); document.location.href = 'register.php'</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- memasukan file header.php ke file register -->
    <?php include_once('templates/header.php'); ?>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <div class="p-4 p-md-5 border rounded-3 bg-light">
                    <form action="" method="POST">
                        <div class="text-center h3">Register Account</div>
                        <div class="mb-3 p-2">
                            <input type="text" name="username" class="form-control mb-2" placeholder="Username">
                            <input type="password" name="password" class="form-control mb-2" placeholder="Password">
                            <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                        </div>            
                        <button type="submit" name="saveAccount" class="btn btn-outline-primary btn-sm">Submit</button>
                        <a href="index.php" type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>