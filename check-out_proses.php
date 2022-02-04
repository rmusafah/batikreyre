<?php

require_once("koneksi.php");
require_once("check-out.php");
if (!isset($_SESSION)) {
    session_start();
}

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_order) as maxKode FROM tbl_order");
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
$char = "ORD";
$newID = $char . sprintf("%03s", $noUrut);
$today = date("YmdHis");

if (isset($_REQUEST['submit'])) {

		$no_order = $_REQUEST['no_order'];
		$no_member = $_REQUEST['no_member'];
		$list_belanja = $_REQUEST['list_belanja'];
		$total_harga = $_REQUEST['total_harga'];
		$hpp_order = $_REQUEST['hpp_order'];
		$total_order = $_REQUEST['total_order'];
		$provinsi = $_REQUEST['provinsi_ord'];
		$kota = $_REQUEST['kota_ord'];
		$alamat = $_REQUEST['alamat_ord'];
		$kode_pos = $_REQUEST['kode_pos_ord'];
		$status = $_REQUEST['status'];

    // masukkan dalam table tbl_order
    $query = mysqli_query($koneksi, 
		"INSERT INTO tbl_order(no_order, tgl_order, jatuh_tempo, no_member, list_belanja, total_harga, hpp_order, total_order, provinsi_ord, kota_ord, alamat_ord, kode_pos_ord, status) VALUES('$newID-$today', CURRENT_DATE, CURRENT_DATE+3,'$no_member','$list_belanja','$total_harga','$hpp_total','$total_order', '$provinsi', '$kota', '$alamat', '$kode_pos', '$status')") or die( mysqli_error($koneksi) );;
	
        if ($query) {
			echo '<input type="hidden" id="newID2[]" name="newID2[]" value="'.$newID.'">';
			$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang, tbl_member, tbl_barang, tbl_barang_detail WHERE tbl_keranjang.no_member=tbl_member.no_member AND tbl_keranjang.no_brg=tbl_barang.no_brg AND tbl_keranjang.no_brg_detail=tbl_barang_detail.no_brg_detail AND tbl_keranjang.no_member='$_SESSION[no_member]'");
			$count=mysqli_num_rows($sql2);
			
			$no_brg = $_REQUEST['no_brg'];
			$nm_brg = $_REQUEST['nm_brg'];
			$ukuran = $_REQUEST['ukuran'];
			$harga = $_REQUEST['harga'];
			$jml_beli = $_REQUEST['jml_beli'];
			$diskon = $_REQUEST['diskon'];
			$harga_akhir = $_REQUEST['harga_akhir'];
			$hpp_ord_detail = $_REQUEST['hpp_ord_detail'];
					
			$jumlah_harga = $_REQUEST['jumlah_harga'];
			
			
			for($i=0;$i<$count;$i++){
					
			$sql = "INSERT INTO tbl_order_detail(no_order, no_brg, nm_brg, ukuran, harga, jml_order, diskon, harga_akhir, hpp_ord_detail, jumlah_harga) VALUES ('$newID-$today','$no_brg[$i]', '$nm_brg[$i]', '$ukuran[$i]', '$harga[$i]', '$jml_beli[$i]', '$diskon[$i]', '$harga_akhir[$i]', '$hpp_ord_detail[$i]', '$jumlah_harga[$i]')";
			$result=mysqli_query($koneksi, $sql);
		}

            if ($query == true) {
                echo 'Checkout sukses';
				$sql3 = mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE no_member='$_SESSION[no_member]'");
				echo'<script>
						alert("Pemesanan anda akan diproses setelah anda mengirim bukti pembayaran");
					</script>';
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./belanja.php">';
            }
        }
    }