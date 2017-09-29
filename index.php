<?php 
	//连接mysql数据库
	$pdo = new PDO('mysql:host=localhost;dbname=php','root','mysql');
	//设置提交的编码格式
	$pdo -> exec('set names utf8');
	//查询所用到的sql语句
	$sql = "select * from user";
	//预查询
    $smt=$pdo -> query($sql);
    //查询所有列(正序排列)，将结果保存至rows中
    $rows=$smt -> fetchAll(PDO::FETCH_ASSOC);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
	<link rel="stylesheet" type="text/css" href="BootStrap/css/bootstrap.min.css">
 	<script type="text/javascript" src="BootStrap/js/jquery.min.js"></script>
 	<script type="text/javascript" src="BootStrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h3>用户列表</h3>
		</div>
		<div>
			<a class="btn btn-success" href="update.php">+新增用户</a>
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<th>序号</th>
					<th>用户名</th>
					<th>密码</th>
					<th>出生日期</th>
					<th>创建时间</th>
					<th>修改</th>
					<th>删除</th>
				</tr>
				<?php 
					foreach ($rows as $row) {
						echo "<tr>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$row['username']}</td>";
						echo "<td>{$row['password']}</td>";
						echo "<td>{$row['birth']}</td>";
						echo "<td>{$row['createtime']}</td>";
						echo "<td><a class='btn btn-default' href='update.php?id={$row['id']}'>修改</a></td>";
						echo "<td><a class='btn btn-danger' href='delete.php?id={$row['id']}'>删除</a></td>";
						echo "</tr>";
					}
				 ?>
			</table>
		</div>
	</div>
</body>
</html>