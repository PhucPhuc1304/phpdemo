<!doctype html>
<?php
    include("connection.php");
    if(isset($_POST['submit']))
    {
        $MaGPLX = $_POST['MaGPLX'];
        $SoCMND = $_POST['SoCCCD'];
        $MaHang = $_POST['MaHang'];
        $NgayCap = $_POST['NgayCap'];
        $NgayHetHan = $_POST['NgayHetHan'];
        $ma = $_POST['MaTT'];
        $DiemLT = $_POST['DiemLT'];
        $DiemTH =$_POST['DiemTH'];

        $them = "insert into HoSoGPLX values('$MaGPLX','$SoCMND','$MaHang','$NgayCap','$NgayHetHan','$ma','$DiemLT','$DiemTH')";
        echo ($them);
        $kq = sqlsrv_query( $conn, $them);
        if(($kq)   !== false) 
        {
            echo "<script>alert('Them thong tin thanh cong');</script>" ;
            echo "<script>window.location.href ='login.php'</script>";
            
        }
        else
        {
            echo "<script>alert('Sai Thong tin dang nhap');</script>" ;
        }
    }
?>
<html lang="vi">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/common.css">    <link rel="icon" type="image/x-icon" href="https://file1.hutech.edu.vn/file/editor/homepage/stories/hinh34/logo%20CMYK-03.png">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/content.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <script src="js/CCCDChanged.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
    <title>Hệ thống tra cứu giấy phép lái xe</title>
  </head>
  <body>
  <body>
  <script src="js/CCCDChanged.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <div id="main">
        <div id="module-1" class="header">
            <div class="container">
                <div id="module-2" class="logo">
                    <a href="/" title="Trang chủ">     
                        <img class="logo-banner" src="./assets/img/logo.png" alt="Logo"> 
                    </a>
                </div>
                <div id="module-3" class="navigation">
                    <ul class="nav">
                        <li><a href="/">Trang Chủ</a></li>
                        <li><a href="#">Quản Lý Vi Phạm</a></li>
                    </ul>                
                    <i class="ti ti-unlock"></i>
                    <i class="ti ti-search"></i>
                </div>
            </div>
        </div>
    
        <div>
        <h1 class="search-heading"><center>­</center></h1>
        <h2 class="search-heading"><center>TRA CỨU THÔNG TIN GIẤY PHÉP LÁI XE</center></h2>
        </div>
        <form name="form1" action=""  method="post">
        <div class="container">
        <label >Số CMND:</label><br>
        <select class="form-select" onchange="CCCDChanged()" id="SoCCCD" name="SoCCCD"> 
            <option value="0">Chọn số CMND</option>
            <?php
                include("connection.php");
                    if( $conn === false ) 
                    {
                        die( print_r( sqlsrv_errors(), true));
                    }
                        $sql = "Select SoCCCD from LyLich;";
                        $stmt = sqlsrv_query( $conn, $sql);
                    if( $stmt === false ) 
                    {
                        die( print_r( sqlsrv_errors(), true));
                    }
                    if( sqlsrv_fetch( $stmt ) === false) 
                    {
                        die( print_r( sqlsrv_errors(), true));
                    }
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                    {
                    ?>
                        <option value = "<?php echo($row['SoCCCD'])?>" >
                        <?php echo($row['SoCCCD']) ?>
                        </option>
                    <?php
                    }
            ?>
        </select>     
        <label >Họ và tên:</label>
        <select id = 'test' class="form-select" disabled>
        </select>
        <label >Mã giấy phép lái xe :</label>
        <input type="text" class="form-control" id= 'MaGPLX' name = 'MaGPLX' aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        <label >Mã hạng :</label>
        <select class="form-select"  id="MaHang" name="MaHang"> 
            <option value="0">Please Select</option>
            <?php
                   
                        $sql = "Select MaHang  from HangGPLX;";
                        $stmt = sqlsrv_query( $conn, $sql);
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
                    {
                    ?>
                        <option value = "<?php echo($row['MaHang'])?>" >
                        <?php echo($row['MaHang']) ?>
                        </option>
                    <?php
                    }
            ?>
        </select>    
        <label>Ngày Cấp :</label>
        <input class="form-select" type="date" id="NgayCap" name="NgayCap">
        <label>Ngày hết hạn:</label>
        <input class="form-select" type="date" id="NgayHetHan" name="NgayHetHan">
        <label >Điểm lý thuyết :</label>
        <input type="text" class="form-control" id= 'DiemLT' name = 'DiemLT' aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        <label >Điểm thực hành :</label>
        <input type="text" class="form-control" id= 'DiemTH' name = 'DiemTH' aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        <label >Trung tâm sát hạch:</label>
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
        <select class="form-select" id ='MaTT' name ='MaTT'readonly>     
        </select> <br>

        <input class="btn btn-danger btn-rounded" type="submit" id="btn" value="Tra cứu" name = "submit"/></br></br>
        </form>

        </div>
    </div>
        <div id="module-6" class="footer">
            <div class="container">
                <div id="module-7" class="address-and-link">
                    <h4 class="address"><strong><a href="/">Trang Thông tin điện tử giấy phép lái xe</a></strong></h4>
                    <div class="link">
                        <i class="ti ti-facebook">
                            <span><a href="https://www.facebook.com/">Facebook</a></span>
                        </i>
                        <i class="ti ti-youtube">
                            <span><a href="https://www.youtube.com/">Youtube</a></span>
                        </i>
                        <i class="ti ti-github">
                            <span><a href="https://github.com/">Github</a></span>
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/CCCDChanged.js"></script>
    <script src="js/MaTT.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</html>