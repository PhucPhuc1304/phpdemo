<!doctype html>
<html lang="vi">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="https://file1.hutech.edu.vn/file/editor/homepage/stories/hinh34/logo%20CMYK-03.png">
    <link rel="stylesheet" href="./assets/css/common.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/content.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">

    <title>Hệ thống tra cứu giấy phép lái xe</title>
  </head>
  <body onload="zoom()">
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
                    <i class="ti ">Xin chào  <?= htmlspecialchars($_POST['user']) ?> </i>
                </div>
            </div>
        </div>
    
       
        <div class="col text-center">
        <br><br>
        <h2 class="search-heading">Quản lý thông tin giấy phép lái xe</h2>
        <br>
        <form name="them" action="them.php" method="post">
        <button class='btn btn-primary'id= 'add' name='add'>Thêm hồ sơ giấy phép lái xe</button>
        </form>
        <br><br>
        </div>
        <br>
        <table class="table table-striped">
        <thead>
           <tr>
               <th>Số CCCD</th>
               <th>Họ và tên</th>
               <th>Giới tính</th>
               <th>Mã GPLX</th>
               <th>Mã hạng</th>
               <th>Ngày sinh</th>
               <th>Ngày cấp</th>
               <th>Ngày hết hạn</th>
               <th>SĐT</th>
               <th>Địa chỉ</th>
               <th>Điểm lý thuyết</th>
               <th>Điểm thực hành</th>
               <th>Trung tâm</th>
               <th>Thao tac</th>
           </tr>
       </thead>
       <tbody>
       <?php
    include("connection.php");
    if(isset($_POST['submit_login']))
    {
        $unuser = $_POST['user'];
        $pass = $_POST['pass'];
        $sql = "select * from Account where username='$unuser' and password ='$pass'";
        $params = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $stmt = sqlsrv_query( $conn, $sql , $params, $options );
        $row_count = sqlsrv_num_rows( $stmt );   
        if ($row_count === 1)
        {
                $sql2 = "EXEC proc_HoSoGPLX";   
                if(($result2 = sqlsrv_query($conn,$sql2)) !== false)
                {
                    while( $obj = sqlsrv_fetch_object( $result2 )) 
                    {
                        echo "<tr>
                        <td>$obj->SoCCCD</td>
                        <td>$obj->Hoten</td>
                        <td>$obj->GioiTinh</td>
                        <td>$obj->MaGPLX</td>
                        <td>$obj->MaHang</td>
                        <td>$obj->NgaySinh</td>
                        <td>$obj->NgayCap</td>
                        <td>$obj->NgayHetHan</td>
                        <td>$obj->SDT</td>
                        <td>$obj->DiaChi</td>
                        <td>$obj->DiemLT</td>
                        <td>$obj->DiemTH</td>
                        <td>$obj->TenTT</td>
                        <td>
                        <a class='btn btn-danger btn-rounded'href = 'delete.php'>Delete</a>
                        <a class='btn btn-success btn-rounded' href='edit.php'>Edit</a>
                        </td>
                        </tr>";
                    }
                }
            }
            else
            {       
                echo "<script>alert('Sai Thong tin dang nhap');</script>" ;
                echo "<script>window.location.href ='index.php'</script>";
            }
        }
?> </tbody>
</table>    
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
    <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "75%" 
        }
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>