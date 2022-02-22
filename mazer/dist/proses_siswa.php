<?php
include 'koneksi.php';
session_start();

if($_POST){
 $nisn=$_POST['nisn'];
 $nis=$_POST['nis'];
 $nama=$_POST['nama'];
 $id_kelas=$_POST['id_kelas'];
 $id_spp=$_POST['id_spp'];
 $alamat=$_POST['alamat'];
 $no_telp=$_POST['no_telp'];


 if(empty($nisn)){
 echo "<script>alert('nisn tidak boleh kosong');location.href='tampil_siswa.php';</script>";
 } elseif(empty($nis)){
 echo "<script>alert('nis tidak boleh kosong');location.href='tampil_siswa.php';</script>";
 } elseif(empty($nama)){
 echo "<script>alert('nama tidak boleh kosong');location.href='tampil_siswa.php';</script>";
} elseif(empty($id_kelas)){
    echo "<script>alert('id_kelas tidak boleh kosong');location.href='tampil_siswa.php';</script>";
} elseif(empty($alamat)){
    echo "<script>alert('alamat tidak boleh kosong');location.href='tampil_siswa.php';</script>";
} elseif(empty($no_telp)){
    echo "<script>alert('no_telp tidak boleh kosong');location.href='tampil_siswa.php';</script>";

 } else {
 include "koneksi.php";
 $insert=mysqli_query($conn,"insert into siswa (nisn, nis, nama, id_kelas, id_spp, alamat, no_telp) value ('".$nisn."', '".$nis."', '".$nama."', '".$id_kelas."', '".$id_spp."','".$alamat."', '".$no_telp."')");
 if($insert){
 echo "<script>alert('Sukses menambahkan siswa');location.href='tampil_siswa.php';</script>";
 } else {
 echo "<script>alert('Gagal menambahkan siswa');location.href='tampil_siswa.php';</script>";
 }
 }
}
?>