	<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
	
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        reyrebatik@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +62 821-5447-4930
                    </div>
                </div>
                <div class="ht-right">
                    
					<?php
                             include "koneksi.php";
                            if(isset($_SESSION["no_member"])){
                                $sql = "SELECT nm_dpn FROM tbl_member WHERE no_member='$_SESSION[no_member]'";
                                $query = mysqli_query($koneksi,$sql);
                                $row=mysqli_fetch_array($query);
                                
                                echo '
                               <a href="#" class="login-panel"><i class="fa fa-user"></i>HI '.$row["nm_dpn"].'</a>';

                            }else{ 
                                echo '
                                <a href="./login.php" class="login-panel"><i class="fa fa-user"></i>Login</a>';           
                            }
                    ?>

                </div>
            </div>
        </div>
		<form method="post" action="produk_hapus.php" class="form-horizontal" role="form">
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/reyre logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">&nbsp;&nbsp;&nbsp;Cari Produk</button>
                            <div class="input-group">
                                <input type="text" id="search" placeholder="Ketik Disini">
                                <button type="button" id="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
											<?php
											//MENAMPILKAN DETAIL KERANJANG BELANJA//

											$total = 0;
											if(isset($_SESSION["no_member"])){
											//mysql_select_db($database_conn, $conn);
											$query = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang, tbl_member, tbl_barang, tbl_barang_detail WHERE tbl_keranjang.no_member=tbl_member.no_member AND tbl_keranjang.no_brg=tbl_barang.no_brg AND tbl_keranjang.no_brg_detail=tbl_barang_detail.no_brg_detail AND tbl_keranjang.no_member='$_SESSION[no_member]'");
											while ($data = mysqli_fetch_array($query)) {
												

												$jumlah_harga = $data['harga_akhir'] * $data['jml_beli'];
												$total += $jumlah_harga;
												$no = 1;
												?>
                                                <tr>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>Rp.<?php echo number_format($data['harga_akhir'],2,",",".");?> (<?php echo $data['ukuran']; ?>) x <?php echo number_format($data['jml_beli']); ?></p>
                                                            <h6><?php echo $data['nm_brg']; ?></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
													<script type="text/javascript" language="JavaScript">
														function konfirmasi(){
														tanya = confirm("Anda Yakin akan Menghapus Produk dari Keranjang Belanja ini?");
														if (tanya == true) return true;
														else return false;
														}
													</script>
                                                        <a href="./produk_hapus.php?submit=yes&no_keranjang=<?php echo $data['no_keranjang']; ?>" onclick="return konfirmasi()"i class="ti-close"></i></a>
                                                    </td>
                                                </tr>
												<?php			
											} }

												?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
									<?php
									if($total == 0){ ?>
										<span><?php echo "Keranjang Kosong!"; ?></span>
									<?php } else { ?>
					
										<span>Total:</span>
                                        <h5>Rp. <?php echo number_format($total); ?>,-</h5>
					
									<?php	
									}
									?>  
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart.php" class="primary-btn view-card">VIEW CART</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">Rp. <?php echo number_format($total); ?>,-</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		</form>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Akun</span>
                        <ul class="depart-hover">
						<?php
                             include "koneksi.php";
                            if(isset($_SESSION["no_member"])){
                                $sql = "SELECT nm_dpn FROM tbl_member WHERE no_member='$_SESSION[no_member]'";
                                $query = mysqli_query($koneksi,$sql);
                                $row=mysqli_fetch_array($query);
                                
                                echo '
								<li><a href="belanja.php">Daftar Belanja</a></li>
								<li><a href="custom_daftar.php">Daftar Kustom</a></li>
								<li><a href="return.php">Retur Barang</a></li>
								<li><a href="./return_list.php">Daftar Retur</a></li>
								<li><a href="logout.php">Logout</a></li>';

                            }else{ 
                                echo '
                                <li><a href="login.php">Login</a></li>
								<li><a href="register.php">Register</a></li>';           
                            }
						?>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.php">Beranda</a></li>
						<li><a href="./shop.php">Toko</a></li>
                        <li><a href="./kontak.php">Kontak</a></li>
                        <li><a href="./cara_pembelian.php">Cara Pembelian</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->