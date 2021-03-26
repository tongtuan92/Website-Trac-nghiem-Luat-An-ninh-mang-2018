<?php 
include '../connect/db.php';
session_start();
if (isset($_GET['id_q'])) {
	$id_q = $_GET['id_q'];
	$sql_del_question = "DELETE FROM question_tab WHERE id_q=$id_q";
	$kq_del_question = $conn->prepare($sql_del_question);
	if ($kq_del_question->execute()) {
		$_SESSION['alert_del_q']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Xóa câu hỏi thành công !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
		echo "<script>
		window.location='../manage/manage_question.php';
		</script>";
	}else{
		echo "Xóa không thành công";
	}
};
if (isset($_GET['username'])) {
	$username=$_GET['username'];
	$sql_acc="DELETE FROM user WHERE username='$username'";
	$kq_acc = $conn->prepare($sql_acc);
	if ($kq_acc->execute()) {
		$_SESSION['alert_del_user']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Xóa thành viên thành công !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
		echo "<script>
		window.location='../manage/manage_user.php';
		</script>";
	}else{
		echo "Xóa không thành công";
	}
};
if (isset($_GET['id_a'])) {
	$id_a = $_GET['id_a'];
	$sql_del_answer = "DELETE FROM answer_tab WHERE id_a=$id_a";
	$kq_del_answer = $conn->prepare($sql_del_answer);
	if ($kq_del_answer->execute()) {
		$_SESSION['alert_del']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Xóa phương án thành công !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
		echo "<script>
		history.back();
		</script>";
	}else{
		echo "Xóa không thành công";
	}
};
?>