<?php
	session_start();
	session_unset ();
	//unset($_SESSION['username']);
	//unset($_SESSION['password']);
			echo "
				<script>
						alert('Logout Sukses');
						location.href='index.php';
				</script>";
?>