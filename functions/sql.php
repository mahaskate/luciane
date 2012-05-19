<?php

function query($a)
{
	$a = mysql_query($a) or die (mysql_error());
	return $a;
}

function conta($a)
{
	$a = mysql_num_rows($a);
	return $a;
}

function fetch_assoc($a)
{
	$a = mysql_fetch_assoc($a);
	return $a;
}

?>