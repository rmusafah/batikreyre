<?php
 require_once("koneksi.php");
 require_once("produk.php");
    if (!isset($_SESSION['no_member'])) {
		
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./login.php">';
	die();
} else {
	
	if(isset($_REQUEST['submit'])){
		
		$kd = $_REQUEST['kd'];
		$no_keranjang = $_REQUEST['no_keranjang'];
		$no_member = $_REQUEST['no_member'];
		$no_brg = $_REQUEST['no_brg'];
		$no_brg_detail = $_REQUEST['no_brg_detail'];

		$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE tbl_keranjang.no_brg='$_REQUEST[no_brg]' AND tbl_keranjang.no_member='$no_member' AND tbl_keranjang.no_brg_detail='$no_brg_detail'");
		$data2 = mysqli_fetch_array($sql2);
		$jml_beli = $data2['jml_beli'] + 1;
		
		if(mysqli_num_rows($sql2) >= 1){
			$sql = mysqli_query($koneksi, "UPDATE tbl_keranjang SET no_member='$no_member', no_brg='$no_brg', no_brg_detail='$no_brg_detail', jml_beli='$jml_beli' WHERE no_member='$no_member' AND no_brg='$no_brg' AND no_brg_detail='$no_brg_detail'");;
		} else {
	
		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_keranjang(no_member, no_brg, no_brg_detail, jml_beli) VALUES('$no_member','$no_brg', '$no_brg_detail', 1)") or die( mysqli_error($koneksi) );; 
		
		}
		
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./produk.php?kd='.$kd.'">';
        die();
    } else {
		echo 'ERROR! Periksa penulisan querynya.';
	}
    }


}
?>