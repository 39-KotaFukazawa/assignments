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
	try//tryの位置はここでいいのか？？
	{

		$news_id=$_GET['id'];

		$dsn = 'mysql:dbname=cs_academy;host=localhost';
		$user='root';
		$password='';
		$dbh = new PDO($dsn,$user,$password);
		$dbh -> query('SET NAMES utf8');

		$sql ='SELECT * FROM news WHERE news_id=? ';
		$stmt = $dbh ->prepare($sql);
		$data[] = $news_id;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$title=$rec["news_title"];
		$detail=$rec["news_detail"];

		$dbh=null;
	}
	catch(Exception $e)
	{
		print 'ただいま障害により大変なご迷惑をおかけしています';
		exit();
	}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ニュース更新</title>
<style>
	body{
		text-align: center;
		}
</style>
</head>
<body>
	<h1>news update</h1>
	<h2>news ID</h2>
	<?php print $news_id; ?>
	<form method="POST" action="update_execute.php">
		
		<input type="hidden" name="id" style="width:200px" value="<?php print $news_id;  ?>">
		<p>タイトルを修正してください</p>
		<input type="text" name="title" style="width:200px" value="<?php print $title; ?>">
		<p>内容を修正してください</p>
		<input type="text" name="detail" style="width:700px" value="<?php print $detail; ?>">
		<p>表示するかどうか</p>
		<input type="radio" name="display" value="1">表示
		<input type="radio" name="display" value="2">非表示
		<p><input type="button" onclick="history.back()" value="back"></p>
		<input type="submit" value="OK">
	</form>