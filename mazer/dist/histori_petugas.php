<?php
session_start();
require_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori - TokoOnline</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="dashboard.php"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="tampil_transaksi_petugas.php" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>

                        <li class="sidebar-item active">
                            <a href="histori_petugas.php" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Histori Pembayaran</span>
                            </a>
                        </li>

           
                        <li class="sidebar-title">Pages</li>

                        <li class="sidebar-item ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="col-md-12">
                                                    <div class="col-md-12 form-group">
            <h3>Cari Siswa berdasarkan NISN</h3>
            
    <form action="" method="POST" autocomplete="off">
        <input type="text" name="nisn" class="form-control" placeholder="Cari berdasarkan NISN" autofocus>
        <button class="btn btn-primary" type="submit" name="cari">Cari</button>
    </form>

<?php
// Kita lakukan proses pencariannya disini
if(isset($_POST['cari'])){
    $nisn = $_POST['nisn'];
    // Kita panggil table siswa
    $biodataSiswa = mysqli_query($conn, "SELECT * FROM siswa 
                    JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
                    WHERE nisn='$nisn'");
    // Table pembayaran wajib kita panggil
    $historyPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran
                         JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
                         JOIN spp ON pembayaran.id_spp=spp.id_spp
                         WHERE nisn='$nisn'
                         ORDER BY tgl_bayar");
    $r_siswa = mysqli_fetch_assoc($biodataSiswa);
?>
<br/>
    <hr />
    <!-- Kita tampilkan Biodata Siswa -->
        <h3>Biodata Siswa</h3>
        <table cellpadding="5">
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
        <!-- Sekarang kita tampilkan history pembayarannya -->
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>No. </th><th>Tanggal Pembayaran</th><th>Pembayaran Melalui</th><th>Tahun SPP | Nominal yang harus dibayar</th><th>Bulan</th><th>Jumlah yang sudah dibayar</th><th>Status</th><th>Aksi</th>
            </tr>
</thead>
<hr/>
            <h3>Histori Pembayaran</h3>

<?php 
$no=0;
while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ 
$no++;?>
        
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r_trx['tgl_bayar']; ?></td>
                <td><?= $r_trx['nama_petugas']; ?></td>
                <td><?= $r_trx['tahun'] . " | Rp. " . $r_trx['nominal']; ?></td>
                <td><?= $r_trx['bulan_dibayar']; ?></td>
                <td><?= $r_trx['jumlah_bayar']; ?></td>
                <td><?php

                if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ ?>
                <span class="badge badge-m bg-success">LUNAS</span>
<?php }else{ ?>
                <span class="badge badge-m bg-danger">BELUM LUNAS</span>                           
                <?php } ?> </td>
            <td>
<?php
// Jika siswa ingin membayar lunas sisa pembayaran
if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ echo "-";
}else{ ?>
    <a href="ubah_transaksi.php" <?= $r_trx['id_pembayaran']; ?>" class="badge badge-m bg-warning">BAYAR 
    LUNAS</a>
<?php } ?>  </td>
        </tr>
<?php  } ?>
    </table>
        
<?php  } ?>
<hr/>
</body>
</html>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
</br>
                       

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; PembayaranSPP</p>
                    </div>
                    
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>