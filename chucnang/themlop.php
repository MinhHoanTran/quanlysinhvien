<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','webquanly'); 
	mysqli_query($link, 'SET NAMES UTF8');			
?>
    <head>
        <meta charset="utf-8">
        <title>Lớp học</title>
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
                      <li><a id="current" href="../lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="../sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="../giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="../diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Thêm Lớp</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập thông tin lớp học : </b> </span> </br>
					(Chú ý điền đủ thông tin)
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Tên Lớp : </td>
								<td> <input type="text" name="ten"></td>
							</tr>
							<td>Chọn Giảng viên:  </td>
							<td> <select name="GVCN">
									 <?php
											 $q = "SELECT * FROM giangvien";
											 $rs = mysqli_query($link, $q);
											 if(mysqli_num_rows($rs)>0)
											 {
												 $i =0;
												 while ($row  = mysqli_fetch_assoc($rs))
												 {
													 $i++;
													 $TENGV = $row['TENGV'];
													 echo "<option value= '$TENGV'>$TENGV</option>";
												 }
											 }
									 ?>
									</select>
								<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="them"/>
								</td>
							</tr>
						</table>
						
					</form>
					
					
					
					<?php
						$link = new mysqli('localhost','root','','webquanly') or die('kết nối thất bại '); 
						mysqli_query($link, 'SET NAMES UTF8');
						
						if(isset($_POST['them'])){
							if(empty($_POST['ten']) or empty($_POST['GVCN'])) {echo'</br> <p style="color:red; "> Bạn chưa nhập thông tin đầy đủ ! </p> </br>';}
							else{
							$lop = $_POST['ten'];
							$GVchunhiem = $_POST['GVCN'];
							$query="SELECT * FROM lop where Tenlop = '$lop'";
							$result = mysqli_query($link, $query);
							$num = mysqli_num_rows($result);
							if($num==1)
								{
									echo'</br> <p style="color:red"> Tên lớp bị trùng, mời chọn lại Tên lớp ! </p>';
								}
							else{
							$query="SELECT * FROM lop where CN = '$GVchunhiem'";
							$result = mysqli_query($link, $query);
							$num = mysqli_num_rows($result);
							if($num==1)
								{
									echo'</br> <p style="color:red"> Giáo viên này đã chủ nhiệm lớp khác ! </p>';
								}
							else{
							$query = "INSERT INTO `lop`( lop_id, Tenlop, CN) VALUES('$lop', '$lop','$GVchunhiem')";
							mysqli_query($link,$query);
							$query = "INSERT INTO `tkb`( lop_id) VALUES('$lop')";
							mysqli_query($link,$query);
							header('location:../lop.php');
							}
							}
						}
					}
						
					?>
					<br>Chọn menu bên trái hoặc click vào <a href="../lop.php" style="color: blue; text-decoration:underline;font-weight:bold;">đây</a> để quay lại danh sách lớp.
					
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