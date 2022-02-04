<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_diskon = $_REQUEST['no_diskon'];
	
	$sql3 = mysqli_query($koneksi, "SELECT * FROM tbl_diskon, tbl_barang WHERE tbl_diskon.no_diskon='$no_diskon' AND tbl_diskon.no_brg=tbl_barang.no_brg");
	$row3 = mysqli_fetch_array($sql3);
	$no_brg = $row3['no_brg'];
	$harga = $row3['harga'];
	$sql4 = mysqli_query($koneksi, "UPDATE tbl_barang SET diskon=0, harga_akhir='$harga' WHERE tbl_barang.no_brg='$no_brg'");
    $sql = mysqli_query($koneksi, "DELETE FROM tbl_diskon WHERE no_diskon='$no_diskon'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=diskon">';
        die();
    } else {
			echo 'ERROR! Periksa penulisan querynya. '. mysqli_error($koneksi);
	 }
    }
}
?>
