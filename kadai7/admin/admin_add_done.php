<?php
try
{
	$name = $_POST['name'];
	$pass = $_POST['pass'];

	$name = htmlspecialchars($name);
	$pass = htmlspecialchars($pass);

	$dsn = 'mysql:dbname=cs_academy;host=localhost';
	$user='root';
	$password='';
	$dbh = new PDO($dsn,$user,$password);
	$dbh -> query('SET NAMES utf8');

	$sql ='INSERT INTO admin_staff(password,name) VALUES(?,?)';
	$stmt = $dbh ->prepare($sql);
	$data[]=$pass;
	$data[]=$name;
	$stmt->execute($data);

	$dbh=null;

	print $name;
	print 'さんを追加しました';
}
catch(Exception $e)
{
	print 'ただいま障害により大変なご迷惑をおかけしています';
	exit();
}
?>

<a href="admin_add.php">戻る</a>