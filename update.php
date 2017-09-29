<?php 

	$id = null;

	if($_GET['id'] != null){

	//赋值
	$id = $_GET['id'];
	//连接mysql数据库
	$pdo = new PDO('mysql:host=localhost;dbname=php','root','mysql');
	//设置提交的编码格式
	$pdo -> exec('set names utf8');
	//查询所用到的sql语句
	$sql = "select * from user where id = {$id}";
	//预查询
    $smt=$pdo -> query($sql);
    //查询所有列(正序排列)，将结果保存至rows中
    $rows=$smt -> fetchAll(PDO::FETCH_ASSOC);

	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增</title>
	<link rel="stylesheet" type="text/css" href="BootStrap/css/bootstrap.min.css">
 	<script type="text/javascript" src="BootStrap/js/jquery.min.js"></script>
 	<script type="text/javascript" src="BootStrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<?php 
				if($id != null){
					echo "<h3>修改用户</h3>";
				}else{
					echo "<h3>新增用户</h3>";
				}
			 ?>
		</div>
		<div>
			<a class="btn btn-default" href="index.php">返回列表</a>
			<form action="insert.php" method="POST">
				<?php 
					if($id != null){
						echo "<input type='hidden' name='id' value='{$id}'>";
					}
				 ?>				
				<div class="form-group">
				    <label for="username">用户名</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="用户名" <?php if($id != null){ echo "value='{$rows[0]['username']}'";} ?>>
				  </div>
				  <div class="form-group">
				    <label for="password">密码</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="密码" <?php if($id != null){ echo "value='{$rows[0]['password']}'";} ?>>
				  </div>
				  <div class="form-group">
				    <label for="birth">出生日期</label>
				    <input type="text" class="form-control" id="birth" name="birth" placeholder="出生日期" <?php if($id != null){ echo "value='{$rows[0]['birth']}'";} ?>>
				  </div>
				  <div class="form-group">
				    <input class="btn btn-primary" type="submit" name="submit">
				  </div>
			</form>
		</div>
	</div>
</body>
</html>