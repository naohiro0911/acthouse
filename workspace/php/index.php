<?php
$a = <<<EOT
EOT;
 echo ($a);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="blog.css">
</head>
<body>
<?php
	$db = new PDO('mysql:host=localhost;dbname=acthouse;charset=utf8mb4','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::
	ERRMODE_EXCEPTION);
	if (isset($_POST['name'])) {
	$insert_sql = "insert into students (name, gender,
	age) value (?,?,?)";
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
  $stmt = $db->prepare($insert_sql);
  $success = $stmt->execute(array($name, $gender, $age)
  );
}

	$sql = 'select * from students';
	$stmt  = $db->query($sql);
	
	?>
	<style>
	table { border-collapse: collapse; }
		table td {
			border: 1px solid gray;
		}
	</style>
	<table>
	<tr>
		<td>id</td>
		<td>名前</td>
		<td>性別</td>
		<td>年齢</td>
	</tr>
		<?php foreach($stmt as $row) { ?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['gender'];?></td>
			<td><?php echo $row['age'];?></td>
			<td>
				<a href="edit.php?id=<?php echo $row['id']; ?>
				">編集</a>
				<a href="delete.php?id=<?php echo $row['id']; ?>
				">削除</a>
				
			</td>
		</tr>
		<?php } ?>
	</table>
	<div>
		<form action="" method="post">
			名前:<input type="text" name="name">
			性別:<input type="text" name="gender">
			年齢:<input type="text" name="age">
			<button>作成</button>
		</form>
	</div>
</pre>
<pre>
<?php
$arr = array(
	'red' => array('apple','cherry'),
	'yellow' => array('banana', 'mango'),
	'purple' => 'grape'
	);
print_r($arr);
?>
<?php
$arr = array('red' => 'apple', 'yellow' => 'banana', 'orange' => 'orange');
print_r($arr);
?>
<?php 
$arr = array('apple', 'banana', 'cherry');

print_r($arr);
?>
</pre>
 <hr>
<h4>$_SERVER</h4>
<pre><?php print_r($_SERVER); ?></pre>
<h4>$_GET</h4>
<pre><?php print_r($_GET); ?></pre>
<h4>$_POST</h4>
<pre><?php print_r($_POST); ?></pre>
<h4>$_FILES</h4>
<pre><?php print_r($_FILES); ?></pre>
<h4>$_COOKIE</h4>
<pre><?php print_r($_COOKIE); ?></pre>


<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="test1" value="テスト">
<input type="radio" name="radio1" value="r1">R1
<input type="radio" name="radio2" value="r2">R2
<input type="radio" name="radio3" value="r3">R3
<input type="file" name="file">
<button>送信</button>
</form>
	
</body>
</html>