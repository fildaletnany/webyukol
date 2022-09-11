<?php
	echo "Post successfully created/edited";
	$now = time();
	while ($now + 3 == time()) {
		echo "<br>";
		echo "wait to be redirected";
	}
	header("Location: https://zrostfi21.sps-prosek.cz/mysql/ukol/post_system/my_profile.php");
?>