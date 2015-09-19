<?php
	session_start();
	session_regenerate_id(true);//セッションハイジャック防止
	if (isset($_SESSION['login'])==false) 
	{
		print "ログインされていません";
		print '<a href="login.php">ログイン画面へ</a>';
		exit();
	}else{
		print $_SESSION['staff_name'];
		print "さんログイン中";

	}
	try
	{
		$id = $_POST['id'];
		$title = $_POST['title'];
		$detail = $_POST['detail'];


		
		$id = htmlspecialchars($id);
		$title = htmlspecialchars($title);
		$detail = htmlspecialchars($detail);
		

		$dsn = 'mysql:dbname=cs_academy;host=localhost';
		$user='root';
		$password='';
		$dbh = new PDO($dsn,$user,$password);
		$dbh -> query('SET NAMES utf8');

		$sql ='UPDATE news SET news_title=?,news_detail=?,update_date=sysdate() WHERE news_id=?';
		$stmt = $dbh ->prepare($sql);
		$data[]=$title;
		$data[]=$detail;
		$data[]=$id;
		$stmt->execute($data);

		$dbh=null;



	
	print '修正しました';
	}
	catch(Exception $e)
	{
		print 'ただいま障害により大変なご迷惑をおかけしています';
		exit();
	}
?>

<a href="index.php">戻る</a>