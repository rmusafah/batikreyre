<?php
 require_once("koneksi.php");
 require_once("cart_proses.php");
    if (!isset($_SESSION['no_member'])) {
		
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./login.php">';
	die();
} else {
	
	if(isset($_REQUEST['submit'])){
		
		$no_keranjang = $_REQUEST['no_keranjang'];
		$no_member = $_REQUEST['no_member'];
		$no_brg = $_REQUEST['no_brg'];
		$no_brg_detail = $_REQUEST['no_brg_detail'];
		$jml_beli = $_REQUEST['jml_beli'];
		
		
		$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE tbl_keranjang.no_brg='$_REQUEST[no_brg]' AND tbl_keranjang.no_member='$no_member' AND tbl_keranjang.no_brg_detail='$no_brg_detail'");
		$count=mysql_num_rows($sql2);
		$count=count($_REQUEST['']);
		$query2 = each($sql2);
		for ($i=0;$i<$query2;$i++) { 

		$sql = mysqli_query($koneksi, "UPDATE tbl_keranjang SET no_member='$no_member', no_brg='$no_brg', no_brg_detail='$no_brg_detail', jml_beli='$jml_beli' WHERE no_keranjang='$no_keranjang'");;
		}
		
    if($sql == true){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./cart.php">';
        die();
    } else {
		echo 'ERROR! Periksa penulisan querynya.'. mysqli_error($koneksi);
	}
    }


}
?>