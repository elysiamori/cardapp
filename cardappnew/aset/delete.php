<?php

include_once "conn.php";

if( isset($_GET['id']) ){

    // ambil id dari query
    $id = $_GET['id'];

    // buat query hapus
    $data = "DELETE FROM datachar WHERE id=$id";
    $query = mysqli_query($conn, $data);

    if($query){
        header('Location: ../index.php');
    } 
    
    else {
        die("Gagal delete data");
    }
}
?>