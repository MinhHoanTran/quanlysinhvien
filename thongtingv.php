<?php
	session_start();
	if (isset($_SESSION['username'])){
		$link = new mysqli('localhost','root','','webquanly');
		mysqli_query($link, 'SET NAMES UTF8');
		$query = 'SELECT * FROM giangvien WHERE MGV = "'.$_GET['id'].'" '; 
		$result = mysqli_query($link, $query);
		if( mysqli_num_rows($result) > 0 )
		{
			$i = 0; 
			while($row= mysqli_fetch_assoc($result))
			{
				$hotenGV = $row['TENGV'];
			}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Giảng viên: <?php echo $hotenGV; ?> </title>
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
					
					<p> Đăng xuất ! </p>
					<a href="login.php" alt="Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				 </div>
            </div>
			
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                       <li><a  href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a id="current" href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>GIẢNG VIÊN - Thông tin giảng viên </h2>
			  	<div id="thongtin">
			  			<div id="avtGiangvien">
			  				<?php 
			  					$link = new mysqli('localhost','root','','webquanly') or die('kết nối thất bại '); 
								mysqli_query($link, 'SET NAMES UTF8');
								$query = 'SELECT * FROM giangvien WHERE MGV = "'.$_GET['id'].'" '; 
								$result = mysqli_query($link, $query);
								if( mysqli_num_rows($result) > 0 )
									{
										$i = 0; 
										while($row= mysqli_fetch_assoc($result))
										{
											$i++;
											$maso = $row['MGV'];
											$hotenGV = $row['TENGV'];
											$trinhdoGV = $row['Hocvi'];
											$email = $row['Email'];
											$sdt = $row['Sdt'];
											$avt = $row['link_avt_GV'];
										}
									}

								echo '<img src= "image/avtgv.jpg" width="200px" height="200px">';

			  					echo " <br><b> ".$hotenGV."</b>";
			  				?>
			  				
			  			</div>
			  			<div id="chi_tiet">
			  				 <?php
			  				  
			  				  echo "<big>".$hotenGV. "</big><br><br>";
			  				  echo $trinhdoGV . "<br>";
			  				  echo "MSGV: " .$maso . "<br>";
			  				  echo "Email: " .$email . "<br>";
			  				  echo "Điện thoại: " .$sdt. "";
			  				?>
			  			</div>
			  	</div>
				
              </div>
                    
            </div>
           
        </div>
    </body>
</html>
<?php
	}
	else {
		header('location:login.php');
	}
?>