<?php 
include '../connect/db.php';
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
	<button class="btn btn-info btn-small"><a class="btn_add" href="#">
		<?php 
				$sql = "SELECT * FROM set_time_down WHERE id=1";
				$kq = $conn->query($sql)->fetch();

				echo "Thời gian hiện tại: ". $kq['set_time']." phút";
	 ?>
	</a></button>
</div><hr>
<div class="container">
	<?php 
				$sql = "SELECT * FROM set_time_down WHERE id=1";
				$kq = $conn->query($sql)->fetch();
	 ?>
	<form action=""	method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Đặt thời gian</label>
			<div class="col-sm-10">
				<select class="form-control" name="set_time">
					<option selected value="<?php echo $kq['set_time']; ?>"> <?php echo $kq['set_time']; ?> phút</option>
					<option>---Đặt thời gian---</option>
					<option value="5">5 phút</option>
					<option value="10">10 phút</option>
					<option value="15">15 phút</option>
				</select>
			</div>
		</div>
		<br>
		<div class="form-group row">
			<div class="col-sm-12">
				<input type="submit" class="form-control btn-success" name="submit" value="Đặt lại thời gian">
			</div>
		</div>
	</form>
	<?php
	if (isset($_POST['submit'])) {
		$set_time=$_POST['set_time'];
		$sql_edit="UPDATE set_time_down SET set_time='$set_time' WHERE id=1";
		$kq_edit = $conn->prepare($sql_edit);
		if ($kq_edit->execute()) {
			echo "<script>
			confirm('Thời gian đã được cập nhật');
			if(true){
				window.location='../manage/manage_time.php';
			};
			</script>";
		}else{
			echo "Sửa thất bại";
		}
	}
	?>
</body>
</html>