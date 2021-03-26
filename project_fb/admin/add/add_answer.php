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
			<?php 
			if (isset($_GET['id_q'])) {
				$id_q=$_GET['id_q'];
				$sql = "SELECT * FROM question_tab WHERE id_q=$id_q";
				$kq = $conn->query($sql)->fetch();
			}
			?>
		</div>
	</div>
	<div class="container">
		<form action=""	method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Câu hỏi</label>
				<div id="sample" class="col-sm-10">
					
					<textarea class="form-control" name="question" id="area" style="width:70%;height:200px;">
						<?php echo $kq['question']; ?>
					</textarea>
				</div>
			</div><br>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Điền phương án </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="answer">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kiểm tra</label>
				<div class="col-sm-10">
					<select class="form-control" name="true_answer">
						<option>----Phương án đúng hay sai ??? - Nếu bạn không sẽ auto SAI ----</option>
						<option value="1" >Đúng</option>
						<option value="0" >Sai</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12">
					<input type="submit" class="form-control btn-primary" name="submit" value="Thêm">
				</div>
			</div>
		</form>
		<?php 
		if (isset($_POST['submit'])) {
			$answer=$_POST['answer'];
			$true_answer=$_POST['true_answer'];
			$sql="INSERT INTO answer_tab value('','$answer','$true_answer','$id_q')";
			$kq = $conn->exec($sql);
			if ($kq==1) {
				$_SESSION['alert_add']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Thêm phương án thành công !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				echo "<script>
				window.location='../manage/detail_question.php?id_q=$id_q';
				</script>";
			}else{
				echo "Thêm thất bại";
			}
		}
		?>
	</div>
</body>
</html>