<?php
    require("koneksi.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $no_telepon = $_POST["no_telepon"];
        $fasilitas = $_POST["fasilitas"];
        
        $perintah = "UPDATE tbl_interschool SET nama = '$nama', alamat = '$alamat', no_telepon = '$no_telepon', fasilitas = '$fasilitas' WHERE id = '$id'";
        $eksekusi = mysqli_query($konek, $perintah);
        $cek = mysqli_affected_rows($konek);
        
        if($cek>0){
            $response["kode"] = 1;
            $response["pesan"] = "Ubah Data Sukses!";
        }
        else{
            $response["kode"] = 0;
            $response["pesan"] = "Ubah Data Gagal!";        
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data";
    }
    
    echo json_encode($response);
    mysqli_close($konek);