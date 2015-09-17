<?php
try
{
	$id = $_POST['id'];
	$pass = $_POST['pass'];

	$id = htmlspecialchars($id);
	$pass = htmlspecialchars($pass);

	$pass = md5($pass);

	$dsn = 'mysql:dbname=cs_academy;host=localhost';
	$user='root';
	$password='';
	$dbh = new PDO($dsn,$user,$password);
	$dbh -> query('SET NAMES utf8');

	$sql ='SELECT name FROM  admin_staff WHERE id=? AND password=?';
	$stmt = $dbh ->prepare($sql);
	$data[]=$id;
	$data[]=$pass;
	$stmt->execute($data);

	$dbh = null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($rec ==false) {
		print "IDかパスワードが間違っています";
		print '<a href="login.php">戻る</a>';
	}else{
		session_start();
		$_SESSION['login']=1;
		$_SESSION['staff_id'] = $id;
		$_SESSION['staff_name'] =$rec['name'];
		header('Location:index.php');
	}
}
catch(Exception $e)
{
	print 'ただいま障害により大変なご迷惑をおかけしています';
	exit();
}
?>