<?php
		$link = new mysqli($MySQLserver,'user','123456','users');//连接到数据库
		if(!($link->connect_error)) con('连接成功');//连接成功
		else {alt('错误,无法连接到数据库');exit();}//连接失败
		//