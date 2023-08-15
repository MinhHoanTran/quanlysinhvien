<?php
	$link = new mysqli('localhost','root','','webquanly'); 
	mysqli_query($link, 'SET NAMES UTF8');
						
	if(isset($_GET['id'])){
	$idlop = $_GET['id'];

	$query = "DELETE FROM `lop` WHERE lop_id='$idlop'";
	mysqli_query($link,$query);
    header('location:../lop.php');
						}
?>