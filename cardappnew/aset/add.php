<?php

  include_once "conn.php";

 // input data user
 if(isset($_POST['submit'])) {
     $id_card = $_POST['id_card'];
     $name = $_POST['name'];
     $stat = $_POST['stat'];
     $hobi = $_POST['hobi'];
     $umur = $_POST['umur'];
     $ttl = $_POST['ttl'];
     $file = $_POST['file'];

     // insert data
     $data = "INSERT INTO datachar (id_card, name, stat, hobi, umur, ttl, file) VALUES('$id_card','$name','$stat','$hobi','$umur', '$ttl', '$file')";
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