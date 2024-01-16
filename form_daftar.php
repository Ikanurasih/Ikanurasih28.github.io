<div id="kiri-pusat">
	<br>
	<div id="tree"><img src="public/images/tree.png"></div>
</div>
<div id="kanan-pusat">
	<br>
	<br>
	<a>Mendaftar</a><br>
	<div class="a">Belum Punya Akun ? Daftar Dulu Dong</div><br>
	<form method="post" action="index.php">
		<table>
			<tr><input type="text" name="depan" value="" placeholder="Nama Depan" id="isi"></tr><br>
			<tr><input type="text" name="belakang" value="" placeholder="Nama Belakang" id="isi"></tr><br>
			<tr><input type="text" name="username" value="" placeholder="Email" id="isi"></tr><br>
			<tr><input type="password" name="password" value="" placeholder="Password" id="isi"></tr><br>
			<tr><input type="tanggal" name="tanggal" value="" placeholder="Tanggal Lahir" id="isi"></tr><br>
			<tr>
				<div  class="radio"><input type="radio" name="jk" value="l">Laki-Laki	 
				<input type="radio" name="jk" value="p">Perempuan </div>
			</tr>
		<br>
		<div class="catat">
		Dengan mengklik daftar, maka sesara ototmatis anda akan memiliki akun yang dapat digunakan untuk mengakses aplikasi ini.
		</div>
	<br>
		<tr><input type="submit" name="simpan" value="Daftar" class="daftar"></tr>
		</table>
	</form>
</div>
<?php
	
	if(isset($_POST['simpan'])){
		extract($_POST);
		$depan=ucwords($_POST['depan']);
		$belakang=ucwords($_POST['belakang']);
		$query=insert("user","id_user,nama_depan,nama_belakang,username,password,jk,tanggal_lahir","'$user','$depan','$belakang','$username','$password','$jk','$tanggal'");
		if($query){
			echo"
			<script>alert('Terdaftar');</script>
			";
		}
	}
?>