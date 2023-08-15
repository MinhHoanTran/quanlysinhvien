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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sinh viên: <?php echo $hotenSV; ?> </title>
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
			<div class="container"> 
				<div id="menu">
                  <ul>
                      <li><a  href="ttsv.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a id="current" href="chitietsv.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
					  <li><a href="changepassword.php"><i class="fas fa-cog"></i>MẬT KHẨU</a></li>
					  <li><a href="tkbsv.php"><i class="fas fa-calendar"></i>Thời khóa biểu</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>SINH VIÊN - Thông tin sinh viên</h2>
			  	<div id="thongtin">
			  			<div id="avtGiangvien">
			  				<?php 
			  						$link = new mysqli('localhost','root','','webquanly'); 
									mysqli_query($link, 'SET NAMES UTF8');
				  					$query = 'SELECT * FROM sinhvien where MSV = "'.$_SESSION['username'].'" '; 
									$result = mysqli_query($link, $query);
									if( mysqli_num_rows($result) > 0 )
										{
											$i = 0; 
											while($r= mysqli_fetch_assoc($result))
											{
												$i++;
												$masv=$r['MSV'];
												$ten= $r['TENSV'];
												$ngaysinhsql =$r['Date'];
												$ngaysinh = date("d-m-Y", strtotime($ngaysinhsql));
												$sdt = $r['Sdt'];
												$quequan = $r['quequan'];
												$avt = $r['avt'];
												$lop = $r['lop'];
											}
										}
																	
			  						echo '<img src= "image/avtsv.jpg" width="200px" height="200px">';
                                    echo " <br><b> ".$ten."</b>";
                                    echo "<br> MSSV: ".$masv;
			  				?>
			  				
			  			</div>
			  			<div id="chi_tiet">
			  				 <?php
		  						$link = new mysqli('localhost','root','','webquanly'); 
								$query = 'SELECT * FROM diemthi where MSV = "'.$_SESSION['username'].'" '; 
								$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										$sinhvienID = $r['MSV'];
										$diemthiID = $r['MSV'];
										$ten= $r['TENSV'];
										$ds=$r['ds'];
										$gt = $r['gt'];
										$trr = $r['trr'];
										$ltc = $r['ltc'];
										$TBC = ($ds + $gt +$trr + $ltc)/4;
								}
							}
			  				  echo "<big>Họ tên: ";
			  				  echo $ten. "</big>";
							  echo "<br>Lớp: " .$lop. "";
			  				  echo "<br>Ngày sinh: " .$ngaysinh. "<br>";
			  				  echo "Số điện thoại: " .$sdt . "<br>";
			  				  echo "Quê quán: " .$quequan . "<br>";
							  echo "Điểm tích lũy: " .$TBC. "<br>";
			  				?>
					<form>
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