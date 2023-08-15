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
				$lop=$row['lop'];
			}
		}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thời khóa biểu</title>
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
                      <li><a  href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="chitietsv.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
					  <li><a href="changepassword.php"><i class="fas fa-cog"></i>MẬT KHẨU</a></li>
					  <li><a id="current" href="tkbsv.php"><i class="fas fa-calendar"></i>Thời khóa biểu</a></li>
                  </ul>
              </div>
              <div id="main-contain"> 
			  <h2>DANH SÁCH LỚP </h2><br>
			  <div id="listSV">
			
							  <table width = "70%">
								<tr>
									<th></th>
									<th>Thứ 2</th>
									<th>Thứ 3</th>
									<th>Thứ 4</th>
									<th>Thứ 5</th>
									<th>Thứ 6</th>
									<th>Thứ 7</th>
									<th>Chủ Nhật</th>
								</tr>
							 
							<?php
								
								$query = "SELECT * FROM tkb where lop_id= '$lop'";
								$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($row = mysqli_fetch_assoc($result)){?>
									<?php	
										$T2 = explode(PHP_EOL,$row['T2']);
										$T3 = explode(PHP_EOL,$row['T3']);
										$T4 = explode(PHP_EOL,$row['T4']);
										$T5 = explode(PHP_EOL,$row['T5']);
										$T6 = explode(PHP_EOL,$row['T6']);
										$T7 = explode(PHP_EOL,$row['T7']);
										$CN = explode(PHP_EOL,$row['CN']);?>
										
										<tr>
										<td>Tiết 1</td>
										<td><?=$T2[0];?></td>
										<td><?=$T3[0];?></td>
										<td><?=$T4[0];?></td>
										<td><?=$T5[0];?></td>
										<td><?=$T6[0];?></td>
										<td><?=$T7[0];?></td>
										<td><?=$CN[0];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 2</td>	
										<td><?=$T2[1];?></td>
										<td><?=$T3[1];?></td>
										<td><?=$T4[1];?></td>
										<td><?=$T5[1];?></td>
										<td><?=$T6[1];?></td>
										<td><?=$T7[1];?></td>
										<td><?=$CN[1];?></td>
									  </tr>
									
									  <tr>
									  	<td>Tiết 3</td>	
										<td><?=$T2[2];?></td>
										<td><?=$T3[2];?></td>
										<td><?=$T4[2];?></td>
										<td><?=$T5[2];?></td>
										<td><?=$T6[2];?></td>
										<td><?=$T7[2];?></td>
										<td><?=$CN[2];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 4</td>	
										<td><?=$T2[3];?></td>
										<td><?=$T3[3];?></td>
										<td><?=$T4[3];?></td>
										<td><?=$T5[3];?></td>
										<td><?=$T6[3];?></td>
										<td><?=$T7[3];?></td>
										<td><?=$CN[3];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 5</td>	
										<td><?=$T2[4];?></td>
										<td><?=$T3[4];?></td>
										<td><?=$T4[4];?></td>
										<td><?=$T5[4];?></td>
										<td><?=$T6[4];?></td>
										<td><?=$T7[4];?></td>
										<td><?=$CN[4];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 6</td>	
										<td><?=$T2[5];?></td>
										<td><?=$T3[5];?></td>
										<td><?=$T4[5];?></td>
										<td><?=$T5[5];?></td>
										<td><?=$T6[5];?></td>
										<td><?=$T7[5];?></td>
										<td><?=$CN[5];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 7</td>	
										<td><?=$T2[6];?></td>
										<td><?=$T3[6];?></td>
										<td><?=$T4[6];?></td>
										<td><?=$T5[6];?></td>
										<td><?=$T6[6];?></td>
										<td><?=$T7[6];?></td>
										<td><?=$CN[6];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 8</td>	
										<td><?=$T2[7];?></td>
										<td><?=$T3[7];?></td>
										<td><?=$T4[7];?></td>
										<td><?=$T5[7];?></td>
										<td><?=$T6[7];?></td>
										<td><?=$T7[7];?></td>
										<td><?=$CN[7];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 9</td>	
										<td><?=$T2[8];?></td>
										<td><?=$T3[8];?></td>
										<td><?=$T4[8];?></td>
										<td><?=$T5[8];?></td>
										<td><?=$T6[8];?></td>
										<td><?=$T7[8];?></td>
										<td><?=$CN[8];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 10</td>	
										<td><?=$T2[9];?></td>
										<td><?=$T3[9];?></td>
										<td><?=$T4[9];?></td>
										<td><?=$T5[9];?></td>
										<td><?=$T6[9];?></td>
										<td><?=$T7[9];?></td>
										<td><?=$CN[9];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 11</td>	
										<td><?=$T2[10];?></td>
										<td><?=$T3[10];?></td>
										<td><?=$T4[10];?></td>
										<td><?=$T5[10];?></td>
										<td><?=$T6[10];?></td>
										<td><?=$T7[10];?></td>
										<td><?=$CN[10];?></td>
									  </tr>

									  <tr>
									  	<td>Tiết 12</td>	
										<td><?=$T2[11];?></td>
										<td><?=$T3[11];?></td>
										<td><?=$T4[11];?></td>
										<td><?=$T5[11];?></td>
										<td><?=$T6[11];?></td>
										<td><?=$T7[11];?></td>
										<td><?=$CN[11];?></td>
									  </tr>
							</table>
					  </div>
              </div>
            </div>
        </div>
       
    </body>
</html>
<?php
		}
	}
}
?>