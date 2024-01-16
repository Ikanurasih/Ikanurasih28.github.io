
<html>
<head>
<title>Sistem Pertemanan</title>
<link href="public/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<ul id="member">
<div class="user-title">Daftar Seluruh Teman</div>
<?php 

$query_user = mysql_query("SELECT * FROM user where id_user!='1'");
while($row=mysql_fetch_array($query_user)) {
			$id_user=$row['id_user'];
			$foto= "galeri/$row[foto]";

?>	
			<li id="list<?php echo $row['id_user']; ?>"> <img src="<?php echo $foto; ?> " width="75" height="75"/>
			<a href="#" class="user-title"><?php echo $row['nama_depan'];?> </a>
			<?php 
			$sql_cek_teman = mysql_query("SELECT * FROM user WHERE id_user='1' LIMIT 1"); 
			while($row=mysql_fetch_array($sql_cek_teman)) { 
          $arrayTeman = $row["array_teman"];
      }
			
			$array_teman = explode(",", $arrayTeman); 
			if (in_array($id_user, $array_teman)) { 
			?>
      <span class="add">
			<div class="user-title">Sudah menjadi teman Anda</div>
			</span>
			</li>
			<?php 
			}
			else{
			?>
			
			<span class="add">
			<form name="tambahteman" method="post" action="simpan_teman.php">
			<input type="submit" class="greenButton" value="Tambah Teman" name="tambah_teman" />
			<input type="hidden" name="id_teman" value="<?php echo $id_user; ?>">
			</form>
			</span>
			</li>
			<?php
			}
}		
?>
</ul>
</body>
</html>
