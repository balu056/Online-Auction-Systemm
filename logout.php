<?php
Session_start();
if(session_destroy())
{
	header("location:index.php");
}
?>