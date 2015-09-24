<?php

//1. 接続します
$pdo = new PDO('mysql:dbname=cms_news;host=localhost', 'root', '');

//2. DB文字コードを指定
$stmt = $pdo->query('SET NAMES utf8');

//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user LIMIT 3");

//４．SQL実行
$flag = $stmt->execute();

//データ表示
$view="";

if($flag==false){
  $view = "SQLエラー";
}else{
  while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<li> <img src="' . $result['user_image'] . '"></li><p>
    <a href="user_detail.php?user_id='.$result['user_id'].'">'.$result["user_name"].'</a></p>';
         
  }
}
?>
  
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <!-- Slidebars CSS -->
  <link rel="stylesheet" href="slidebar/css/slidebars.css">
  <link rel="stylesheet" type="text/css" href="oreno_news.css">
  

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
  <script src="slidebar/js/slidebars.js"></script>
  
<script>
    (function($) {
        $(document).ready(function() {
            $.slidebars();
        });SS
    })(jQuery);
</script>
  <title>俺のNEWS</title>
</head>
<body>
  <!-- メニューバー -->
  <header>
    <div id="menu" class="sb-slide">
      <p class="sb-toggle-left">*</p>
      <h2><a href="news_top.php">俺のNEWS</a></h2>
      <h3><a href="loigin.php">会員登録/LOGIN</a></h3>
    </div>
    <div class="sb-slidebar sb-left">
    <ul>
        <li><a class="hvr-bounce-out" href="news_edit.php">NEWS編集</a></li>
        <li><a class="hvr-pop" href="sports_news.php">SPORTS</a></li>
        <li><a class="hvr-pop" href="economics_news.php">ECONOMICS</a></li>
        <li><a class="hvr-bounce-out" href="business_news.php">BUSINESS</a></li>
        <li><a class="hvr-bounce-out" href="technology_news.php">TECHNOLOGY</a></li>
        <li><a class="hvr-bounce-out" href="innovation_news.php">INNOVATION</a></li>
        
      </ul>
  </header>
  <!-- メニューバー -->
  <!-- コンテンツ -->
  <div id="sb-site" class="main">
    <div id="user">
      <h1>USER</h1>
      <ul>
        <? echo $view; ?>
      </ul>
      
    </div>