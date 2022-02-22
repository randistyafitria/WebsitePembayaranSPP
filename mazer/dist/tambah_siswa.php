<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form - TokoOnline</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

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
                            <a href="tampil_transaksi.php" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="histori.php" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Histori Pembayaran</span>
                            </a>
                        </li>

           

                        <li class="sidebar-item  has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Table</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item active">
                                    <a href="tampil_siswa.php">Data Siswa</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="tampil_petugas.php">Data Petugas</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="tampil_kelas.php">Data Kelas</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="tampil_spp.php">Data SPP</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Pages</li>

                        <li class="sidebar-item">
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
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Form Tambah Siswa</h3>
                            
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Tambah Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Basic Horizontal form layout section start -->
                <form action="proses_siswa.php" method="post">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                   
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">


                                                        <label>NISN</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <input type="text" name="nisn" value="" class="form-control" placeholder="NISN">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>NIS</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <input type="text" name="nis" value="" class="form-control" placeholder="NIS">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nama Siswa</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <input type="text" name="nama" value="" class="form-control" placeholder="Nama Siswa">
                                                    </div>
                                                    <div class="col-md-4">

                                                        <label>Kelas</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <select name="id_kelas" class="form-control" placeholder="Kelas">
                        <option>Pilih Kelas</option>
                        <?php
                        include "koneksi.php";
                        $kelas=mysqli_query($conn,"SELECT * FROM kelas");
                        while($data=mysqli_fetch_array($kelas)){
                            echo '<option value="'.$data['id_kelas'].'">'.$data['nama_kelas'].' | '.$data['kompetensi_keahlian'].'</option>';
                            
                        }
                        ?>
                    </select>
                                                    </div>
                                                    <div class="col-md-4">

                                                    <label>Nominal</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <select name="id_spp" class="form-control">
                                                        <option value="not_option">--Pilih--</option>
                                                        <?php include "koneksi.php";;
                                                        $qry_spp=mysqli_query($conn, "SELECT * FROM spp ORDER BY id_spp");
                                                        while($dt_spp=mysqli_fetch_array($qry_spp)){
                                                          echo '<option value="'.$dt_spp['id_spp'].'">'.$dt_spp['tahun']. " | " .$dt_spp['nominal'].'</option>'; 
                                                        }
                                                        ?>`
                                                    </select>

                                                    </div>
                                                    <div class="col-md-4">
                                                    <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <input type="text" name="alamat" value="" class="form-control" placeholder="Alamat">
                                                    </div>
                                                    <div class="col-md-4">
                                                    <label>No Telp</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <input type="text" name="no_telp" value="" class="form-control" placeholder="No Telp">
                                                    </div>
                                                    <div class="col-md-4">
                                                    
                                                        
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                    <input type="submit" name="simpan" value="Tambah Siswa" class="btn btn-primary">
                                                    </div>
                                                  
                                                    
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->


                <!-- // Basic multiple Column Form section end -->
            </div>

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

    <script src="assets/js/main.js"></script>
</body>

</html>