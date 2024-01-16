<?php
	session_start();
	include "lib/koneksi.php";
	include "lib/fungsi.php";
?>
<html>
	<head>
		
		<title> IOCHAT </title>
		<link rel="stylesheet" href="public/css/style_coba.css">
	</head>
<body>
<div id="luar">
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
				<td><input type="text" name="user" value="" class="text" required></td>
				<td><input type="password" name="pass" value="" class="text" required></td>
				<td><input type="submit" name="masuk" value="Masuk" class="signin"></td>
			</tr>
		</form>
	</table>

		</div>
	</div>
	<div id="pusat">
		<?php
			if(isset($_GET['page']))
			{
				$hal=$_GET['page'];
				require_once("".$hal.".php");
			}else{
				require_once("form_daftar.php");
			}
		?>
	</div>
</div>
</body>
</html>