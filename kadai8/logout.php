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
	<title>ログアウト</title>
</head>
<body>
<?php include('header.php'); ?>
<div id="contents">
<h1>ログアウトしました</h1>
<a href="loigin.php">ログイン画面へ</a>
</div>

<?php include('sidebar.php'); ?>
</body>
</html>