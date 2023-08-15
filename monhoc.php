<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','quanlyweb') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
?>

    <head>
        <meta charset="utf-8">
        <title>Giảng viên </title>
        <link rel="stylesheet" href="style/style.css">
         <link rel="stylesheet" href="style/fontawesome/css/all.css">
		 <link rel="shortcut icon" href="image/ptit.png">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="image/ptit.png " width="30px">
					  </div>
					<a href="index.php">STUDENT MANAGER</a>
				 </div>
				 <div id="accountName">
					
					<p> Xin chào ! </p>
					<a href="login.php" alt="Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				 </div>
            </div>
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="monhoc.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>
            	</div>
              <div id="main-contain"> 
			  <h2>ĐIỂM THI </h2>
				<div class= "chucnang">
						<div class="infGiangvien">
						<form id="formChucnang">
			        	    <a href="chucnang/mon.php" ><input  id="btnmon" type="button" value="Danh sách môn"> </a>
				        </form>
						<div>
							<b> Danh sách môn học </b> </br>
						</div>
					</div>
					<div class="infGiangvien">
                        <form id="formChucnang">
			        	    <a href="chucnang/themmon.php" ><input  id="btnThemmon" type="button" value="THÊM Môn"> </a>
				        </form>
						<div>
							<b> THÊM MÔN HỌC  </b> </br>
						</div>
					</div>
				</div>
				
              </div>
                    
            </div>
           
        </div>
    </body>
</html>
<?php
	}
	else 
	{
		 header('location: login.php');
	}
?>