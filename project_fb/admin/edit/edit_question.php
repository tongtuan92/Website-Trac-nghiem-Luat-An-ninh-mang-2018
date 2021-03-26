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
			<a class="btn btn-primary" href="../manage/manage_question.php" role="button">Quay về trang quản trị</a>
		</div>
	</div>
	<div class="container">
		<form action=""	method="POST" enctype="multipart/form-data">
			<?php 
				if (isset($_GET['id_q'])) {
					$id_q=$_GET['id_q'];
					$sql_edit ="SELECT * FROM question_tab WHERE id_q=$id_q";
					$kq = $conn->query($sql_edit)->fetch();
				}
			 ?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Sửa câu hỏi</label>
				<div id="sample" class="col-sm-10"> 
					<textarea class="form-control" name="question">
						<?php echo $kq['question']; ?>
					</textarea>
				</div>
			</div>
			<br>
			<div class="form-group row">
				<div class="col-sm-12">
					<input type="submit" class="form-control btn-success" name="submit" value="Sửa">
				</div>
			</div>
		</form>
		<?php 
		if (isset($_POST['submit'])) {
			$question=$_POST['question'];
			$sql="UPDATE question_tab SET question='$question' WHERE id_q=$id_q";
			$kq_edit = $conn->prepare($sql);
			if ($kq_edit->execute()) {
				$_SESSION['alert_edit_q']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Sửa câu hỏi thành công !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				echo "<script>
				window.history.go(-2);
				</script>";
			}else{
				echo "Sửa thất bại";
			}
		}
		?>
	</div>
</body>
</html>
