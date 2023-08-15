<?php
	
	session_start();
 	 if(isset($_SESSION['username'])){
		$link = new mysqli('localhost','root','','webquanly');
		mysqli_query($link, 'SET NAMES UTF8');
		$query = 'SELECT * FROM userlogin WHERE MSV = "'.$_SESSION['username'].'" '; 
		$result = mysqli_query($link, $query);
		if( mysqli_num_rows($result) > 0 ){
			$i = 0; 
			while($row= mysqli_fetch_assoc($result))
			{
				$MSVa = $row['MSV'];
                $hotenSV= $row['TENSV'];
			}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thay đổi mật khẩu</title>
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
                      <li><a href="ttsv.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lopsv.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="chitietsv.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangviensv.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthisv.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a id="current" href="changepassword.php"><i class="fas fa-cog"></i>MẬT KHẨU</a></li>
					  <li><a href="tkbsv.php"><i class="fas fa-calendar"></i>Thời khóa biểu</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Thay đổi mật khẩu</h2>
				
                <div class="form">
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Mật khẩu hiện tại </td>
								<td> <input type="password" name="old" value="">
								</td>
							</tr>
							<tr>
								<td>Mật khẩu mới </td>
								<td> <input type="password" name="new" value= "" > </td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="sua"/>
								</td>
							</tr>
						</table>
						
					</form>
					
					<?php
						
						if(isset($_POST['sua'])){
							if(empty($_POST['new']) or empty($_POST['old'])) {echo'</br> <p style="color:red;font-weight:bold; "> vui lòng không để trống các trường!</p> </br>';}
							else{
								$old = $_POST['old'];
								$new = $_POST['new'];
                                $query="SELECT * FROM userlogin where password = '$old'";
                                $result = mysqli_query($link, $query);
                                $num = mysqli_num_rows($result);
                                if($num==0)
                                    {
                                        echo'</br> <p style="color:red"> Mật khẩu không đúng ! </p>';
                                    }
                                else {
                                $query = "UPDATE `userlogin` SET password = '$new' WHERE MSV = '$MSVa'";
								mysqli_query($link, $query) or die("sửa không thành công");
								header('location:ttsv.php');
                        }
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
		header('location:../login.php');
	}
?>