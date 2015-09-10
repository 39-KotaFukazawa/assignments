<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
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
	<?php include("header.php");?>
	<h1>news情報入力画面</h1>
	<form action="news-sql-get.php" method="POST">
		<p>Title:<input type="text" name="title"></p>
		<p>Contents:<input type="text" name="contents"></p>
		<p>Author:<input type="text" name="author"></p>
    <input type="submit" value="確定する">
	</form>

	<?php include("footer.php");?>
</body>
</html>