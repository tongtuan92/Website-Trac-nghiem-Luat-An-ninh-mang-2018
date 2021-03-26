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
				<label class="col-sm-2 col-form-label">Phương án trả lời</label>
				<div id="sample" class="col-sm-10">
					 <?php 
					if (isset($_GET['id_a'])) {
						$id_a=$_GET['id_a'];
						$sql = "SELECT * FROM answer_tab WHERE id_a=$id_a";
						$kq = $conn->query($sql)->fetch();
					}
					?>
					<textarea class="form-control" name="answer">
						<?php echo $kq['answer']; ?>
					</textarea>
				</div>
			</div><br>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Loại phương án </label>
				<div class="col-sm-10">
					<select class="form-control" name="true_answer">
						<option value="<?php echo $row['true_answer'] ?>" selected>
							<?php if ($kq['true_answer']==1) {
								echo "Đúng";
							}else{
								echo "Sai";
							} ?>
						</option>
						<option>----Chọn loại phương án phù hợp----</option>
						<option value="0">Sai</option>
						<option value="1">Đúng</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12">
					<input type="submit" class="form-control btn-success" name="submit" value="Sửa">
				</div>
			</div>
		</form>
		<?php 
		if (isset($_POST['submit'])) {
			$answer=$_POST['answer'];
			$true_answer=$_POST['true_answer'];
			$sql_edit="UPDATE answer_tab SET answer='$answer',true_answer='$true_answer' WHERE id_a=$id_a";
			$kq = $conn->prepare($sql_edit);
			if ($kq->execute()) {
				$_SESSION['alert_success']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Sủa phương án thành công !</strong>
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