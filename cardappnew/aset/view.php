<?php
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // connect database
    require_once "conn.php";
    
    
    $sql = "SELECT * FROM datachar WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                
                $datachar = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                
                $id_card = $datachar["id_card"];
                $name = $datachar["name"];
                $stat = $datachar["stat"];
                $hobi = $datachar["hobi"];
                $umur = $datachar["umur"];
                $ttl = $datachar["ttl"];
                $file = $datachar["file"];

                
            } 
        } else{
            echo "Terjadi Kesalahan cuy";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($conn);
} else{
   
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Card</title>
  <link rel="stylesheet" href="./css/Profile-card.css" />
  <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
    <!--<style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>-->
</head>
<body>
<div class="container">
    <div id="card">
        <!-- id -->
        <p class="id fontge1" id="id_card">
            <span>ID</span>
            <?php echo $datachar["id_card"]; ?>
        </p>
        <!-- foto -->
        <img src="../image/<?php echo $datachar["file"]; ?>" alt="img"/>
        <!-- nama -->
        <h2 class="nama fontge" id="name"><?php echo $datachar["name"]; ?></h2>
        <!-- status -->
        <div class="status fontge">
            <span id="stat"><?php echo $datachar["stat"]; ?></span>
        </div>
        <!-- Hobi, Umur, TTL -->
        <div class="info">
            <div>
                <h3 class="fontge" id="hobi"><?php echo $datachar["hobi"]; ?></h3>
                <p class="fontge1">HOBBY</p>
            </div>
            <div>
                <h3 class="fontge" id="umur"><?php echo $datachar["umur"]; ?></h3>
                <p class="fontge1">AGE</p>
            </div>
            <div>
                <h3 class="fontge" id="ttl"><?php echo $datachar["ttl"]; ?></h3>
                <p class="fontge1">BORN</p>
            </div>
        </div>
    </div>
    <div class="info">
        <button id="demo" class="downloadtable btn btn-primary"> Download Id Card</button>
        <script src="./js/html2canvas.min.js"></script>
        <script>
            document.getElementById("demo").onclick = function(){
                const screenshootTarget = document.getElementById('card');

                html2canvas(screenshootTarget).then((canvas) => {
                    const base64image = canvas.toDataURL("image/png");
                    var anchor = document.createElement('a');
                    anchor.setAttribute("href", base64image);
                    anchor.setAttribute("download", "my-image.png");
                    anchor.click();
                    anchor.remove();
                })
            }
        </script>
        <p><a href="card.php" style="text-decoration:none" class="btn btn-primary status1 fontge1">Back</a></p>
    </div>
</div>
</body>
</html>