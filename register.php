<?php require_once("koneksi.php");
    session_start();

    if (isset($_SESSION['no_member'])) {
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./index.php">';
            die();
        /// your code here
    } else {

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_member) as maxKode FROM tbl_member");
$data  = mysqli_fetch_array($hasil);
$kodeID = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeID, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "MBR";
$newID = $char . sprintf("%03s", $noUrut);
	
	if( isset( $_REQUEST['submit'] )){

		$no_member = $_REQUEST['no_member'];
		$nm_dpn = $_REQUEST['nm_dpn'];
		$nm_blkg = $_REQUEST['nm_blkg'];
		$jk = $_REQUEST['jk'];
		$provinsi = $_REQUEST['provinsi'];
		$kota = $_REQUEST['kota'];
		$alamat = $_REQUEST['alamat'];
		$kode_pos = $_REQUEST['kode_pos'];
		$telp = $_REQUEST['telp'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		

		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_member(no_member, nm_dpn, nm_blkg, jk, provinsi, kota, alamat, kode_pos, telp, email, password) VALUES('$no_member', '$nm_dpn', '$nm_blkg', '$jk', '$provinsi', '$kota', '$alamat', '$kode_pos', '$telp', '$email', '$password')") or die( mysqli_error($koneksi) );; 

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./login.php">';
			echo 'Akun Berhasil Dibuat Silahkan Login.';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
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
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form method="post" action="" role="form">
							<div class="group-input">
                                <input type="Hidden" value="<?php echo $newID; ?>" id="no_member" name="no_member" required>
                            </div>
							<div class="group-input">
                                <label for="nm_dpn">Nama Depan *</label>
                                <input type="text" id="nm_dpn" name="nm_dpn" required>
                            </div>
							<div class="group-input">
                                <label for="nm_blkg">Nama Belakang *</label>
                                <input type="text" id="nm_blkg" name="nm_blkg" required>
                            </div>
							<div class="group-input">
                                <label for="jk">Jenis Kelamin *</label>
                                <select name="jk" class="form-control" required>
									<option value="">--- Jenis Kelamin ---</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
                            </div>
							<div class="group-input">
                                <label for="provinsi">Provinsi *</label>
                                <input type="text" id="provinsi" name="provinsi" required>
                            </div>
							<div class="group-input">
                                <label for="kota">Kota *</label>
                                <input type="text" id="kota" name="kota" required>
                            </div>
							<div class="group-input">
                                <label for="kota">Alamat *</label>
                                <input type="text" id="alamat" name="alamat" required>
                            </div>
							<div class="group-input">
                                <label for="kode_pos">Kode Pos *</label>
                                <input type="text" id="kode_pos" name="kode_pos" required>
                            </div>
							<div class="group-input">
                                <label for="telp">Telp. *</label>
                                <input type="text" id="telp" name="telp" required>
                            </div>
                            <div class="group-input">
                                <label for="email">E-Mail *</label>
                                <input type="text" id="email" name="email" required>
                            </div>
                            <div class="group-input">
                                <label for="password">Password *</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
	}
	}
	?>
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
</body>

</html>