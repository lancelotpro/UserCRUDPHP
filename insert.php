<?php 
	//获取的id
	$id = null;
	$createtime = null;
	if($_POST['id'] != null){
		$id = $_POST['id'];
	}

	$username = $_POST['username'];
	$password = $_POST['password'];
	$birth = $_POST['birth'];
	$createtime = date('Y-m-d');
	//连接mysql数据库
	$pdo = new PDO('mysql:host=localhost;dbname=php','root','mysql');
	//设置提交的编码格式
	$pdo -> exec('set names utf8');
	//查询所用到的sql语句
	if($id != null){
		$sql = "update user set username = '{$username}',password = '{$password}',birth = '{$birth}' where id = {$id}";	
	}else{
		$sql = "insert into user(username,password,birth,createtime) values ('{$username}','{$password}','{$birth}','{$createtime}')";
	}

	if($pdo -> exec($sql)){
		echo "操作成功！等待3秒返回列表!";
	}else{
		echo "操作失败!等待3秒返回列表!";
	}

 ?>
<script type="text/javascript">

　　setTimeout("window.location.href='index.php'",3000);

</script>