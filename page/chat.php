<?php
	include 'functionLib.php';
	$forbidIP = jsonToArr('../json/forbidIP.json');
	// 系统入口
	date_default_timezone_set("PRC");
	error_reporting(E_ALL & ~E_NOTICE);
	set_time_limit(30);
	$room = $_REQUEST['room'] ?? 'default';
	$type = $_REQUEST['type'] ?? 'enter';
	$type = strtolower($type);
	
	// 创建新房间
	function newRoom($room)
	{
		$room_file = '../tmp/' . $room . '.txt';
		$key_list = array_merge(range(48, 57), range(65, 90), range(97, 122), [43, 47, 61]);
		$key1_list = $key_list;
		shuffle($key1_list);
		$room_data = [
				'name' => $room,
				'encode' => array_combine($key_list, $key1_list),
				'list' => [],
				'time' => date('Y-m-d H:i:s'),
				'ip' => getIP()
		];
		file_put_contents($room_file, json_encode($room_data));
	}
	// 获取消息列表
	function getMsg($room, $last_id)
	{
		$room_file = '../tmp/' . $room . '.txt';
		$msg_list = [];
		$room_data = json_decode(file_get_contents($room_file), true);
		$list = $room_data['list'];
		// 清除1分钟前消息
		$cur_list = [];
		$del_time = date('Y-m-d H:i:s', time() - 60);
		foreach ($list as $r) {
			if ($r['time'] > $del_time) {
				$cur_list[] = $r;
			}
		}
		if (count($cur_list) != count($list) && count($list) > 0) {
			$room_data['list'] = $cur_list;
			file_put_contents($room_file, json_encode($room_data));
		}
		// 查找最新消息
		foreach ($list as $r) {
			if ($r['id'] > $last_id) {
				$msg_list[] = $r;
			}
		}
		return $msg_list;
	}
	if (in_array(getIP(),$forbidIP['IP'])){
		alt('您不被允许进入聊天室');
		header('location:../Index.html');
		exit();
	}
	$room_file = '../tmp/' . $room . '.txt';
	switch ($type) {
		case 'enter':   // 进入房间
			break;
		case 'get':     // 获取消息
			$last_id = $_REQUEST['last_id'];
			$msg_list = [];
			if (strpos($_SERVER['SERVER_SOFTWARE'], 'nginx') !== false) {
				$msg_list = getMsg($room, $last_id);
			} else {
				// nginx 使用sleep将会把整个网站卡死
				for ($i = 0; $i < 20; $i++) {
					$msg_list = getMsg($room, $last_id);
					if (!empty($msg_list)) {
						break;
					}
					usleep(500000);
				}
			}
			echo json_encode(['result' => 'ok', 'list' => $msg_list]);
			break;
		case 'send':    // 发送消息
			$item = [
					'id' => round(microtime(true) * 1000),
					'user' => $_REQUEST['user'],
					'content' => $_REQUEST['content'],
					'time' => date('Y-m-d H:i:s'),
					'ip' => getIP()
			];
			$room_data = json_decode(file_get_contents($room_file), true);
			$room_data['list'][] = $item;
			file_put_contents($room_file, json_encode($room_data));
			echo json_encode(['result' => 'ok']);
			break;
		case 'new':     // 新建房间
			mt_srand();
			$room = strtoupper(md5(uniqid(mt_rand(), true)));
			$room = substr($room, 0, 10);
			newRoom($room);
			header('Location:chat.php?room=' . $room);
			break;
		default:
			echo 'ERROR:no type!';
			break;
	}
	if ($type != 'enter') {
		exit;
	}
	if (!file_exists($room_file)) {
		if ($room == 'default') {
			newRoom($room);
		} else {
			echo 'ERROR:room not exists!';
			exit;
		}
	}
	$room_data = json_decode(file_get_contents($room_file), true);
	unset($room_data['list']);
	$user = 'User' . str_pad((time() % 99 + 1), 2, '0', STR_PAD_LEFT);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>聊天室</title>
	<style>
		body {
			padding: 0 10px;
		}
		.divMain {
			font-size: 14px;
			line-height: 2;
		}
		#divList span {
			color: gray;
		}
	</style>
	<script src="../script/jquery-3.2.1.min.js"></script>
	<script src="../script/blueimp-md5.md5.js"></script>
	<script src="../script/funclib.js"></script>
