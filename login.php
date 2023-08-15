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
                    <h1 align="center">LOGIN</h1>
            </div>
        </header>
    <br><br>
        <div class="body">
            <div class="container"> 
                <div id="formlogin">
                    <form method="post" name="login-form">
                            <h3>Login System for admin</h3>
							<br>
                                <form>
			 						<a href="adminlogin.php"><input  id="btndangnhap" type="button" value="Admin"> </a>
			  					</form><br>
                                <form>
			 						<a href="userlogin.php"><input  id="btndangnhap" type="button" value="User"> </a>
			  					</form>
                </div>
            </div>
        </div>
    </body>
</html>