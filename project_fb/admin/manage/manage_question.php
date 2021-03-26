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
		a{
			color: #fff;
		}
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
	<button class="btn btn-success btn-small"><a class="btn_add" href="../add/add_question.php">Thêm câu hỏi</a></button>
</div><hr>
<div class="container">
	<div class="search-products">
					<div class="search-pro">
						<button type="button" class="btn btn-outline-info">&ensp;TÌM KIẾM</button><br>
						<input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm theo tên câu hỏi...">
						<br><br>
						<!-- search -->
						<script>
							$(document).ready(function(){
								$("#myInput").on("keyup", function() {
									var value = $(this).val().toLowerCase();
									$("#myList tr").filter(function() {
										$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
									});
								});
							});
						</script>
						<!-- close -->
					</div>
				</div>
</div><hr>
<div class="container">
	<?php 
	if (isset($_SESSION['alert_edit_q'])) {
		echo $_SESSION['alert_edit_q'];
		unset( $_SESSION['alert_edit_q']);
	};
	if (isset($_SESSION['alert_add_q'])) {
		echo $_SESSION['alert_add_q'];
		unset( $_SESSION['alert_add_q']);
	};
	if (isset($_SESSION['alert_del_q'])) {
		echo $_SESSION['alert_del_q'];
		unset( $_SESSION['alert_del_q']);
	};
	?>
</div>
<div class="container">
	<table class="table table-bordered">
		<thead class="bg-primary">
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Câu hỏi</th>
				<th style="width: 120px;" scope="col">Chi tiết</th>
				<th scope="col">Sửa</th>
				<th scope="col">Xóa</th>
			</tr>
		</thead>
		<tbody id="myList" style="font-size: 0.9rem">
			<?php 
			include '../connect/db.php';

			$so_cau_hoi_1trang = 10;
			$page = !empty($_GET['page'])?$_GET['page']:1;
			$so_offset = ($page-1) * $so_cau_hoi_1trang;
			// tong so cau hoi
			$total = " SELECT COUNT(*) FROM question_tab";
								$kq_total = $conn->prepare($total);
								$kq_total->execute();
								$number_of_rows = $kq_total->fetchColumn();
								// ----
			$total_page = ceil($number_of_rows/$so_cau_hoi_1trang);
			$sql="SELECT * FROM question_tab ORDER BY id_q ASC LIMIT 10 OFFSET $so_offset";
			$kq = $conn->query($sql);
			foreach ($kq as $key => $row) {
				?>
				<tr>
					<th scope="row"><?php echo ($key+1); ?></th>
					<td><?php echo $row['question']; ?></td>
					<!--  -->
					<td><a href="../manage/detail_question.php?id_q=<?php echo $row['id_q']?>"><button class="btn btn-success">CHI TIẾT</button></a></td>
					<td><a href="../edit/edit_question.php?id_q=<?php echo $row['id_q']?>"><button class="btn btn-info">Sửa</button></a></td>
					<td><a href="../delete/delete.php?id_q=<?php echo $row['id_q']?>"><button class="btn btn-danger" onclick="return confirm('Bạn có thực sự muốn xóa?')">Xóa</button></a></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div><hr>
	<div style="margin-left: 40%" class="container">
		<?php include 'page.php' ?>
	</div><br>
</body>
</html>