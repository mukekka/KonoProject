<?php
	function con($conlog)
	{
		echo "<script>console.log('$conlog');</script>";
	}
	if(isset($_POST['submit'])){
		con('1234');
	}
?>