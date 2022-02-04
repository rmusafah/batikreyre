<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_supplier = $_REQUEST['no_supplier'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_supplier WHERE no_supplier='$no_supplier'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=supplier">';
        die();
    }
    }
}
?>
