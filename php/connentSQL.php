<?php
		$link = new mysqli('localhost','user','123456','users');//���ӵ����ݿ�
		if(!($link->connect_error)) con('���ӳɹ�');//���ӳɹ�
		else {alt('����,�޷����ӵ����ݿ�');exit();}//����ʧ��
		//