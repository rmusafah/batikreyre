<?php
 include "koneksi.php";
 
 $nm_brg=$_POST["nm_brg"];
 
  
 $result=mysqli_query($koneksi, "SELECT * FROM tbl_barang where nm_brg like '%$nm_brg%' ");
 $found=mysqli_num_rows($result);
 
 if($found>0){
    while($row=mysqli_fetch_array($result)){
    echo '<div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="paneladmin/'.$row['gambar'].'" alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="produk.php?kd='.$row['no_brg'].'"><i class="icon_bag_alt"></i>Detail</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">'.$row['ktgri_brg'].'</div>
                                        <a href="#">
                                            <h5>'.$row['nm_brg'].'</h5>
                                        </a>
                                        <div class="product-price">
                                            Rp.'.number_format($row['harga'],2,",",".").'
                                        </div>
                                    </div>
                                </div>
            </div>';
    }   
 }else{
    echo 'Tidak ada Produk yang ditemukan';
 }
?>