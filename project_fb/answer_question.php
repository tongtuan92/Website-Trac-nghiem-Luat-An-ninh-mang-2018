<?php include 'admin/connect/db.php';
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
	$get_h=$_SESSION['set_h'];
	$get_m=$_SESSION['set_m'];
	$get_s=$_SESSION['set_s'];
if ($_SESSION['name']=='') {
	header('Location: ../../index.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>THI</title>
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
			color: #fff !important;
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
	</style>
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container">
			<a class="navbar-branch" href="#">
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
					<div class="spinner-grow text-success" role="status">
						<span class="sr-only"></span>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#"><?php if (isset($_SESSION['name'])) {
						echo $_SESSION['name'];
					} ?></a>
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
					echo '<li class="nav-item"><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">
					<a class="login">Đăng nhập</a></button></li>';
				}
				?>
			</ul>
		</div>
	</div>
</nav><hr><br>
<!-- ---MAIN--- -->
<div class="container">
	<?php 
	$sql="SELECT * FROM set_time_down WHERE id=1";
	$kq=$conn->query($sql)->fetch();
	$test_time=$kq['set_time'];
	?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Bài thi bao gồm: </strong> 15 câu hỏi trả lời trong: <?php echo $test_time; ?> phút.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div><hr>
<!-- PHẦN CÂU HỎI THI -->
<div class="container">
	<div class="row">
		<!-- LEFT -->
		<div class="col-md-4">
			<!-- THÀNH VIÊN ONLINE -->
			<div class="user_online">
				<?php require 'block/users_online.php' ?>
			</div><br>
			<!-- THỜI GIAN CÒN LẠI -->
			<div class="time_down">
				<button type="button" class="btn btn-warning" id="demo">Thời gian đang được cập nhật</button>
								<script>
										<?php 								
												// 15 phútr
												if ($test_time==15) 
												{
													if ($get_m>45) {
														$set_h=$get_h+1;
														$set_m=15-(60-$get_m);
														$set_s=$get_s;
													}elseif ($get_m==45) {
														$set_h=$get_h+1;
														$set_m==0;
														$set_s=$get_s;
													}else{
														$set_h=$get_h;
														$set_m=$get_m+15;
														$set_s=$get_s;
													}
												};
												// 10 phút
												if ($test_time==10) 
												{
													if ($get_m>50) {
														$set_h=$get_h+1;
														$set_m=10-(60-$get_m);
														$set_s=$get_s;
													}elseif ($get_m==50) {
														$set_h=$get_h+1;
														$set_m==0;
														$set_s=$get_s;
													}else{
														$set_h=$get_h;
														$set_m=$get_m+10;
														$set_s=$get_s;
													}
												};
												// 5 phút
												if ($test_time==5) 
												{
													if ($get_m>55) {
														$set_h=$get_h+1;
														$set_m=5-(60-$get_m);
														$set_s=$get_s;
													}elseif ($get_m==55) {
														$set_h=$get_h+1;
														$set_m==0;
														$set_s=$get_s;
													}else{
														$set_h=$get_h;
														$set_m=$get_m+5;
														$set_s=$get_s;
													}
												};
										 ?>
											// Set the date we're counting down to
											var countDownDate = new Date("<?php echo date('M') ?> <?php echo date('d') ?>, <?php echo date('Y') ?> <?php echo $set_h ?>:<?php echo $set_m ?>:<?php echo $set_s ?>").getTime();

											// Update the count down every 1 second
											var x = setInterval(function() {

											  // Get today's date and time
											  var now = new Date().getTime();

											  // Find the distance between now and the count down date
											  var distance = countDownDate - now;

											  // Time calculations for days, hours, minutes and seconds
											  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
											  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
											  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
											  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

											  // Output the result in an element with id="demo"
											  document.getElementById("demo").innerHTML ="Còn lại: " + minutes + " phút " + seconds + " giây ";

											  // If the count down is over, write some text 
											  if (distance < 0) {
											  	clearInterval(x);
											  	document.getElementById("demo").innerHTML = "BẠN ĐÃ HẾT THỜI GIAN LÀM BÀI ! ";
											  	window.location='print_results.php';
											  }
											},100);
								</script>
				</div>
			</div>
			<!-- PHẦN LOAD CÂU HỎI THI -->
			<!-- RIGHT -->
			<div class="col-md-8">
				<?php 
								$sql = " SELECT COUNT(*) FROM question_tab";
								$kq = $conn->prepare($sql);
								$kq->execute();
								$number_of_rows = $kq->fetchColumn();
								$rann = rand(1,$number_of_rows);
				?>
				<p>Tổng số câu hỏi: 15 / <?php echo $number_of_rows; ?> câu hỏi.</p>
				<form action=""	method="POST" enctype="multipart/form-data">
					<div class="card" style="width: 100%">
						<div class="card-header">
							<?php 
									$sql = "SELECT DISTINCT * FROM question_tab ORDER BY RAND() LIMIT 1";
									$kq = $conn->query($sql)->fetch();
									$x=$kq['question'];
							 ?>
							<strong>* Nội dung câu hỏi: </strong><?php echo $kq['question'] ?>
						</div>
						<ul class="list-group list-group-flush" >
							<?php 
									$sql = "SELECT * FROM question_tab INNER JOIN answer_tab ON question_tab.id_q=answer_tab.id_q WHERE question='$x'";
									$kq = $conn->query($sql);
									foreach ($kq as $key => $row) {
										?>
										<li class="list-group-item"><input style="margin-right: 5px;" type="radio" name="answer" value="<?php echo $row['true_answer']?>" required="required"><?php echo $row['answer']?></li>
										<?php
									}
							 ?>
						</ul>
						</div><br>
						<input class="btn btn-primary" type="submit" name="finish" value="Kết thúc">
						<input class="btn btn-success" type="submit" name="next" value="Tiếp theo">
					</form>
					<!-- CHECK ĐÁP ÁN ĐÚNG HAY SAI -->
					<?php 
								// NẾU CHỌN NEXT
							if (isset($_POST['next'])) 
							{
								if(isset($_POST['answer'])&&isset($_SESSION['name']))
								{
										$username=$_SESSION['name'];
										$check_answer=$_POST['answer'];
										if ($check_answer==1) 
										{
											$sql = " UPDATE user SET points=points+1,count_test=count_test+1 WHERE username='$username'";
											$kq = $conn->prepare($sql)->execute();
										}
										else
										{
											$sql = " UPDATE user SET points=points+0,count_test=count_test+1 WHERE username='$username'";
											$kq = $conn->prepare($sql)->execute();
										}

								}
								else
									{ 
										echo "<span>Bạn chưa chọn phương án nào.</span>";
									};
									if (isset($_SESSION['name'])) {
					  						$username=$_SESSION['name'];
					  						$sql = "SELECT user.count_test FROM user WHERE username='$username'";
					  						$kq = $conn->query($sql)->fetch();
					  						if ($kq['count_test']==15) {
					  							echo "<script>						
												window.location='print_results.php';
												</script>";
							  						};
					  		};
							};
							// NẾU CHỌN KẾT THÚC
							if (isset($_POST['finish'])) 
							{
								if(isset($_POST['answer'])&&isset($_SESSION['name']))
								{
										$username=$_SESSION['name'];
										$check_answer=$_POST['answer'];
										if ($check_answer==1) 
										{
											$sql = " UPDATE user SET points=points+1,count_test=count_test+1 WHERE username='$username'";
											$kq = $conn->prepare($sql)->execute();
										}
										else
										{
											$sql = " UPDATE user SET points=points+0,count_test=count_test+1 WHERE username='$username'";
											$kq = $conn->prepare($sql)->execute();
										}

								}
								else
									{ 
										$sql = " UPDATE user SET points=points+0,count_test=count_test+1 WHERE username='$username'";
										$kq = $conn->prepare($sql)->execute();
									};
								echo "<script>						
										window.location='print_results.php';
									</script>";
							};
					?>
					<p> Bạn còn <?php
					if (isset($_SESSION['name'])) {
					  						$username=$_SESSION['name'];
					  						$sql = "SELECT user.count_test FROM user WHERE username='$username'";
					  						$kq = $conn->query($sql)->fetch();
					  					}
					 echo (15-$kq['count_test']); ?> câu hỏi. </p>
					  	<!-- PROGRESS -->
					  	<div class="progress">
						  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo (($kq['count_test']/15)*100) ; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
				</div>
			</div>

		</div>
<br>
		<!-- FOOTER -->
		<hr><div class="container">
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