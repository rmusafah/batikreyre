<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id_motor = $_REQUEST['id_motor'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_motor WHERE id_motor='$id_motor'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=motor">';
        die();
    }
    }
}
?>
