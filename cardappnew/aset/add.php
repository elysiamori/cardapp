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
     $file = $_FILES["file"]["name"];
	 $tempname = $_FILES["file"]["tmp_name"];
	 $folder = "../image/" . $file;

     // insert data
     $data = "INSERT INTO datachar (id_card, name, stat, hobi, umur, ttl, file) VALUES('$id_card','$name','$stat','$hobi','$umur', '$ttl', '$file')";
     $query = mysqli_query($conn, $data);     


     if($query) {
        header('Location: card.php?status=sukses');
    } else {
        header('Location: card.php?status=gagal');
    }

    if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}


    } else {
        die("Akses dilarang...");
    }

 ?>