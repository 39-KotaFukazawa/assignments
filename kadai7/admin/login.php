<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>cs管理者LOGIN page</title>
<style>
body{
	text-align: center;
}
</style>
</head>
<body>
<h1>管理者画面に行くには、ログインをしてください。</h1>
<form action="login_execute.php" method="post">
	ログインID: <input type="text" name="id" >
	パスワード: <input type="password" name="pass" >
	<input type="submit" value="LOGIN">
</form>
</body>
</html>