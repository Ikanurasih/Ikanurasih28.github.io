<?php
	session_start();
	include "lib/koneksi.php";
	include "lib/fungsi.php";
?>	
<html>
	<head>
		<meta http-equiv=refresh content=8; url=index.php>
		<title> IOCHAT </title>
		<link rel="stylesheet" href="public/css/style.css">
	</head>
<body>
	<div id="header">
		<div id="kiri">
			<div class="chat"> FREECHATTING </div>
		</div>
		<div id="kanan">
		<table>	
		<form action="masuk.php" method="post">
			<tr class="tr">
				<td> Email</td>
				<td> Password</td>
				<td></td>
			</tr>
			<tr>
				<td><input type="text" name="user" value="" class="text"></td>
				<td><input type="password" name="pass" value="" class="text"></td>
				<td><input type="submit" name="masuk" value="Masuk" class="signin"></td>
			</tr>
		</form>
		</table>	
		</div>
	</div>	
	<?php
	if(isset($_POST['masuk'])){
		extract($_POST);
		$query=mysql_query("select * from user where username='$user' and password='$pass'") or die(mysql_error());
		if($query){
			while($hasil=fetch($query)){
				$_SESSION['user']=$hasil['username'];
				?>
				<script>
					location.href="home.php";
				</script>
				<?php
			}
			?>
	<blockquote>
	  <p></p>
	  <p><font color="#FF0000" size="6">Username atau Password anda salah!!</font> silahkan ulangi Login</p>
	  <p><font color="#1410b1" size="4"> Anda Ingin Membuat Akun Baru ?? </font> <a href="index.php">Ya</a> / 
	  <a href="">Tidak</a>
	  </p>
	</blockquote>
			<?php
		}else{
			?>
			<blockquote>
	  <p></p>
	  <p><font color="#FF0000">Username atau Password anda salah!!</font>. silahkan ulangi Login</p>
	  <p></p>
	</blockquote>
			<?php
		}
	}
?>
</body>
</html>