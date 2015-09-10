<?php
	if (isset($_GET["news_id"])) {
		
	$id=$_GET["news_id"];
	
	$title = $_GET["title"];
	$detail = $_GET["detail"];
	$date = $_GET["date"];
	
	
}else{
	echo "no string here";
}
	// $connect = mysql_connect("localhost","root","");
	// mysql_query("SET NAMES utf8",$connect);

	// mysql_db_query("test", "delete from tweet_tbl where tweet_id = $tweet_id");

	// mysql_close($connect);
?>
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
    	#display{
    		text-align: center;
    	}
    	#display .title{
    		line-height: 100px;
    		font-size: 40px;
    	}
    	#display .detail{
    		font-weight: bold;
    		font-size: 20px;
    		line-height: 50px;

    	}
    </style>
</head>
<body>
	<?php include("header.php");?>
	<div id="display">
	<h2>日時</h2>
	<p><?php echo $date; ?></p>
	<h3>TITLE</h3>
	<p class="title"><?php echo $title; ?></p>
	<h4>CONTENTS</h4>
	<p class="detail"><?php echo $detail; ?></p>
</div>
	<?php include("footer.php");?>
</body>
</html>