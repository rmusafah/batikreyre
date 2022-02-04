<?php
require_once("koneksi.php");
require_once("cart_proses.php");
if( empty( $_SESSION['no_member'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./login.php">';
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_keranjang = $_REQUEST['no_keranjang'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE no_keranjang='$no_keranjang'");
    if($sql == true){
        echo '<script>
				window.location=history.go(-1);
			  </script>';
        die();
    }
    }
}
?>
