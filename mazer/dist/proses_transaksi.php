<?php
// Proses Simpan
if($_POST){
    $id_pembayaran = $_POST['id_pembayaran'];
    $id_petugas = $_POST['id_petugas'];
    $nisn = $_POST['nisn'];
    $nama=$_POST['nama'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $bulan_dibayar = $_POST['bulan_dibayar'];
    $id_spp = $_POST['id_spp'];
    $jumlah_bayar= $_POST['jumlah_bayar'];

    if(empty($id_petugas)){
      echo "<script>alert('Petugas tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
   } elseif(empty($tgl_bayar)){
      echo "<script>alert('Tanggal Bayar tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    } elseif(empty($bulan_dibayar)){
        echo "<script>alert('Bulan tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    } elseif(empty($jumlah_bayar)){
        echo "<script>alert('Jumlah Bayar tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
   } else {
     
      include "koneksi.php";
      $insert=mysqli_query($conn, "INSERT INTO pembayaran (id_pembayaran, id_petugas, nisn, tgl_bayar, bulan_dibayar, id_spp, jumlah_bayar) VALUES ('".$id_pembayaran."', '".$id_petugas."','".$nisn."','".$tgl_bayar."','".$bulan_dibayar."','".$id_spp."','".$jumlah_bayar."')");
   if($insert){
      echo "<script>alert('Sukses menambahkan transaksi');location.href='tampil_transaksi.php';</script>";
  } else {
        echo "<script>alert('Gagal menambahkan transaksi');location.href='tambah_transaksi.php';</script>";
      }
      }
     }
     ?>