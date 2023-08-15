<!DOCTYPE html>
<html>
<?php
	
	session_start();
 	 if(isset($_SESSION['username'])){
		$link = new mysqli('localhost','root','','webquanly');
		mysqli_query($link, 'SET NAMES UTF8');
		$query = 'SELECT * FROM sinhvien WHERE MSV = "'.$_SESSION['username'].'" '; 
		$result = mysqli_query($link, $query);
		if( mysqli_num_rows($result) > 0 ){
			$i = 0; 
			while($row= mysqli_fetch_assoc($result))
			{
				$hotenSV = $row['TENSV'];
			}
	}
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
					<a href="ttsv.php">Xin chào: <?php echo $hotenSV?></a>
				 </div>
				 <div id="accountName">
					
					<p> Đăng xuất ! </p>
					<a href="login.php" alt="Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				 </div>
            </div>
        </header>
        <!--endheader-->
        <div class="body">
			<div class ="ct"> 
						<div class="container"> 
							<div id="menu">
							<ul>
								  <li><a  href="ttsv.php"><i class="fas fa-home"></i>Trang chủ</a></li>
			                      <li><a href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
			                      <li><a href="chitietsv.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
			                      <li><a id = "current" href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
			                      <li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
								  <li><a href="changepassword.php"><i class="fas fa-cog"></i>MẬT KHẨU</a></li>
								  <li><a href="tkbsv.php"><i class="fas fa-calendar"></i>Thời khóa biểu</a></li>
							</ul>

							</div>
							<div id="main-contain"> 
							<h2>GIẢNG VIÊN KHOA </h2>
								
								
										<?php
                                                $query = 'SELECT * FROM giangvien '; 
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
														echo '<div class="infGiangvien">
																	<div>
																	<a href="thongtingvsv.php?id='.$maso.'"><img src="image/';
																	
																if ($avt == '') {
																	echo 'avtgv.jpg';
																}
																else{
																echo $avt;}

																echo '" width="120px" height = "120px">  </a>
																	</div>
																<div>
																';
															echo "<b>$hotenGV</b><br>";
															echo "<i><small>$maso</small></i><br>";
															echo "<i><small>$trinhdoGV</small></i><br>";
															echo "<i><small>Email: $email</small></i><br>";
															echo "</div>";
														echo "</div>";
													}
												}
										?>
							</div>
						</div>
					</div>
			</div>
    </body>
</html>
<?php
	}
	else{
		header('location:dangxuat.php');
	}
?>