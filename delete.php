<?php
    require("koneksi.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_POST["id"];

        
        $perintah = "DELETE FROM tbl_interschool WHERE id = '$id'";
        $eksekusi = mysqli_query($konek, $perintah);
        $cek = mysqli_affected_rows($konek);
        
        if($cek>0){
            $response["kode"] = 1;
            $response["pesan"] = "Hapus Data Sukses!";
        }
        else{
            $response["kode"] = 0;
            $response["pesan"] = "Hapus Data Gagal!";        
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Tidak Ada Post Data";
    }
    
    echo json_encode($response);
    mysqli_close($konek);