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
        <title>Điểm thi: <?php echo $hotenSV?></title>
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
					<a href="login.php" alt= "Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				</div>
            </div>
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                      <li><a href="ttsv.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="chitietsv.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a id="current"  href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
					  <li><a href="changepassword.php"><i class="fas fa-cog"></i>MẬT KHẨU</a></li>
					  <li><a href="tkbsv.php"><i class="fas fa-calendar"></i>Thời khóa biểu</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>ĐIỂM THI HỌC KÌ</h2><br>
			  <div id="listSV">
				

							  <table width = "70%">
								<tr>
									<th>Sinh viên</th>
									<th>Đại số</th>
									<th>Giải tích</th>
									<th>Toán rời rạc</th>
									<th>Lập trình C++</th>
									<th>Tích lũy</th>
								</tr>
							 
							<?php
								
                                        $query = 'SELECT * FROM sinhvien, diemthi WHERE sinhvien.MSV=diemthi.MSV and sinhvien.MSV = "'.$_SESSION['username'].'" ';
									
									
										$result = mysqli_query($link, $query);
										if(mysqli_num_rows($result) > 0){
											$i=0;
											while ($r = mysqli_fetch_assoc($result)){
												$MSV = $r['MSV'];
												$ten= $r['TENSV'];
												$ds=$r['ds'];
												$gt = $r['gt'];
												$trr = $r['trr'];
												$ltc = $r['ltc'];
												echo "<td>$ten</td>"	;
												echo "<td>$ds</td>";
												echo "<td>$gt</td>";	
												echo "<td>$trr</td>"	;
												echo "<td>$ltc</td>"	;
												$TBC = ( $ds + $gt + $trr + $ltc)/4;
												echo "<td>$TBC</td>";
												}
											}
									?>
							</table>
					  </div>
					
			  <br>
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