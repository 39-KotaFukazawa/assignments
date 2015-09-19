<!--簡単な検索機能実装-->
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>newsを検索</title>
</head>
<body>
	<form method="get" action="search_ps_execute.php">
	<label for="usersearch">フリーワード検索</label><br/>
	<input type="text" id="usersearch" name="usersearch"/><br/>
	<input type="submit" name="submit" value="検索"/><br>
	</form>
</body>
</html>