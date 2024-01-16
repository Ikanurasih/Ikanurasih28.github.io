
<html>
<head>
<link href="public/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
$query = mysql_query("SELECT * FROM user WHERE id_user='1'");
$row=mysql_fetch_array($query);
?> 
<ul id="member">
<div class="user-title"> Daftar Teman <?php echo $row['nama_depan'] ; ?></div>
<?php

$query_teman = mysql_query("SELECT * FROM user WHERE id_user='1'");
while($row=mysql_fetch_array($query_teman)){
$array_teman = $row["array_teman"];

if ($array_teman  != "") { 

$arrayTeman = explode(",", $array_teman);

foreach ($arrayTeman as $key => $value){ 
		$sql_teman = mysql_query("SELECT *  FROM user WHERE id_user='$value' LIMIT 1") or die(mysql_error());
		while($row=mysql_fetch_array($sql_teman)){	
			$foto= "galeri/$row[foto]";

?>	
			<li id="list<?php echo $row['id_user']; ?>"> <img src="<?php echo $foto; ?> " width="75" height="75"/>
			<a href="#" class="user-title"><?php echo $row['nama_depan'];?> </a>
			<span class="add">
			   <form name="hapusteman" method="post" action="hapus_teman.php">
			   <input type="submit" class="greenButton" value="Hapus Teman" name="hapus_teman" />
			   <input type="hidden" name="id_teman" value="<?php echo $row['id_user']; ?>">
			   </form>	
      </span>
      </li>
      <?php
			}	
		}
	}		
  else { 
	?>
		<div class="user-title"> Belum memiliki Teman</div>
	<?php
	}
}
?>
<br>
<br>
<div class="user-title"><a href="?hal=teman_tunggu">Lihat Semua User</a> </div>
</ul>
</body>
</html>
