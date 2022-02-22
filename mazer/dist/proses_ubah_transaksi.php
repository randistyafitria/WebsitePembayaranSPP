<?php
    $id_pembayaran = $_POST['id_pembayaran'];
    $id_petugas=$_POST['id_petugas'];
    $nisn=$_POST['nisn'];
    $tgl_bayar=$_POST['tgl_bayar'];
    $bulan_dibayar=$_POST['bulan_dibayar'];
    $id_spp=$_POST['id_spp'];
    $jumlah_bayar=$_POST['jumlah_bayar'];

    $mysqli->query ("UPDATE `pembayaran` SET `id_petugas`='".$id_petugas."', `nisn`='".$nisn."', `tgl_bayar`='".$tgl_bayar."',
    `bulan_dibayar`='".$bulan_dibayar."',`jumlah_bayar`='".$jumlah_bayar."' WHERE `id_pembayaran` ='".$id_pembayaran."'");
    if($mysqli){
        echo "<script>alert('Sukses update Transaksi');location.href='tampil_transaksi.php';</script>";
        } else {
        echo "<script>alert('Gagal update Transaksi');location.href='ubah_transaksi.php?id_pembayaran=".$id_pembayaran."';</script>";
        }

?>