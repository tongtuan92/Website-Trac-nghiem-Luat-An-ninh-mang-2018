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
		</div>
	</div>
	<div class="container">
		<form action=""	method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Câu hỏi</label>
				<div id="sample" class="col-sm-10">
					<h4>Vui lòng nhập câu hỏi</h4>  
					<textarea class="form-control" name="question" id="area" style="width:70%;height:200px;">
					</textarea>
				</div>
			</div><br>
			<div class="form-group row">
				<div class="col-sm-12">
					<input type="submit" class="form-control btn-success" name="submit" value="Thêm">
				</div>
			</div>
		</form>
		<?php 
		if (isset($_POST['submit'])) {
			$question=$_POST['question'];
			$sql="INSERT INTO question_tab value('','$question')";
			$kq = $conn->exec($sql);
			if ($kq==1) {
				$_SESSION['alert_add_q']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Thêm câu hỏi thành công !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				echo "<script>
				window.location='../manage/manage_question.php';
				</script>";
			}else{
				echo "Thêm thất bại";
			}
		}
		?>
	</div>
</body>
</html>