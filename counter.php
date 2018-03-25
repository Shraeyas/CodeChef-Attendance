<?php

	$count = file_get_contents("count.html");
	file_put_contents("count.html", $count+1);

?>