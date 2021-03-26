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
	<button class="btn btn-success btn-small"><a class="btn_add" href="#">Quản lý thành viên</a></button>
</div><hr>
<div class="container">
	<?php 
	if (isset($_SESSION['alert_edit_user'])) {
		echo $_SESSION['alert_edit_user'];
		unset( $_SESSION['alert_edit_user']);
	};
	if (isset($_SESSION['alert_del_user'])) {
		echo $_SESSION['alert_del_user'];
		unset( $_SESSION['alert_del_user']);
	};
	?>
</div>
<div class="container">
	<div class="table-responsive">  
    <form method="POST" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Xuất Excel" />
    </form>
   </div>  
</div>
<div class="container">
	<table class="table table-bordered">
		<thead class="bg-primary">
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Username</th>
				<th scope="col">Họ và tên</th>
				<th scope="col">Email</th>
				<th scope="col">Đơn vị công tác</th>
				<th scope="col">Điểm</th>
				<th scope="col">Quyền hạn</th>
				<th scope="col">Trạng thái</th>
				<th scope="col">Sửa</th>
				<th scope="col">Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include '../connect/db.php';
			$sql ="SELECT * FROM user ORDER BY points DESC";
			$kq = $conn->query($sql);
			foreach ($kq as $key => $row) {
				?>
				<tr>
					<th scope="row"><?php echo ($key+1); ?></th>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo ($row['fullname']); ?></td>
					<td><?php echo ($row['email']); ?></td>
					<td><?php echo ($row['class']); ?></td>
					<td><?php echo ($row['points']); ?>/15</td>
					<td><?php 
						if ($row['rules']==1) {
							echo "<span class='badge badge-primary'>Quản trị viên</span>";
						}else{
							echo "<span class='badge badge-warning'>Thành viên</span>";
						}
						?></td>
					<td><?php 
						if ($row['status']==1) {
							echo "<span class='badge badge-success'>Đã kích hoạt</span>";
						}else{
							echo "<span class='badge badge-danger'>Vô hiệu hóa</span>";
						}
						?></td>
						<td><a href="../edit/edit_user.php?username=<?php echo $row['username'] ?>"><button style="width: 100%" class="btn btn-info">Sửa</button></a></td>
						<td><a href="../delete/delete.php?username=<?php echo $row['username'] ?>"><button style="width: 100%" class="btn btn-danger" onclick="return confirm('Bạn có thực sự muốn xóa?')">Xóa</button></a></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>