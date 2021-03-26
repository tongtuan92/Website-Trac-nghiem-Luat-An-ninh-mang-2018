<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style type="text/css">
		a{
			color: #fff;
			text-decoration: none !important;
		}
		a:hover{
			color: #fff;
		}
	</style>
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container">
			<a class="navbar-branch" href="index.php">
				<img src="images/logo.jpg" height="50">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" 
			data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a style="text-transform: uppercase;font-weight: 500;" class="nav-link active" href="#">| Hệ thống câu hỏi trắc nghiệm tìm hiểu luật an ninh mạng năm 2019 |</a>
					
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="index.php">TRANG CHỦ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ranking.php">BẢNG XẾP HẠNG</a>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-info">
						<a href="edit_pass.php">ĐỔI MẬT KHẨU</a></button>
					</li>
				</ul>
			</div>
		</div>
	</nav><hr>
	<div class="container">
		<div class="jumbotron jumbotron">
			<div class="container">
				<h1 class="display-4">Đăng ký thành viên</h1>
			</div>
		</div>
	</div>
	<hr>
	<!-- MAIN --><br>
	<div class="container">
		<form action=""	method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tên đăng nhập</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" placeholder="Nhập vào username của bạn" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mật khẩu</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Họ và tên</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="fullname" placeholder="Họ và tên" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Đơn vị công tác</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="class" placeholder="Đơn vị hiện đang công tác" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<input type="hidden" class="form-control" name="count_test" value="0">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<input type="hidden" class="form-control" name="points" value="0">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<input type="hidden" class="form-control" name="rules" value="0">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<input type="hidden" class="form-control" name="status" value="1">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12">
					<input type="submit" class="form-control btn-success" name="submit" value="Đăng ký">
				</div>
			</div>
		</form>
		<?php
		include 'admin/connect/db.php';
		if (isset($_POST['submit'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$fullname=$_POST['fullname'];
			$email=$_POST['email'];
			$class=$_POST['class'];
			$count_test=$_POST['count_test'];
			$points=$_POST['points'];
			$rules=$_POST['rules'];
			$status=$_POST['status'];
			$sql="INSERT INTO user value('$username','$password','$fullname','$email','$class','$count_test','$points','$rules','$status')";
			$kq = $conn->exec($sql);
			if ($kq==1) {
				$username=$_SESSION['name'];
				$_SESSION['signup_success']='<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Chúc mừng!</strong> bạn đã đăng ký thành công.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				echo "<script>
				window.location='index.php';
				</script>";
			}else{
				echo "Đăng ký thất bại";
			}
		}
		?>
	</div>
	<!-- FOOTER --><hr>
<div class="container">
	<br><div class="mxh">
		<div class="container">
			<div class="row">
				<i class="fa fa-facebook"></i>
				<i class="fa fa-twitter"></i>
				<i class="fa fa-google-plus"></i>
				<i class="fa fa-instagram"></i>
				<i class="fa fa-youtube"></i>
			</div>
		</div>
	</div>
</div><br><hr>
</body>
</html>