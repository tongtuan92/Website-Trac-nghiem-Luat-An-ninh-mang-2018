	<?php 
			$time_now=time();
			$time_out=100;
			$time = $time_now-$time_out;
			$REMOTE_ADDR=$_SESSION['name'];
			$PHP_SELF=$_SERVER['PHP_SELF'];
			$sql_1 = "INSERT INTO user_online value('$time_now','$REMOTE_ADDR','$PHP_SELF')";
			$kq_1 = $conn->exec($sql_1);
			$sql_2="DELETE FROM user_online WHERE time_online<$time";
			$kq_2 = $conn->prepare($sql_2)->execute();
			$sql_3 = "SELECT DISTINCT ip FROM user_online";
			$kq_3 = $conn->query($sql_3);
			$kq_4 = $conn->prepare($sql_3);
			$kq_4->execute();
			$kq_5=$kq_4->rowCount();
			?>
			<button type="button" class="btn btn-primary btn-sm">
				Đang online <?php echo $kq_5; ?>: <?php 
						foreach ($kq_3 as $key => $value) {
							?>
							<span class="badge badge-light"><?php echo $value['ip'] ?></span>
							<?php
						}
				 ?><div class="spinner-grow" style="width: 1rem; height: 1rem;" role="status">
  <span class="sr-only">Loading...</span>
</div>
			</button>
