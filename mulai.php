<div id="status_atas">
	<div id="apa">
	<?php
	if(isset($_GET['user']) && isset($_GET['user'])!==""){
	
	$cek1=mysql_num_hasils(mysql_query("select * from teman where id_user='$_SESSION[id_user]' and id_teman='$_GET[id_user]' and konfirmasi='yes'"));
	$cek2=mysql_num_hasils(mysql_query("select * from teman where id_teman='$_SESSION[id_user]' and id_user='$_GET[id_user]' and konfirmasi='yes'"));
	
	if($cek1==0 && $cek2==0 && $_GET['user']!==$_SESSION['user']){
	?>
		<form action="?hal=proses&aksi=teman" method="post">
			<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>" />
			<input type="hidden" name="id_user" value="<?php echo $_SESSION['user']; ?>" />
			<input type="hidden" name="id_teman" value="<?php echo $_GET['user']; ?>" />
			
			<table align="center">
			<tr>
				<td><input type="submit" value="Jadikan Teman" onclick="return confirm('Apakah Anda yakin akan menjadi temannya?')"/></td>
			</tr>
			</table>
		</form>
	<?php
	}else{
		?>
		<form action="?hal=proses&aksi=pesan" method="post">
			<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>" />
			<input type="hidden" name="id_user" value="<?php echo $_GET['user']; ?>" />
			<input type="hidden" name="id_teman" value="<?php echo $_SESSION['user']; ?>" />
			
			<table align="center">
			<tr>
				<td><strong><font color="#666666">Pesan</font>&nbsp;</strong></td>
				<td><input type="text" name="pesan" size="50" /></td>
				<td><input type="submit" value="Kirim" /></td>
			</tr>
			</table>
		</form>
		<?php
	}
	}else{
	?>
	<form action="?hal=proses&aksi=status" method="post">
		<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>" />
		<table align="center">
		<tr>
			<td><strong><font color="#666666">Status</font>&nbsp;</strong></td>
			<td><input type="text" name="status" size="50" /></td>
			<td><input type="submit" value="Kirim" /></td>
		</tr>
		</table>
	</form>
	<?php
	}
	?>
	<p align="center"><?php if(isset($_GET['stat'])){ echo $_GET['stat'];}?></p>
	
	<?php 
	$view_pesan=mysql_query("select * from pesan where id_user='$id_user' order by id_pesan asc");

	while($hasil_pesan=mysql_fetch_array($view_pesan)){
		$id_teman=$hasil_pesan['id_teman'];
		$foto_teman=mysql_fetch_array(mysql_query("select * from user where id_user='$id_teman'"));
		?>
		<table width="100%" align="center" border="0">
		<tr>
			<td align="right" valign="top">
				  <p class="post-footer align-left"><a href="?hal=mulai&id_user=<?php echo $id_teman;?>" class="comments"><?php echo $foto_teman['nama_depan']."&nbsp;".$foto_teman['nama_belakang'];?></a> <span class="date"><?php echo $hasil_pesan['tanggal_pesan']; ?></span></p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				   <p><a href="?hal=profil&id_user=<?php echo $id_teman;?>"><img src="galeri/<?php echo $foto_teman['foto'];?>" style="border:none" width="77" height="83" alt="ri32" class="float-left" /></a><?php echo $hasil_pesan['isi_pesan'];?></p>
			</td>
		</tr>
		</table>
		<?php
	}
	?>
	
	<?php 
	$view=mysql_query("select * from status sta, user user where sta.id_user=user.id_user and sta.id_user='$id_user' order by id_status asc");

	while($hasil=mysql_fetch_array($view)){
		?>
		<table width="100%" align="center" border="0">
		<tr>
			<td align="right" valign="top">
				  <p class="post-footer align-left"><a href="?hal=profil&id_user=<?php echo $hasil['id_user'];?>" class="comments"><?php echo $hasil['nama_depan']."&nbsp;".$hasil['nama_belakang'];?></a> <span class="date"><?php echo $hasil['tanggal_status']; ?></span></p>
			</td>
		</tr>
		<tr>
			<td valign="top">
				   <p><a href="?hal=profil&id_user=<?php echo $hasil['id_user'];?>"><img src="./foto/<?php echo $hasil['foto'];?>" style="border:none" width="77" height="83" alt="ri32" class="float-left" /></a><?php echo $hasil['isi_status'];?></p>
			</td>
		</tr>
		</table>
		<?php
	}
	?>
		  
	<p>&nbsp;</p>
	</div>
</div>