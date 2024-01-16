<html>
	<head>
		<title>Pertemanan</title>
	</head>
	<body>
	<form action="daftar.php" method="post" enctype="multipart/form-data">
	<table>
		<tr><input type="text" name="user" value="" required></tr><br>
		<tr><input type="text" name="depan" value="" required></td><br>
		</tr>
		<tr>
			<td>Nama Belakang</td>
			<td>:</td>
			<td><input type="text" name="belakang" value="" required></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" value="" required></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="text" name="password" value="" required></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><select name="jk" required>
				<option value="">- Jenis Kelamin -</option>
				<option value="p">Perempuan</option>
				<option value="l">Laki-Laki</option>
			</select></td>
		</tr>
		<tr>
			<td>Tanggal lahir</td>
			<td>:</td>
			<td><input type="date" name="tanggal" value="" required></td>
		</tr>
		<tr>
			<td>Foto</td>
			<td>:</td>
			<td><input type="file" name="foto" value="" required accept="image/*"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><textarea name="alamat" rows="2" cols="17" value="" required></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="simpan" value="Simpan"></td>
		</tr>
	</table>
	</form>
	</body>
</html>	
<?php
	include "../lib/koneksi.php";
	include "../lib/fungsi.php";
	
	if(isset($_POST['simpan'])){
		extract($_POST);
		$depan=ucwords($_POST['depan']);
		$belakang=ucwords($_POST['belakang']);
		$foto=$_FILES['foto']['name'];
		$query=insert("user","id_user,nama_depan,nama_belakang,username,password,jk,tanggal_lahir,foto,alamat","'$user','$depan','$belakang','$username','$password','$jk','$tanggal','$foto','$alamat'");
		move_uploaded_file($_FILES['foto']['tmp_name'],"../galeri/".$foto);
		if($query){
			alert('Tersimpan');
		}
	}
?>