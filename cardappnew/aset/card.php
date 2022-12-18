<?php

    //PHP SYSTEM DATABASE WITH MYSQL
    require_once "conn.php";
    //Data dari database
    $data = "SELECT * FROM cardapp.datachar";
    //Data yang telah terambil
    $result = mysqli_query($conn, $data);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Card App Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
  <body>

<!--TITLE-->
<div class="container">
        <div class="mt-3">
            <h1 class="text-center">CARD APP</h1>
        </div>
<!--------------------------------------------------------------------------------------------------------------------------->
        
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
            Card Generator Maker
            </div>

            <div class="card-body">
                 <!-- Button Tambah Data -->
                 <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#adddata">
                Add Data Card
                </button>

                <!--TABEL -->
                <table class="table table-stripe table-hover">
                    <tr>
                        <th>#</th>
                        <th>ID CARD</th>
                        <th>Name</th>
                        <th>Stats</th>
                        <th>Hobby</th>
                        <th>Age</th>
                        <th>Born</th>
                        <th>Menu</th>
                    </tr>
                    <?php
                    $no = 1;
                    while($datachar = mysqli_fetch_array($result)):
                    ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$datachar['id_card']?></td>
                            <td><?=$datachar['name']?></td>
                            <td><?=$datachar['stat']?></td>
                            <td><?=$datachar['hobi']?></td>
                            <td><?=$datachar['umur']?></td>
                            <td><?=$datachar['ttl']?></td>
                            <td>
                                <a href="view.php?id=<?=$datachar['id']?>" class="btn btn-primary">View</a>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updata<?= $no ?>">Edit</a>
                                <a href="delete.php?id=<?=$datachar['id']?>" class="btn btn-danger" onclick="return confirm('Yakin nih di hapus?')">Hapus</a>
                            </td>
                        </tr>

             <!-- AWAL VIEW CARD -->
             <!-- AKHIR VIEW CARD -->

            <!-- AWAL UPDATE DATA -->
            <div class="modal fade" id="updata<?=$no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <!--FORM-->
                    <form action="edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $datachar['id']?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">ID CARD</label>
                            <input type="text" class="form-control" name="id_card" value="<?= $datachar['id_card']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $datachar['name']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stats</label>
                            <input type="text" class="form-control" name="stat" value="<?= $datachar['stat']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hobby</label>
                            <input type="text" class="form-control" name="hobi" value="<?= $datachar['hobi']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" name="umur" value="<?= $datachar['umur']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Born</label>
                            <input type="text" class="form-control" name="ttl" value="<?= $datachar['ttl']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="file" value="image/<?= $datachar['file']?>">
                        </div>
                    

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                    </div>
                </div>
            </div>
            <!---AKHIR UPDATE DATA-->

                    <?php endwhile; ?>
                </table>
                <!--TABEL -->

               

            <!-- AWAL ADD DATA -->
            <div class="modal fade" id="adddata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <!--FORM-->
                    <form action="add.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">ID CARD</label>
                            <input type="text" class="form-control" name="id_card">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stats</label>
                            <input type="text" class="form-control" name="stat">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hobby</label>
                            <input type="text" class="form-control" name="hobi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" name="umur">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Born</label>
                            <input type="text" class="form-control" name="ttl">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                    

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="submit">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                    </div>
                </div>
            </div>
            <!---AKHIR ADD DATA-->

            </div>
            <a class="btn btn-primary" href="../index.php">Back To Menu</a>
        </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------->



<!--------------------------------------------------------------------------------------------------------------------------->

  </body>
</html>