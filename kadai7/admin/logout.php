<?php
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
	setcookie(session_name(),'',time()-42000,'/');
}
@session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ろくまる農園</title>
</head>
<body>
<h1>ログアウトしました</h1>
<a href="login.php">ログイン画面へ</a>
</body>
</html>