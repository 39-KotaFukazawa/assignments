<?php
	//session接続
	session_start();
	session_regenerate_id(true);//セッションハイジャック防止
		if (isset($_SESSION['login'])==false) 
	{
			print "ログインされていません";
			//headerで飛ばすべきかな？
			print '<a href="login.php">ログイン画面へ</a>';
			exit();
	}else{
			print $_SESSION['staff_name'];
			print "さんログイン中";

	}
?>
<html>
<head>
<meta charset="utf-8">
<title>管理者ホーム</title>
</head>
<body>
<ul>
<li><a href="input.php">ニュース新規追加</a></li>
<li><a href="news_list.php">ニュース一覧（更新はここから）</a></li>
<li><a href="search_ps.php">ニュース検索</a></li>
<li><a href="logout.php">LOGOUT</a></li>
</ul>
</body>
</html>