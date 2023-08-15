<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','webquanly'); 
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM sinhvien INNER JOIN diemthi ON sinhvien.MSV = diemthi.MSV WHERE sinhvien.MSV = "'.$_GET['id'].'"';
	
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result) > 0){
		$i=0;
			while ($r = mysqli_fetch_assoc($result)){
				$i++;
				$sinhvienID = $r['MSV'];
				$ten = $r['TENSV'];
				$ds=$r['ds'];
				$gt = $r['gt'];
				$trr = $r['trr'];
				$ltc = $r['ltc'];
				
			}
		}			
		
?>

    <head>
        <meta charset="utf-8">
        <title>Sinh viên</title>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="../image/ptit.png">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="../image/ptit.png " width="30px">
					  </div>
					<a href="../index.php">STUDENT MANAGER</a>
				 </div>
				<div id="accountName">
					
					<p> Đăng xuất ! </p>
					<a href="../login.php" alt="Đăng xuất"> <img src="../image/logout.png" width="25px"> </a>
				 </div>
            </div>
			
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                      <li><a  href="../index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="../lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="../sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="../giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a id="current" href="../diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Sửa điểm</h2>
				
				<div class="form">
					
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Họ tên </td>
								<td> <?php echo $ten;?>
									</td>
							</tr>
							
							<tr>
								<td>Đại số:  </td>
								<td> <input type="text" name="ds" value = "<?php echo $ds;?>"></td>
							</tr>
							<tr>
								<td>Giải tích: </td>
								<td> <input type="text" name="gt" value="<?php echo $gt;?>"></td>
							</tr>
							<tr>
								<td>Toán rời rạc: </td>
								<td> <input type="text" name="trr" value="<?php echo $trr;?>"></td>
							</tr>
							<tr>
								<td>Lập trình C++: </td>
								<td> <input type="text" name="ltc" value="<?php echo $ltc;?>"></td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="suadiem"/>
								</td>
							</tr>
						</table>
						
					</form>
					
					
					
					<?php
					
						
						if(isset($_POST['suadiem'])){
						
					
								$id = $_GET['id'];
								$ten = $_POST['ten'];
								$ds = $_POST['ds'];
								$gt = $_POST['gt'];
								$trr = $_POST['trr'];
								$ltc = $_POST['ltc'];
								$query = "UPDATE  diemthi SET ds = '$ds',  gt = '$gt',  trr ='$trr', ltc = '$ltc' WHERE MSV = '$id'";
								mysqli_query($link,$query);
								header('location:../diemthi.php');
						}
					?>
					<br>
					Chọn menu bên trái hoặc click vào <a href="../diemthi.php" style="color: blue; text-decoration:underline; font-weight:bold;">đây</a> để quay lại bảng điểm.
					<br>
					<br>
					
				
				</div>
				
              </div>
                    
            </div>
           
        </div>
    </body>
</html>
<?php 
	}
	else{
		header('location:../login.php');
	}
	
?>