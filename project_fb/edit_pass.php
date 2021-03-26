<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
					<a class="nav-link" href="signup.php">ĐĂNG KÝ</a>
				</li>
			</ul>
		</div>
	</div>
</nav><hr>
<div class="container">
	<div class="jumbotron jumbotron">
		<div class="container">
			<h1 class="display-4">Đổi mật khẩu</h1>
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
				<input type="text" class="form-control" name="username" placeholder="Nhập vào username của bạn..." required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Email khôi phục</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="email" placeholder="Email khôi phục..." required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Mật khẩu cũ</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="password" placeholder="Mật khẩu cũ..." required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Mật khẩu mới</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="password_edit" placeholder="Mật khẩu mới..." required>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nhập lại mật khẩu mới</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="password_edit_check" placeholder="Nhập lại mật khẩu mới..." required>
			</div>
		</div>
		<br>
		<div class="form-group row">
			<div class="col-sm-12">
				<input type="submit" class="form-control btn-success" name="submit" value="Thay đổi">
			</div>
		</div>
	</form>
	<?php 
	include 'admin/connect/db.php';
	if (isset($_POST['submit'])) {
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password_edit=$_POST['password_edit'];
		$password_edit_check=$_POST['password_edit_check'];
		$sql_kt = "SELECT * FROM user WHERE username='$username'";
		$kq=$conn->query($sql_kt)->fetch();
		if ($kq['username']==$username && $kq['password']==$password) {
			if ($kq['email']!=$email) {
				echo "Email khôi phục không chính xác";
			}else{
				if ($password_edit!=$password_edit_check) {
					echo "Mật khẩu mới không trùng nhau";
				}else{
					$sql_ok="UPDATE user SET password='$password_edit' WHERE username='$username'";
					$kq_ok=$conn->prepare($sql_ok);
					if ($kq_ok->execute()) {
						echo "<script>
						confirm('Bạn đã đổi mật khẩu thành công !');
						if(true){
							window.location='index.php';
						};
						</script>";
					}else{
						echo "Đổi mật khẩu thất bại";
					}
				}
			}
		}else{
			echo "Tên tài khoản hoặc mật khẩu không chính xác";
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