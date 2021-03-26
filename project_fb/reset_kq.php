<?php 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		include 'admin/connect/db.php';
		session_start();
		if (isset($_SESSION['name'])) {
		$username = $_SESSION['name'];
		$sql="UPDATE user SET count_test=0,points=0 WHERE username='$username'";
		$kq = $conn->prepare($sql);
		if ($kq->execute()) {
			echo "<script>
					window.location='index.php';
			</script>";
		}else{
			echo "Lỗi không làm lại được ";
		};
	}
 ?>