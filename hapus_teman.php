<?php
include "lib/koneksi.php";
	include "lib/fungsi.php";
$uid_teman=$_POST['id_teman'];

$sql_cek_teman = mysql_query("SELECT * FROM user WHERE id_user='1' LIMIT 1") or die (mysql_error()); 
while($row=mysql_fetch_array($sql_cek_teman)) { 
  $arrayTeman = $row["array_teman"];
}
$array_teman = explode(",", $arrayTeman); 


foreach ($array_teman as $key => $value) {
  if ($value == $uid_teman) {
      unset($array_teman[$key]);
  } 
}

$array_teman_baru = implode(",", $array_teman);


$UpdateArrayTeman = mysql_query("UPDATE user SET array_teman='$array_teman_baru' WHERE id_user='1'");
?>

<script language="javascript">
			alert("Pertemanan sudah dihapus");
			document.location="home.php";
</script>
