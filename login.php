<?php

    //memulai session
    session_start();

    //jika ada session, maka akan diarahkan ke halaman dashboard
    if(isset($_SESSION['no_member'])){

        //mengarahkan ke halaman dashboard
        header("Location: ./index.php");
        die();
    }

    //mengincludekan koneksi database
    include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batik Reyre | Batik Online telengkap dan terpercaya</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

 <?php include "menu.php"; ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->
	<?php

    //apabila tombol login di klik akan menjalankan skript dibawah ini
	if( isset( $_REQUEST['login'] ) ){

        //mendeklarasikan data yang akan dimasukkan ke dalam database
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

        //skript query ke insert data ke dalam database
		$sql = mysqli_query($koneksi, "SELECT no_member, nm_dpn, nm_blkg, jk, provinsi, kota, alamat , kode_pos, telp, email, password  FROM tbl_member WHERE email='$email' AND password='$password'");

        //jika skript query benar maka akan membuat session
		if(mysqli_num_rows($sql) > 0){
			list($no_member, $nm_dpn, $nm_blkg, $jk, $provinsi, $kota, $alamat, $kode_pos, $telp, $email, $password) = mysqli_fetch_array($sql);

            //membuat session
            $_SESSION['no_member'] = $no_member;
			$_SESSION['nm_dpn'] = $nm_dpn;
			$_SESSION['nm_blkg'] = $nm_blkg;
			$_SESSION['jk'] = $jk;
			$_SESSION['provinsi'] = $provinsi;
			$_SESSION['kota'] = $kota;
			$_SESSION['alamat'] = $alamat;
			$_SESSION['kode_pos'] = $kode_pos;
			$_SESSION['telp'] = $telp;
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			
			
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./index.php">';
			echo'<script>
					alert("Selamat Datang Di Website Kami '.$nm_dpn.' '.$nm_blkg.' ^_^");
				</script>';
			die();
		} else {

			$_SESSION['errLog'] = 'E-Mail atau Password tidak ditemukan.';
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./login.php">';
			die();
		}

	} else {
	?>
	
    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form method="post" action="">
						<?php
							if(isset($_SESSION['errLog'])){
                                    $errLog = $_SESSION['errLog'];
									echo'<script>
											alert("LOGIN GAGAL! '.$errLog.'");
										</script>';
                                    unset($_SESSION['errLog']);
                                }
						?>
                            <div class="group-input">
                                <label for="email">Alamat E-mail *</label>
                                <input type="text" id="email" name="email" placeholder="E-Mail" required autofocus>
                            </div>
                            <div class="group-input">
                                <label for="password">Password *</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                </div>
                            </div>
                            <button type="submit" name="login" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="./register.php" class="or-login">atau buat akun baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

<?php include "footer.php"; ?>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
	<?php
	}
	?>
</body>

</html>