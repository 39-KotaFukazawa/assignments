<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>admin追加</title>
</head>
<body>
	<!--スタッフを追加する-->
	<h1>add staffs</h1>
	<form method="POST" action="admin_add_check.php">
		<p>スタッフ名を入力してください</p>
		<input type="text" name="name" style="width:200px">
		<p>パスワードを入力してください</p>
		<input type="password" name="pass" style="width:100px">
		<p>パスワードをもう一度入力してください</p>
		<input type="password" name="pass2" style="width:100px">
		<p><input type="button" onclick="history.back()" value="back"></p>
		<input type="submit" value="OK">
	</form>
</body>
</html>