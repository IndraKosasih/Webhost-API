<?php
    require("koneksi.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $no_telepon = $_POST["no_telepon"];
        $fasilitas = $_POST["fasilitas"];
        
        $perintah = "INSERT INTO tbl_interschool (nama, alamat, no_telepon, fasilitas) VALUES('$nama', '$alamat', '$no_telepon', '$fasilitas')";
        $eksekusi = mysqli_query($konek, $perintah);
        $cek = mysqli_affected_rows($konek);
        
        if($cek>0){
            $response["kode"] = 1;
            $response["pesan"] = "Tambah Data Sukses!";
        }
        else{
            $response["kode"] = 0;
            $response["pesan"] = "Tambah Data Gagal!";        
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data";
    }
    
    echo json_encode($response);
    mysqli_close($konek);