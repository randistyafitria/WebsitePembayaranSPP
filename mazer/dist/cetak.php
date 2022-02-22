<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>History Pembayaran</title>
</head>
<body>
<?php 
require_once("koneksi.php");
session_start();
$biodataSiswa = mysqli_query($conn,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='".$_GET['nisn']."'");
$historyPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas JOIN spp ON pembayaran.id_spp=spp.id_spp WHERE nisn='".$_GET['nisn']."' ORDER BY tgl_bayar");
$r_siswa = mysqli_fetch_assoc($biodataSiswa);   
?>
  <div class="container-scroller">
        <!-- partial -->
          <div class="content-wrapper">
            <div class="page-header">
            <h3 class ="card-title text-white">Laporan Pembayaran SPP</h1>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                  <div class="card-body">                 
                  <hr/>
                   <!-- Kita tambilkan Biodata Siswa -->
                   <h4 class="card-title">Biodata Siswa</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                         <td>NISN</td>
                         <td>:</td>
                         <td><?=$r_siswa['nisn'];?></t>
                        </tr>
                        <tr>
                          <td>NIS</td>
                          <td>:</td>
                          <td><?=$r_siswa['nis'];?></td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td><?=$r_siswa['nama'];?></td>
                        </tr>
                        <tr>
                          <td>Kelas</td>
                          <td>:</td>
                          <td><?=$r_siswa['nama_kelas']. " | ".$r_siswa['kompetensi_keahlian'];?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>:</td>
                          <td><?=$r_siswa['alamat'];?></td>
                        </tr>
                        </thead>
                        </table>
                        <hr/>
                    </div>
                    </div>
                    </div>
                    </div>   
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   <!--Sekarang kita tampilkan history pembayarannya-->
                   <h4 class="card-title">Histori Pembayaran</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                         <td>NO.</td>
                         <td>Tanggal Pembayaran</td>
                         <td>Pembayaran Melalui</td>
                         <td>Tahun SPP | Nominal yang harus dibayar</td>
                         <td>Bulan</td>
                         <td>Jumlah yang sudah dibayar</td>
                         <td>Status</td>
                        </tr>
                        <?php
                        $no=1;
                        while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ ?>
                        <tr>
                          <td><?=$no;?></td>
                          <td><?=$r_trx['tgl_bayar'];?></td>
                          <td><?=$r_trx['nama_petugas'];?></td>
                          <td><?=$r_trx['tahun']." | Rp.".$r_trx['nominal'];?></td>
                          <td><?=$r_trx['bulan_dibayar'];?></td>
                          <td><?="Rp.".$r_trx['jumlah_bayar'];?></td>
                          <?php
                          if($r_trx['jumlah_bayar'] == $r_trx['nominal']){?>
                          <td>LUNAS</td>
                          <td>-</td><?php }else{?><td>BELUM LUNAS</td>
                          <td><a href="?pembayaran=edit&id_pembayaran=<?php echo $r_trx['id_pembayaran'];?>">
                          <?php } ?>
                          </tr>
                          <?php $no++; }?>
                          </table>
                          </thead>  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
                <script>
                    window.print();
                </script>
            </body>
          </html>