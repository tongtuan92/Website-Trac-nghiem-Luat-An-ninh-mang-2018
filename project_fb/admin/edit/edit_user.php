<?php include '../connect/db.php' ?>
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
	<link rel="stylesheet" type="text/css" href="css/style-home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body><br>
<div class="container">
		<div class="jumbotron">
			<h1 class="display-4">Hello, chúc bạn một ngày tốt lành !!!</h1>
			<hr class="my-4">
			<a class="btn btn-primary" href="../manage/manage_user.php" role="button">Quay về trang quản trị</a>
		</div>
	</div>
<div class="container">
	<?php 
			if (isset($_GET['username'])) {
				$username=$_GET['username'];
				$sql = "SELECT * FROM user WHERE username='$username'";
				$kq = $conn->query($sql)->fetch();
			}
	 ?>
	<form action=""	method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tên đăng nhập</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="username" value="<?php echo $kq['username']?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Mật khẩu</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="password" value="<?php echo $kq['password']?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Họ và tên</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="fullname" value="<?php echo $kq['fullname']?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="email" value="<?php echo $kq['email']?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Đơn vị công tác</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="class" value="<?php echo $kq['class']?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Phân quyền</label>
			<div class="col-sm-10">
				<select class="form-control" name="rules">
					<option selected value="<?php echo $kq['rules']?>"><?php if($kq['rules']==1){echo "Quản trị viên";}else{echo "Thành viên";} ?></option>
					<option>---Phân quyền cho thành viên---</option>
					<option value="0">Thành viên</option>
					<option value="1">Quản trị viên</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Trạng thái</label>
			<div class="col-sm-10">
				<select class="form-control" name="status">
					<option selected value="<?php echo $kq['status']?>"><?php if($kq['status']==1){echo "Đã kích hoạt";}else{echo "Đang bị vô hiệu khóa";} ?></option>
					<option>---Trạng thái thành viên---</option>
					<option value="0">Vô hiệu hóa</option>
					<option value="1">Kích hoạt</option>
				</select>
			</div>
		</div>
		<br>
		<div class="form-group row">
			<div class="col-sm-12">
				<input type="submit" class="form-control btn-success" name="submit" value="Sửa thông tin">
			</div>
		</div>
	</form>
	<?php
	if (isset($_POST['submit'])) {
		$username=$_POST['username'];
		$password=$_POST['password'];
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$class=$_POST['class'];
		$rules=$_POST['rules'];
		$status=$_POST['status'];
		$sql_edit="UPDATE user SET username='$username',fullname='$fullname',password='$password',email='$email',class='$class',rules='$rules',status='$status' WHERE username='$username'";
		$kq_edit = $conn->prepare($sql_edit);
		if ($kq_edit->execute()) {
			$_SESSION['alert_edit_user']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Sủa thông tin thành viên thành công !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
			echo "<script>
			confirm('Tài khoản đã được cập nhật');
			if(true){
				window.location='../manage/manage_user.php';
			};
			</script>";
		}else{
			echo "Sửa thất bại";
		}
	}
	?>
</div>
</body>
</html>
