<?php
  session_start();
  session_regenerate_id(true);
  if (isset($_SESSION['member_login'])==false) 
  {
    print "WELCOME GUEST";
    print '<a href="member_login.php">会員ログイン</a>';
  }else
  {
    print "WELCOME ";
    print $_SESSION['member_name'];
    print "様";
    print '<a href="member_logout.php">LOGOUT</a>';
  }

  $img = "";
  if (!isset($_FILES["upfile"]["error"]) || !is_int($_FILES["upfile"]["error"])) {
    echo "パラメーターが不正です。";
  }else{
    //file取得少し複雑なので先に。
    $file_name = $_FILES["upfile"]["name"];//filesなので、２つ取る。
    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得
    $tmp_path = $_FILES["upfile"]["tmp_name"];//一度tmp_nameに保存（キャッシュ？）のちにMoveさせる。
    $uniq_name = date("YmdHis").session_id() . "." . $extension; //ユニークファイル名作成

    $file_dir_path = "upload/";
    $img = "";

    //fileupload スタート！
    if (is_uploaded_file($tmp_path)) { //画像が上がってきていれば。
      if (move_uploaded_file($tmp_path, $file_dir_path.$uniq_name)) { //move関数の形（移動のもの,場所）.は変数と文字列をくっつけるもの

        chmod($file_dir_path.$uniq_name,0644);//権限を与える。

        echo $uniq_name."をアップロードしました。";
        $img = '<img src="'.$file_dir_path.$uniq_name.'">';
    }
}
}


 //サニタイズ関数
 require_once('functions/sanitize.php');

//新規ログイン情報取得
 $post=sanitize($_POST);
 $title=$post['title'];
 $contents=$post['contents'];
 $category=$post['category'];

 echo $title;
 echo $contents;
 echo $category;
 

 $okflag = true;


//以下チェック
 if ($title=='') 
 {
  print 'タイトルが入力されていません';
  $okflag = false;
 
 }
 else
 {
  print 'タイトル<br/>';
  print $title;
  print '<br/>';
 }

 

 if ($contents=='') 
 {
  print '内容が登録されていません';
  $okflag = false;
  
 }
 else
 {
  print '内容<br/>';
  print $contents;
  print '<br/>';
 }

 
if ($title=='' || $contents=='') 
{
  print "<form>";
  print "<input type='button' onclick='history.back()' value='back'>";
  print "</form>";
 }

 if ($okflag==true) 
 {
  
  $dsn = 'mysql:dbname=cms_news;host=localhost';
  $user='root';
  $password='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> query('SET NAMES utf8');


  $sql ='INSERT INTO news(news_title, news_contents,news_image, news_date, news_category)VALUES
        (?,?,?,sysdate(),?)';
  $stmt = $dbh ->prepare($sql);
  $data[]=$title;
  $data[]=$contents;
  $data[]=$file_dir_path.$uniq_name;
  $data[]=$category;

  $stmt->execute($data);

  $dbh=null;




 }
 

 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <title>news編集画面</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
  </script>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="news_top.php">俺のNEWS</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="news_edit.php">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><?php print $_SESSION['member_name'].'ログイン中';?> </li>
      </ul>
    </div>/.nav-collapse
  </div>
</div> 

<div class="container">
  
  <div class="text-center">
    <h1 style="padding-top:100px">NEWS 編集画面</h1>
    <p class="lead">ここでnewsを追加できます。<br> ガンガン更新しましょう。</p>
  </div>
</body>
</html>