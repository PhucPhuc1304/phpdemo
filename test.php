<!DOCTYPE html>
<?php
    include("connection.php");
?>
<html>
    <head>
        <script src="js/MaTT.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Javascript Example</title>
    </head>
    <body>
    <select class="form-select" onchange="GetTT()" id ='TT' name = 'TT' > 
            <?php
                
                        $sql = "Select TenTT  from TrungTamSatHach;";
                        $stmt = sqlsrv_query( $conn, $sql);
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                    {
                    ?>
                        <option value = "<?php echo($row['TenTT'])?>" >
                        <?php echo($row['TenTT']) ?>
                        </option>
                    <?php
                    }
            ?>
        </select> <br>
        <select class="form-select" id ='MaTT'>     
        </select> <br>
    </body>
    <script src="js/MaTT.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</html>