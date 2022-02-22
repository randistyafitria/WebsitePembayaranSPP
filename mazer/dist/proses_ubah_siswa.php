<?php
// Proses update
if($_POST){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    if(empty($nisn)){
        echo "<script>alert('nisn tidak boleh kosong');location.href='tampil_siswa.php';</script>";
    } elseif(empty($nis)){
        echo "<script>alert('nis tidak boleh kosong');location.href='tampil_siswa.php';</script>";
    } elseif(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tampil_siswa.php';</script>";
    } elseif(empty($id_kelas)){
        echo "<script>alert('id kelas tidak boleh kosong');location.href='tampil_siswa.php';</script>";
    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='tampil_siswa.php';</script>";
    } elseif(empty($no_telp)){
        echo "<script>alert('no telp tidak boleh kosong');location.href='tampil_siswa.php';</script>";
    } else{
        include "koneksi.php";
        $update=mysqli_query($conn,"update siswa set nisn='".$nisn."', nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp' where nisn = '".$nisn."' ") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('Sukses mengupdate siswa');location.href='tampil_siswa.php';</script>";
        }else{
            echo "<script>alert('Gagal mengupdate siswa');location.href='ubah_siswa.php';</script>";
        }
            
        // else{
        //     $update=mysqli_query($conn,"update siswa set nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp' where nisn = '".$nisn."' ") or die(mysqli_error($conn));
        //     if($update){
        //         echo "<script>alert('Sukses mengupdate siswa');location.href='tampil_siswa.php';</script>";
        //     }else{
        //         echo "<script>alert('Gagal mengupdate siswa');location.href='ubah_siswa.php';</script>";
        //     }
        // }
    }
}
?>