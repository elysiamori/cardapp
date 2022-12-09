<?php
// connect database
require_once "connect.php";
 

$id_card = $name = $stat = $hobi = $umur = $ttl = "";
$id_card_err = $name_err = $stat_err = $hobi_err = $umur_err = $ttl_err = "";
 

if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    $id = $_POST["id"];

    $input_id_card = trim($_POST["id_card"]);
    if(empty($input_id_card)){
        $id_card_err = "Please enter the id_card amount.";
    } elseif(!ctype_digit($input_id_card)){
        $id_card_err = "Please enter a positive integer value.";
    } else{
        $id_card = $input_id_card;
    }
    
   
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
   
    $input_stat = trim($_POST["stat"]);
    if(empty($input_stat)){
        $stat_err = "Please enter a stat.";
    } else{
        $stat = $input_stat;
    }
    
    $input_hobi = trim($_POST["hobi"]);
    if(empty($input_hobi)){
        $hobi_err = "Please enter a hobi.";
    } else{
        $hobi = $input_hobi;
    }
    
    $input_umur = trim($_POST["umur"]);
    if(empty($input_umur)){
        $umur_err = "Please enter an umur.";
    } else{
        $umur = $input_umur;
    }

    $input_ttl = trim($_POST["ttl"]);
    if(empty($input_ttl)){
        $ttl_err = "Please enter a hobi.";
    } else{
        $ttl = $input_ttl;
    }
    // Check input errors before inserting in database
    if(empty($id_card_err) && empty($name_err) && empty($stat_err) && empty($hobi_err) && empty($umur_err) && empty($ttl_err)){
        
        $sql = "UPDATE datachar SET id_card=?, name=?, stat=?, hobi=?, umur=?, ttl=? WHERE id=?";

        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ssssssi",$param_id_card, $param_name, $param_stat, $param_hobi, $param_umur, $param_ttl, $param_id);

            // Set parameters
            $param_id_card = $id_card;
            $param_name = $name;
            $param_stat = $stat;
            $param_hobi = $hobi;
            $param_umur = $umur;
            $param_ttl = $ttl;
            $param_id = $id;


            
            if(mysqli_stmt_execute($stmt)){
                
                header("location: ../index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }

    }

    // Close connection
    mysqli_close($conn);
}
else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM datachar WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $id_card = $row["id_card"];
                    $name = $row["name"];
                    $stat = $row["stat"];
                    $hobi = $row["hobi"];
                    $umur = $row["umur"];
                    $ttl = $row["ttl"];
                } else{
                   
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
                 // Close statement
            mysqli_stmt_close($stmt);
        }
        
       
        
        // Close connection
        mysqli_close($conn);
    }  else{
        
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data <span class='glyphicon glyphicon-upload'></h2>
                    </div>
                    <p>Uwoogh update</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype='multipart/form-data'>
                        <div class="form-group <?php echo (!empty($id_card_err)) ? 'has-error' : ''; ?>">
                            <label>ID Card</label>
                            <input type="text" name="id_card" class="form-control" value="<?php echo $id_card; ?>">
                            <span class="help-block"><?php echo $id_card_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
                            <label>Stat</label>
                            <input type="text" name="stat" class="form-control" value="<?php echo $stat; ?>">
                            <span class="help-block"><?php echo $stat_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($hobi_err)) ? 'has-error' : ''; ?>">
                            <label>Hobby</label>
                            <input type="text" name="hobi" class="form-control" value="<?php echo $hobi; ?>">
                            <span class="help-block"><?php echo $hobi_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($umur_err)) ? 'has-error' : ''; ?>">
                            <label>Umur</label>
                            <input type="text" name="umur" class="form-control" value="<?php echo $umur; ?>">
                            <span class="help-block"><?php echo $umur_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ttl_err)) ? 'has-error' : ''; ?>">
                            <label>Tanggal Lahir</label>
                            <input type="text" name="ttl" class="form-control" value="<?php echo $ttl; ?>">
                            <span class="help-block"><?php echo $ttl_err;?></span>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="file" />
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>