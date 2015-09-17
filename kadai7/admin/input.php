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
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <title>ニュース新規追加</title>
    <style>
    	body{
    		text-align: center;
    	}
    	h2{
    		font-size: 30px;
    		color: yellow;
    	}
    	form{
    		margin: 40px;
    	}
    </style>
</head>
<body>
	
	<h1>news情報入力画面</h1>
	<form action="input_execute.php" method="POST">
		<p>Title:<input type="text" name="title"></p>
		<p>Contents:<input type="text" name="contents"></p>
		<p>Author:<input type="text" name="author"></p>
    <input type="submit" value="確定する">
	</form>
</body>
</html>