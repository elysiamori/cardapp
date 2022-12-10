<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Card Generator App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Character Information <span class='glyphicon glyphicon-user'></h2>
                        <a href="./aset/add.php" class="btn btn-success pull-right">Add New User</a>
                    </div>
                    <?php
                    // Include connect file
                    require_once "./aset/connect.php";

                   
                    $sql = "SELECT * FROM cardapp.datachar";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        //echo "<th>#</th>";
                                        echo "<th>ID Card</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Stats</th>";
                                        echo "<th>Hobby</th>";
                                        echo "<th>Age</th>";
                                        echo "<th>Born</th>";
                                        echo "<th>Setting</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        //echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['id_card'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['stat'] . "</td>";
                                        echo "<td>" . $row['hobi'] . "</td>";
                                        echo "<td>" . $row['umur'] . "</td>";
                                        echo "<td>" . $row['ttl'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='aset/read.php?id=". $row['id'] ."' title='View Data' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='aset/update.php?id=". $row['id'] ."' title='Update Data' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='aset/delete.php?id=". $row['id'] ."' title='Delete Data' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No data record.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