</head>
<body>
<!--<h1>PHP 在线聊天</h1>-->
<div class="divMain">
	昵称：<input id="txtUser" type="text" maxlength="50" value="<?= $user ?>"/>
	<button onclick="$('#divList').html('');">清空</button>
	<br>
	内容：<input id="txtContent" type="text" value="" maxlength="100" style="width: 300px;"/>
	<button onclick="sendMsg();">发送</button>
	<hr>
	<div id="divList"></div>
</div>
<!--使用worker获取消息数据，注意ngnix会阻塞整个进程-->
<script id="worker" type="app/worker">
    var room = '<?= $room_data['name'] ?>';
    var isBusy = false;
    var lastId = -1;
    var urlBase = '';
    addEventListener('message', function (evt) {
        urlBase = evt.data;
    }, false);
    setInterval(function(){
        if (isBusy) return;
        isBusy = true;
        let url = new URL( 'chat.php?type=get&room=' + room + '&last_id=' + lastId, urlBase );
        fetch(url)
        .then(res=>res.json())
        .then(function(res){
            isBusy = false;
            if (res.list.length > 0)
            {
                lastId = res.list[res.list.length-1].id;
            }
            self.postMessage(res);
        })
        .catch(function(err){
            isBusy = false;
        });
    }, 1000);
</script>
<script>
	var blob = new Blob([document.querySelector('#worker').textContent]);
	var url = window.URL.createObjectURL(blob);
	var worker = new Worker(url);
	worker.onmessage = function (e) {
		let res = e.data;
		let html = '';
		for (let k in res.list) {
			let r = res.list[k];
			if (md5(getCookie('user'))=='192892d5fdddb97640bb9158f6a9e460'){
				html = '<div><span style="color: red" ">'+r.ip+'</span>-<span>' + r.time + '</span> <b>' + r.user + ':</b>' + decodeContent(r.content) + '</div>' + html;
			}else{
				html = '<div><span>' + r.time + '</span> <b>' + r.user + ':</b>' + decodeContent(r.content) + '</div>' + html;
			}
		}
		$('#divList').prepend(html);
	};
	worker.postMessage(document.baseURI);
</script>
<script>
	var room = <?=json_encode($room_data)?>;
	room['decode'] = {};
	for (let k in room.encode) {
		room['decode'][room.encode[k]] = k;
	}
	// 发送消息
	var lastSendTime = 0;
	function sendMsg() {
		let user = $('#txtUser').val().trim();
		let content = $('#txtContent').val().trim();
		if (content == '') {
			return;
		}
		if (user == '') {
			alert('昵称不能为空');
			return;
		}
		window.localStorage.setItem('r_' + room.name, user);
		// 限制0.5秒内仅允许发送1条消息
		let curTime = new Date().getTime();
		if (curTime - lastSendTime < 500) {
			return;
		}
		lastSendTime = curTime;
		$.ajax({
			url: 'chat.php?type=send',
			data: {room: room.name, user: user, content: encodeContent(content)},
			type: 'POST',
			dataType: 'json',
			success: function () {
				$('#txtContent').val('');
				$('#txtContent').focus();
			},
		});
	}
	// 消息加密
	function encodeContent(content) {
		content = encodeURIComponent(content);
		content = window.btoa(content);
		let str = '';
		for (let i = 0; i < content.length; i++) {
			str += String.fromCharCode(room.encode[content.charCodeAt(i)]);
		}
		return str;
	}
	// 消息解密
	function decodeContent(content) {
		let str = '';
		for (let i = 0; i < content.length; i++) {
			str += String.fromCharCode(room.decode[content.charCodeAt(i)]);
		}
		str = window.atob(str);
		str = decodeURIComponent(str);
		return str;
	}
	$(function () {
		let userName = window.localStorage.getItem('r_' + room.name);
		if (userName) {
			$('#txtUser').val(userName);
		}
		$('#txtContent').keydown(function (e) {
			if (e.keyCode == 13) {
				event.preventDefault();
				sendMsg();
			}
		});
		$('#txtContent').val('进入聊天室 !');
		sendMsg();
	});
</script>
</body>
</html>