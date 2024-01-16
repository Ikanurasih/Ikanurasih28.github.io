<?php
include "lib/koneksi.php";
	include "lib/fungsi.php";
$uid_teman=$_POST['id_teman'];

$sql_cek_teman = mysql_query("SELECT * FROM user WHERE id_user='1' LIMIT 1"); 
while($row=mysql_fetch_array($sql_cek_teman)) { $arrayTeman = $row["array_teman"];}
$array_teman = explode(",", $arrayTeman); 
if ($arrayTeman != "") { 
  $arrayTeman = "$arrayTeman,$uid_teman"; 
} 
else { 
  $arrayTeman = "$uid_teman"; 
}

$UpdateArrayTeman = mysql_query("UPDATE user SET array_teman='$arrayTeman' WHERE id_user='1'");

?><script language="javascript">
			alert("Tambah Teman Berhasil");
			document.location="home.php";
			</script><?php 

?>
