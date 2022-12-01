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
            echo "<script>window.location.href ='them.php'</script>";
        }
        else
        {
            echo "<script>alert('Sai Thong tin dang nhap');</script>" ;
        }
    }
?>