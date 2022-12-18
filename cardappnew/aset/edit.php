<?php

  include_once "conn.php";

 // input data user
 if(isset($_POST['update'])) {
     $id_card = $_POST['id_card'];
     $name = $_POST['name'];
     $stat = $_POST['stat'];
     $hobi = $_POST['hobi'];
     $umur = $_POST['umur'];
     $ttl = $_POST['ttl'];
     $file = $_POST['file'];
     $id = $_POST['id'];

   
     // insert data
     $data = "UPDATE datachar SET id_card='$id_card', name='$name', stat='$stat', hobi='$hobi', umur='$umur', ttl='$ttl', file='$file' WHERE id='$id'";
     $query = mysqli_query($conn, $data);     


     if($query) {
        header('Location: ../index.php?status=sukses');
    } else {
        header('Location: ../index.php?status=gagal');
    }

    } else {
        die("Akses dilarang...");
    }

 ?>