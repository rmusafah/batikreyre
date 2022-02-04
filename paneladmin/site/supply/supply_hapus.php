<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_supply = $_REQUEST['no_supply'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_supply WHERE no_supply='$no_supply'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=supply">';
        die();
    }
    }
}
?>
