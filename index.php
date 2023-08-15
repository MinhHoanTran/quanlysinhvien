<?php 
  session_start();
  if(isset($_SESSION['username'])){

    // echo $_SESSION['username'];
  $link = new mysqli('localhost','root','','webquanly');
  mysqli_query($link, 'SET NAMES UTF8');
  $query = 'SELECT * FROM tintuc';
  $result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PTIT - Trang chủ</title>
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
                      <li><a  id="current" href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="sinhvien.php" ><i class="fas fa-graduation-cap"></i>SINH VIÊN</a></li>
                      <li><a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i>GIẢNG VIÊN</a></li>
                      <li><a href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                  </ul>
          </br>
              </div>
        <div id="cthome">
			<div>
				
  <marquee  width="50%"  scrollamount=”2″ behavior=”slide” >
					<?php
						if(mysqli_num_rows($result)>0){
						$i = 0;
						while($r= mysqli_fetch_assoc($result)){
							$i++;
							$tin = $r['tin'];
							echo $tin ;
							}
						}
					?>
	</marquee> 
				<span>NEWS</span> 
			</div>
            <img src="image/ptitdep.jpg" width= "700px"> </br></br>
                     <a href="lop.php"><i class="fas fa-users"></i></a>
                    <a href="sinhvien.php"><i class="fas fa-graduation-cap"></i></a>
                    <a href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i></a>
                    <a href="diemthi.php"><i class="fas fa-check"></i></a>
        </div>
            </div>
        </div>
    </body>
</html>

<?php
  
}
else {
  header('location: login.php');
}
?>