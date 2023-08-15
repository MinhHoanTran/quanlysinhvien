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
        <title>Sinh viên</title>
        <link rel = "stylesheet" href = "../style/style.css">
        <link rel = "stylesheet" href = "../style/fontawesome/css/all.css">
		<link rel = "shortcut icon" href = "../image/ptit.png">
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
                     <li><a   href="../index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="../lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a id="current" href="../sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="../giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="../diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Thêm Sinh Viên</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập thông tin sinh viên : </b> </span> </br>
					(Chú ý điền đủ thông tin)
				
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Họ tên </td>
								<td> <input type="text" name="TENSV" autofocus></td>
							</tr>

                            <tr> 
								<td>Mã sinh viên </td>
								<td> <input type="text" name="MSV" autofocus></td>
							</tr>
							
							<tr>
								<td>Ngày sinh </td>
								<td> <input type="date" name="Date"></td>
							</tr>
							<tr>
								<td>Số điện thoại </td>
								<td> <input type="text" name="Sdt"></td>
							</tr>
							<tr>
								<td>Quê quán </td>
								<td> <input type="text" name="quequan"></td>
							</tr>
							<tr>
								<td>Chọn Lớp  </td>
								<td> <select name="lop">
									 <?php
											 $q = "SELECT * FROM lop";
											 $rs = mysqli_query($link, $q);
											 if(mysqli_num_rows($rs)>0)
											 {
												 $i =0;
												 while ($row  = mysqli_fetch_assoc($rs))
												 {
													 $i++;
													 $lopID = $row['lop_id'];
													 $tenlop = $row['Tenlop'];
													 echo "<option value= '$lopID'>$tenlop</option>";
												 }
											 }
									 ?>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="them"/>
								</td>
							</tr>
						</table>
						
					</form>
					
					
					
					<?php
					
						
						if(isset($_POST['them'])){
							if(empty($_POST['TENSV']) or empty($_POST['Date']) or empty($_POST['Sdt']) or empty($_POST['quequan']) or empty($_POST['MSV'])) {echo'<p style="color:red;font-weight:bold; "> Bạn chưa nhập thông tin đầy đủ !</p> ';}
							else
							{ 
								$hotenSV = $_POST['TENSV'];
                                $MSV = $_POST['MSV'];
								$ngaySinh = $_POST['Date'];
								$lopID = $_POST['lop'];
								$sDt = $_POST['Sdt'];
								$queQuan = $_POST['quequan'];
								$query="SELECT * FROM sinhvien where MSV = '$MSV'";
                                $result = mysqli_query($link, $query);
								$num = mysqli_num_rows($result);
                                if($num==1)
                                    {
                                        echo'</br> <p style="color:red"> Mã sinh viên bị trùng, mời chọn lại mã sinh viên ! </p>';
                                    }
								else{
								$sql="INSERT INTO sinhvien (MSV, TENSV, Date, Sdt, quequan, lop)
								VALUES ('$MSV', '$hotenSV', '$ngaySinh', '$sDt', '$queQuan',  '$lopID')";
								mysqli_query($link, $sql);
								$sql="INSERT INTO diemthi (MSV, TENSV)
								VALUES ('$MSV', '$hotenSV')";
								mysqli_query($link,$sql);
								$sql="INSERT INTO userlogin (MSV, TENSV, account, password)
								VALUES ('$MSV', '$hotenSV', '$MSV', '$MSV')";
								mysqli_query($link,$sql);
								header('location:../sinhvien.php');
							}
						}
					}
					?>
					<br>
					Chọn menu bên trái hoặc click vào <a href="../sinhvien.php" style="color: blue; text-decoration:underline; font-weight:bold;">đây</a> để quay lại danh sách sinh viên.
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