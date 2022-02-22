<?php
// Proses Simpan
if($_POST){
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    if(empty($tahun)){
        echo "<script>alert('tahun tidak boleh kosong');location.href='tampil_spp.php';</script>";
    } else if(empty($nominal)){
        "<script>alert('nominal tidak boleh kosong');location.href='tampil_spp.php';</script>";
    } else{
        include "koneksi.php";
        $insert = mysqli_query($conn,"INSERT INTO spp (tahun, nominal) value ('".$tahun."','".$nominal."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan SPP');location.href='tampil_spp.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan SPP');location.href='tampil_spp.php';</script>";
        }
    }
}
?>