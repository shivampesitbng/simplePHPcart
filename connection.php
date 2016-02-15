<?php

	$dbc = @mysql_connect('localhost','root','') or die("couldnot connect".mysql_error);
	$db = @mysql_select_db("kart") or die ("couldnot connect to datatbase");

?>