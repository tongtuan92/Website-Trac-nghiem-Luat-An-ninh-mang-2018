<?php 
		try {
			$conn = new PDO("mysql:host=localhost;dbname=timhieul_thi_tn;charset=utf8","timhieul_root2","CANA123@123"
			);
		} catch (PDOException $e) {
			echo "Lỗi không thể kết nối";
		}
 ?>