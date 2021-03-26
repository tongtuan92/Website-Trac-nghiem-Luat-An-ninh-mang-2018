<?php include 'admin/connect/db.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
if ($_SESSION['name']=='') {
	header('Location:index.php');
};
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
		.nav-link .btn.btn-outline-dark:hover{
			background: rgba(0,0,0,.5) !important;
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
					<a class="nav-link active" href="index.php">TRANG CHỦ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ranking.php">BẢNG XẾP HẠNG</a>
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
				};
				?>
			</ul>
		</div>
	</div>
</nav><hr>
<div class="container">
	<?php 
	if (isset($_SESSION['name'])) {
		echo '<div class="spinner-grow text-success" role="status">
  <span class="sr-only">Loading...</span>
</div>'.$_SESSION['name'].'<hr>';
	}
	?>
</div>
<div class="container">
	<div class="alert alert-primary ">
  <h4 class="alert-heading">KẾT QUẢ BÀI THI!</h4>
  <hr>
  <p class="mb-0">Bạn vừa hoàn thành bài thi.</p>
</div>
</div>
<!-- MAIN -->
<div class="container">
	<table class="table table-bordered">
    <thead class="bg-info">
      <tr>
        <th>Username</th>
        <th>Họ và tên</th>
        <th>Đơn vị công tác</th>
        <th>Điểm</th>
        <th>Đánh giá</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    			$username = $_SESSION['name'];
    			$sql = "SELECT * FROM user WHERE username='$username'";
    			$kq = $conn->query($sql)->fetch();
    	 ?>
      <tr <?php if ($kq['points']<7) {
      	echo 'class="table-danger"';
      }else{
      	echo 'class="table-success"';
      } ?>>
        <td><?php echo $kq['username']; ?></td>
        <td><?php echo $kq['fullname']; ?></td>
         <td><?php echo $kq['class']; ?></td>
         <td><?php echo $kq['points']; ?>/15</td>
        <td><?php if ($kq['points']<7) {
        	echo "<span class='badge badge-danger'>Không đạt</span>";
        }else{
        	echo "<span class='badge badge-primary'>Đạt</span>";
        };
        ?></td>
      </tr>
    </tbody>
  </table>
</div><br><hr>
<!-- FOOTER -->
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