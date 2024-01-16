<?php
if($_GET['aksi']=='status'){
	$status=$_POST['status'];
	$tanggal=$_POST['tanggal'];
	
	$query=mysql_query("insert into status values('','$id_user','$status','$tanggal','','')");
	
	if($query){
		header("Location:?hal=mulai&stat=Berhasil Input Status");
	}else{
		echo mysql_error();
	}
}

if($_GET['aksi']=='pesan'){
	$pesan=$_POST['pesan'];
	$tanggal=$_POST['tanggal'];
	$id_user=$_POST['id_user'];
	$id_teman=$_POST['id_teman'];
	
	$query=mysql_query("insert into pesan values('','$id_user','$id_teman','$pesan','$tanggal')");
	
	if($query){
		header("Location:?hal=mulai&id_user=$id_user&stat=Berhasil Input Pesan");
	}else{
		echo mysql_error();
	}
}

if($_GET['aksi']=='komentar'){
	$pesan=$_POST['pesan'];
	$tanggal=$_POST['tanggal'];
	$id_user=$_POST['id_user'];
	$id_teman=$_POST['id_teman'];
	
	$query=mysql_query("insert into komentar values('','$id_user','$id_teman','$pesan','$tanggal')");
	
	if($query){
		header("Location:?hal=form_photo&id_user=$id_user&stat=Berhasil Input Komentar");
	}else{
		echo mysql_error();
	}
}

if($_GET['aksi']=='teman'){
	$id_user=$_POST['id_user'];
	$id_teman=$_POST['id_teman'];
	
	$query_cek=mysql_query("select * from teman where id_user='$id_user' and id_teman='$id_teman'");
	$cek=mysql_num_rows($query_cek);
	
	if($cek==0){
	
		$query=mysql_query("insert into teman values('','$id_user','$id_teman','no')");
		
		if($query){
			header("Location:?hal=mulai&id_user=$id_teman&stat=Menunggu konfirmasi teman");
		}else{
			echo mysql_error();
		}
		
	}else{
		header("Location:?hal=mulai&id_user=$id_teman&stat=Harap bersabar, Sedang menunggu konfirmasi teman");
	}
	
}

if($_GET['aksi']=='konfirmasi'){
	$id_user=$_POST['id_user'];
	$id_teman=$_POST['id_teman'];
	
	
	$query_cek=mysql_query("select * from teman where id_user='$id_user' and id_teman='$id_teman'");
	$cek=mysql_num_rows($query_cek);
	
	if($cek){
		
		$query=mysql_query("update teman set konfirmasi='yes' where id_user='$id_user' and id_teman='$id_teman'");
		
		if($query){
			header("Location:?hal=teman&stat=Sudah dikonfirmasi");
		}else{
			echo mysql_error();
		}
		
	}else{
		echo mysql_error();
		//header("Location:?hal=teman&stat=Error");
	}
	
}
?>