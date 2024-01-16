<?php
	session_start();
	include "lib/koneksi.php";
	include "lib/fungsi.php";
	if(isset($_SESSION['user'])){
	
	if(isset($_GET['ser'])){
		$id_user=$_GET['user'];
	}
	
	if(empty($_GET['user'])){
		$id_user=$_SESSION['user'];
	}
	
	$query=mysql_fetch_array(mysql_query("select * from user where username='$_SESSION[user]'"));
	$nama_depan=$query['nama_depan'];
	$nama_belakang=$query['nama_belakang'];
	$foto=$query['foto'];
?>		
<html>
	<head>
		
		<title> IOCHAT </title>
		<link rel="stylesheet" href="public/css/style_home.css">
	</head>
<body>
<div id="luar">		
	<div id="header_home">
		<div id="kiri">
			<div class="chat"> FREECHATTING 
			<input type="text" name="search" value="" placeholder="Cari teman kamu">
			</div>
			
		</div>
		<div id="kanan">
			<div id="menu_atas">
				<a href="">Beranda</a>
				<a href="?hal=daftar-teman">Permintaan</a>
			</div>
			<div id="menu_atas_k">
				<a href="?hal=edituser_home&edit=<?php echo $_SESSION['user']?>" id="gambar_menu"><img src="galeri/<?php echo $foto;?>" width="40" height="38"></a>
				<a href="logout.php"><input type="submit" name="status" value="Logout" class="status"></a>		
			</div>
		</div>
	</div>
	<div id="inti">
		<div id="inti_kiri">
		<tr class="tr">
			<td><a href="" class="gambar_menu"><img src="galeri/<?php echo $foto;?>" width="95" height="100"></a></td>
			<td><div id="nama"><?php echo $nama_depan.'&nbsp;'.$nama_belakang;?></div>
				<a href="" class="nama">Sunting Profil</a></td>
				<?php
				// sunting profil sama dengan edit_profil
				?>
		</tr>
		<br>
		<br>
		<br>
		<div id="menu">
		<?php
		if(isset($_GET['user'])){
			if($_GET['user']!==$_SESSION['user']){
				?><li><a href="home.php=<?php if(isset($_GET['user'])){ 
					echo $_GET['user'];	
				}else{
					echo $_SESSION['user'];
				}?>">Dinding</a></li><?php
			}
		}
		?>
			<a href="home.php?hal=detail_profil&user=<?php if(isset($_GET['user'])){
				echo $_GET['user'];
				}else{
				echo $_SESSION['user'];
				}?>">Profil</a>
			<br>
			<a href="home.php?hal=teman&user=<?php if(isset($_GET['user'])){
				echo $_GET['user'];
				}else{
				echo $_SESSION['user'];
				}?>">Teman</a>
			<br>
			<a href="home.php=<?php if(isset($_GET['user'])){
				echo $_GET['user'];
				}else{
				echo $_SESSION['user'];
				}?>">Foto</a>
			<br>
		</div>
		</div>
		<div id="inti_kanan">
		<?php
			if(isset($_GET['hal']))
			{
				$hal=$_GET['hal'];
				require_once("".$hal.".php");
			}else{
				require_once("mulai.php");
			}
		?>
		</div>
	</div>

</div>

</body>
</html>
<?php
}
?>