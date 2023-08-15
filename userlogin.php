<?php
session_start()
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Đăng nhập admin</title>
        <link rel="stylesheet" href="style/style.css">
		<link rel="shortcut icon" href="image/ptit.png">
    </head>
    <body>
        <header> 
            <div class="container"> 
                    <h1 align="center">User Login </h1>
            </div>
        </header>

		<br><br>
        <!--endheader-->
        <div class="body">
            <div class="container"> 
                <div id="formlogin">
                    <form method="post" name="login-form">
                            <h3>Login System for user</h3>
							<br>
								<table>
									<tr height="50px">
									   <td>
										   Account
									   </td>
									   <td>
										   <input type="text" name="taikhoan">
									   </td> 
									</tr>
									<tr>
										<td>
											Password
										</td>
										<td>
											<input id="submit" type="password" name="password">
										</td> 
									</tr>
								</table>
								<input id="btndangnhap" type="submit" name="login" value="Login">
					 </form>
					 <?php
									
									$link = new mysqli('localhost','root','','webquanly') or die('kết nối thất bại '); 
									mysqli_query($link, 'SET NAMES UTF8');
									if(isset($_POST['login'])){
										if ( empty($_POST['taikhoan']) or empty($_POST['password'])) { echo ' </br> <p style="color:red"> vui lòng nhập đầy đủ username và password !</p>';}
										else
										{
											$username= $_POST['taikhoan'];
											$password= $_POST['password'];
											$query="SELECT * FROM userlogin where account = '$username' and password = '$password'";
											$result = mysqli_query($link, $query);
											$num = mysqli_num_rows($result);
											if($num==0)
												{
													echo'</br> <p style="color:red"> Sai tên đăng nhập hoặc mật khẩu ! </p>';
												}
											else {

												$_SESSION['username']= $username;
												$id=$username;
												header('location:ttsv.php');
									}
								}
							}
					?>
                </div>
            </div>
        </div>
    </body>
</html>