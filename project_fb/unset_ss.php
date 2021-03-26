<?php 
		include 'admin/connect/db.php';
		session_start();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		if (isset($_SESSION['set_h'])) {
			unset($_SESSION['set_h']);
	 		unset($_SESSION['set_m']);
	 		unset($_SESSION['set_s']);
	 		echo "<script>
			window.location='print_results.php';
			</script>";
		}
 ?>