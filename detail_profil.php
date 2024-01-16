<?php
	if(isset($_GET['user'])){
		$user=isset($_GET['user'])?$_GET['user']:"";
		$query=mysql_query("select * from user where id_user='$user'");
		while($hasil=fetch($query)){
			?>
				<form method="post" action="detail_profil.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Id User</td>
					<td>:</td>
					<td><?=$hasil['id_user']?></td>
				</tr>
				<tr>
					<td>Nama Depan</td>
					<td>:</td>
					<td><?=$hasil['nama_depan']?></td>
				</tr>
				<tr>
					<td>Nama Belakang</td>
					<td>:</td>
					<td><?=$hasil['nama_belakang']?></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><?=$hasil['username']?></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><?=$hasil['password']?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?=$hasil['jk']?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?=$hasil['tanggal_lahir']?>></td>
				</tr>
				<tr>
				<tr>
					<td>Foto</td>
					<td>:</td>
					<td>
					<img src="../galeri/<?=$hasil['foto']?>" height="70" width="68"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?=$hasil['alamat']?></td>
				</tr>
			</table>
			</form>
			<?php
		}
	}
?>