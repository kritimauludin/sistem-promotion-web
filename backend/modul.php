<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_umkm') or die(mysqli_error($koneksi));

//for get data
function query($query)
{
    global $koneksi;
    $returnQuery = mysqli_query($koneksi, $query);

    $temp = [];
    while ($line = mysqli_fetch_assoc($returnQuery)) {
        $temp[] = $line;
    }

    return $temp;
}

//function create promotion
function createBannerPromotion($data)
{
    global $koneksi;

    $user_id            = $data['user_id'];
    $businessOwner      = htmlspecialchars($data['business_owner']);
    $businessName       = htmlspecialchars($data['business_name']);
    $instagram          = htmlspecialchars($data['url_instagram']);
    $facebook           = htmlspecialchars($data['url_facebook']);
    $shopee             = htmlspecialchars($data['url_shopee']);
    $tokopedia          = htmlspecialchars($data['url_tokopedia']);
    $website            = htmlspecialchars($data['website_link']);
    $imgUrl             = htmlspecialchars($data['img_url']);

    $created_at         = date('Y-m-d');
    $updated_at         = date('Y-m-d');

    $query = "INSERT INTO umkm (id, user_id, business_owner, business_name, shopee, tokopedia, instagram, facebook, img_url, created_at, updated_at, website) VALUES 
                ('', '$user_id', '$businessOwner' , '$businessName', '$shopee', '$tokopedia', '$instagram', '$facebook', '$imgUrl', '$created_at', '$updated_at', '$website')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// function update promotion
function updateBannerPromotion($data)
{
    global $koneksi;

    $id                 = $data['id'];
    $businessOwner      = htmlspecialchars($data['business_owner']);
    $businessName       = htmlspecialchars($data['business_name']);
    $instagram          = htmlspecialchars($data['url_instagram']);
    $facebook           = htmlspecialchars($data['url_facebook']);
    $shopee             = htmlspecialchars($data['url_shopee']);
    $tokopedia          = htmlspecialchars($data['url_tokopedia']);
    $website            = htmlspecialchars($data['website_link']);
    $imgUrl             = htmlspecialchars($data['img_url']);

    $updated_at         = date('Y-m-d');

    $query  =   "UPDATE umkm SET
                        business_owner  = '$businessOwner',
                        business_name   = '$businessName',
                        instagram       = '$instagram',
                        facebook        = '$facebook',
                        shopee          = '$shopee',
                        tokopedia       = '$tokopedia',
                        website         = '$website',
                        img_url         = '$imgUrl'
                        updated_at      = '$updated_at'
                        WHERE id = '$id'
                        ";
    
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// function delete promotion
function deleteBannerPromotion($id, $filename)
{
    global $koneksi;

    $dir = "public/img/banner/";
    if (file_exists($dir.$filename)) {
        unlink($dir.$filename);
        mysqli_query($koneksi, "DELETE FROM umkm WHERE id = $id");
    } else {
        echo 'Could not delete '.$filename.', file does not exist';
    }
    
    return mysqli_affected_rows($koneksi);
}

function createAccount($Data){
	global $koneksi;

	$username			= strtolower(stripcslashes($Data["username"]));
	$password			= mysqli_real_escape_string($koneksi, $Data["password"]);
	$password2			= mysqli_real_escape_string($koneksi, $Data["password2"]);

	//Cek Username
	$Hasil 	= mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($Hasil)) {
		echo "
            <script>
                alert('Username Sudah Terdaftar');
            </script>
        ";

        return false;
	}

	// Cek Konfirmasi Password
	if ($password !== $password2) {
		echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai');
            </script>
        ";

        return false;

	}

	// Enkripsi Password
	$password 	= password_hash($password, PASSWORD_DEFAULT);

	$Query 	= "INSERT INTO users VALUES('', '$username', '$password')";

	mysqli_query($koneksi, $Query);

	return mysqli_affected_rows($koneksi);

}
