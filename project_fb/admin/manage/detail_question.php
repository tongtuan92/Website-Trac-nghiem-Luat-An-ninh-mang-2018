<?php 
session_start();
if ($_SESSION['name']=='') {
	header('Location: ../../index.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style type="text/css">
		.btn_add{
			color: #fff !important;
			text-decoration: none !important;
		}
		.nav-link{
			color: #343a40 !important;
		}
		.logout{
			color: #fff;
			text-decoration: none;
		}
		.quaylai{
			color: #fff;
			text-decoration: none !important;
		}
		.quaylai:hover{
			color: #fff;
		}
	</style>
</head>
<body><br>
	<div class="container">
		<div class="row container">
			<button type="button" class="btn btn-danger">
				<a class="logout" href="../connect/logout.php">Đăng xuất</a>
			</button>
		</div><br>
		<div class="alert alert-success" role="alert">
			Xin chào <strong><?php echo $_SESSION['fullname']; ?></strong> chúc bạn 1 ngày tốt lành !!!
		</div>
	</div>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container">
			<a class="navbar-branch" href="../../index.php">
				<img src="../../images/logo.jpg" height="50">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" 
			data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="../manage/manage_user.php">QUẢN LÝ THÀNH VIÊN</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../manage/manage_question.php">QUẢN LÝ CÂU HỎI</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../manage/manage_time.php">ĐẶT THỜI GIAN TEST</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<hr>
<div class="container">
	<button type="button" class="btn btn-info">
		<a class="quaylai" href="../manage/manage_question.php">Quay lại</a>
	</button>
</div><br>
<div class="container">
	<?php 
	include '../connect/db.php';
	if (isset($_GET['id_q'])) {
		$id_q=$_GET['id_q'];
		$sql ="SELECT * FROM question_tab WHERE id_q=$id_q";
		$kq = $conn->query($sql)->fetch();
	}
	?>
	<button class="btn btn-success"><a class="btn_add" href="../add/add_answer.php?id_q=<?php echo $kq['id_q']?>">Thêm phương án trả lời</a></button>
</div><hr>
<div class="container">
	<?php 
	if (isset($_SESSION['alert_success'])) {
		echo $_SESSION['alert_success'];
		unset( $_SESSION['alert_success']);
	};
	if (isset($_SESSION['alert_add'])) {
		echo $_SESSION['alert_add'];
		unset( $_SESSION['alert_add']);
	};
	if (isset($_SESSION['alert_del'])) {
		echo $_SESSION['alert_del'];
		unset( $_SESSION['alert_del']);
	};
	?>
</div>
<div class="container">
	<table class="table table-bordered">
		<thead class="bg-primary">
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Các phương án</th>
				<th scope="col">Loại phương án</th>
				<th scope="col">Sửa</th>
				<th scope="col">Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			
			if (isset($_GET['id_q'])) {
				$id_q=$_GET['id_q'];
				$sql ="SELECT *,answer_tab.id_a FROM answer_tab WHERE id_q=$id_q ORDER BY true_answer DESC";
				$kq = $conn->query($sql);
				foreach ($kq as $key => $row) {
					?>
					<tr>
						<th scope="row"><?php echo ($key+1); ?></th>
						<td><?php echo $row['answer']; ?></td>
						<td><?php 
						if ($row['true_answer']==1) {
							echo "<span class='badge badge-primary'>Đúng</span>";
						}else{
							echo "<span class='badge badge-danger'>Sai</span>";
						}
						?></td>
						<td><a href="../edit/edit_answer.php?id_a=<?php echo $row['id_a']?>"><button class="btn btn-info">Sửa</button></a></td>
						<td><a href="../delete/delete.php?id_a=<?php echo $row['id_a']?>"><button class="btn btn-danger" onclick="return confirm('Bạn có thực sự muốn xóa?')">Xóa</button></a></td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>
</div>
</body>
</html>