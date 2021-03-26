<?php 
		include 'admin/connect/db.php';
		session_start();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$_SESSION['set_h']=date('H');
		$_SESSION['set_m']=date('i');
		$_SESSION['set_s']=date('s');
		echo "<script>
			window.location='answer_question.php';
			</script>";
 ?>