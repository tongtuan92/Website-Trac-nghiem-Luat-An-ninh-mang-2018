<?php include 'admin/connect/db.php';
session_start();
?>
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
		a.logout{
			text-decoration: none;
			color: #fff;
		}
		a.logout:hover{
			color: #fff;
		}
		i{
			margin: auto;
			font-size: 30px !important;
			width: 4%;
			height: auto;
			text-align: center;
		}
		i:hover{
			background-color: rgba(12,0,3,0.2) !important;
			border-radius: 5px;
		}
		.x-shop-footer{
			font-size: 15px;
			text-indent: 20px;
		}
		span{
			width: 100%;
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
					<a style="text-transform: uppercase;font-weight: 500;" class="nav-link active" href="#">|Hệ thống câu hỏi trắc nghiệm tìm hiểu luật an ninh mạng năm 2019|</a>
					
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">TRANG CHỦ</a>
				</li>
				<li class="nav-item">
					<?php 
					if (isset($_SESSION['name'])) {
						$username=$_SESSION['name'];
						$sql_check = "SELECT * FROM user WHERE username='$username'";
						$kq_check = $conn->query($sql_check)->fetch();
					}
					?>
					<?php 
					if (isset($_SESSION['name'])&&$kq_check['count_test']>0) 
					{
						echo '
						<li class="nav-item">
						<a class="nav-link" href="print_results.php">KẾT QUẢ</a>
						</li>
						';
					}
					elseif(isset($_SESSION['name'])&&$kq_check['count_test']<=0)
					{
						echo '
						<li class="nav-item">
						<a class="nav-link" href="answer_question.php">VÀO THI</a>
						</li>
						';
					}
					else
					{
						echo '<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#myModal" href="#">VÀO THI</a></li>';
					}
					?>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="ranking.php">BẢNG XẾP HẠNG</a>
				</li>
				<?php 
				if (isset($_SESSION['name'])) {
					echo '
					<li class="nav-item">
					<button type="button" class="btn btn-danger">
					<a class="logout" href="admin/connect/logout.php">Đăng xuất</a>
					</button>
					</li>
					';
				}else{
					echo '<li class="nav-item"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					<a class="logout">Đăng nhập</a></button></li>';
				}
				?>
			</ul>
		</div>
	</div>
</nav><hr>
<div class="container">
	<!-- The Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">ĐĂNG NHẬP</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Tài khoản:</label>
							<input type="text" class="form-control" placeholder="Tài khoản" name="username" required>
						</div>
						<div class="form-group">
							<label>Mật khẩu:</label>
							<input type="password" class="form-control"  placeholder="Mật khẩu" name="password" required>
						</div>
						<div class="form-group form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="remember">Nhớ mật khẩu
							</label>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<input type="submit" class="form-control btn-success" name="submit" value="Đăng nhập">
							</div>
						</div>
						<button class="btn btn-primary"><a style="text-decoration: none;color: #fff" href="signup.php">Đăng ký</a></button>
						<button class="btn btn-primary"><a style="text-decoration: none;color: #fff" href="edit_pass.php">Đổi mật khẩu</a></button>
					</form>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM user WHERE username='$username'";
	$kq_login = $conn->query($sql)->fetch();
	if ($password==$kq_login['password']&&$username==$kq_login['username'])
	{
		if ($kq_login['status']==1&&$kq_login['rules']==0) {
			$_SESSION['name'] =$_POST['username'];
			$_SESSION['fullname'] =$kq_login['fullname'];
			echo "<script>
			window.location='index.php';
			</script>";
		}elseif ($kq_login['status']==1&&$kq_login['rules']==1) 
		{
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['fullname'] = $kq_login['fullname'];
			echo "<script>
			window.location='admin/manage/manage_user.php';
			</script>";
		}
		else{
			echo "<script>
			confirm('Tài khoản đang bị khóa');
			if(true){
				window.location='ranking.php';
			};
			</script>";
		}
	};
	if($username!=$kq_login['username']or$password!=$kq_login['password'])
	{
		echo "<script>
		confirm('Sai tên tài khoản hoặc mật khẩu');
		if(true){
			window.location='ranking.php';
		};
		</script>";
	};
}
?><br><hr><br>
<!-- MAIN -->
<div class="container">
	<div class="jumbotron">
  <h5>BẢNG XẾP HẠNG KẾT QUẢ TEST !</h5>
  <button class="btn btn-primary" type="button" disabled>
  Kết quả vừa được cập nhật
</button>
</div>
</div>
<div class="container">
	<table class="table table-bordered">
		<thead class="bg-info">
			<tr>
				<th>Rank</th>
				<th>Username</th>
				<th>Họ và tên</th>
				<th>Đơn vị công tác</th>
				<th>Điểm</th>
				<th>Đánh giá</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM user ORDER BY points DESC";
			$kq_q = $conn->query($sql);
			foreach ($kq_q as $key => $kq) {
				?>
				<tr <?php if ($kq['points']<7&&$kq['points']>0) {
					echo 'class="table-danger"';
				}elseif ($kq['points']==0&&$kq['count_test']==0) {
					echo 'class="table-primary"';
				}
				else{
					echo 'class="table-success"';
				} ?>>
				<td><?php echo ($key+1); ?></td>
				<td><?php echo $kq['username']; ?></td>
				<td><?php echo $kq['fullname']; ?></td>
				<td><?php echo $kq['class']; ?></td>
				<td><?php echo $kq['points']; ?>/15</td>
				<td><?php if ($kq['points']<7&&$kq['points']>0) {
					echo "<span class='badge badge-danger'>Không đạt</span>";
				}elseif ($kq['points']==0&&$kq['count_test']==0) {
					echo "<span class='badge badge-warning'>Chưa Test</span>";
				}
				else{
					echo "<span class='badge badge-primary'>Đạt</span>";
				};
				?></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
</div><br><hr>
<!-- FOOTER -->
<div class="container-fluid">
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