Data Kamu
<?php
	//include "../lib/koneksi.php";
	//include "../lib/fungsi.php";
	
	if(isset($_GET['edit'])){
		$edit=isset($_GET['edit'])?$_GET['edit']:"";
		$query=query("select * from user where id_user='$_SESSION[user]'");
		while($hasil=fetch($query)){
			?>
				<form method="post" action="edituser.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Id User</td>
					<td>:</td>
					<td><input type="hidden" name="id" value="<?=$hasil['id_user']?>" required><?=$hasil['id_user']?></td>
				</tr>
				<tr>
					<td>Nama Depan</td>
					<td>:</td>
					<td><input type="text" name="depan" value="<?=$hasil['nama_depan']?>" required></td>
				</tr>
				<tr>
					<td>Nama Belakang</td>
					<td>:</td>
					<td><input type="text" name="belakang" value="<?=$hasil['nama_belakang']?>" required></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username" value="<?=$hasil['username']?>" required></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="text" name="password" value="<?=$hasil['password']?>" required></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><select name="jk" required>
						<?php
							$p="";
							$l="";
							$jk=$hasil['jk'];
							switch($jk){
								case 'l';
								$l="selected='selected'";
								break;
								case 'p':
								$p="selected='selected'";
								break;							
							}
						?>
						<option value="l" <?=$l?>>Laki-Laki</option>
						<option value="p" <?=$p?>>Perempuan</option>
					</td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><input type="date" name="tanggal" value="<?=$hasil['tanggal_lahir']?>" required></td>
				</tr>
				<tr>
				<tr>
					<td>Foto</td>
					<td>:</td>
					<td>
					<img src="../galeri/<?=$hasil['foto']?>" height="70" width="68"><br>
					<input type="file" name="foto" value="<?=$hasil['foto']?>" accept="image/*"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea name="alamat" rows="2" cols="16" value="<?=$hasil['alamat']?>"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="update" value="Update"></td>
				</tr>
			</table>
			</form>
			<?php
		}
	}
	if(isset($_POST['update'])){
		extract($_POST);
		$depan=ucwords($_POST['depan']);
		$belakang=ucwords($_POST['belakang']);
		$foto=$_FILES['foto']['name'];
		if(empty($foto)){
			$query=query("update user set nama_depan='$depan',nama_belakang='$belakang',username='$username',password='$password',jk='$jk',tanggal_lahir='$tanggal',alamat='$alamat' where id_user='$id'");
		}else if(!empty($foto)){
			move_uploaded_file($_FILES['foto']['tmp_name'],"../galeri/".$foto);
			$query=query("update user set nama_depan='$depan',nama_belakang='$belakang',username='$username',password='$password',jk='$jk',tanggal_lahir='$tanggal',foto='$foto',alamat='$alamat' where id_user='$id'");
		}
		if($query){
			alert('Terupdate', 'outputuser.php');
		}
	}
?>