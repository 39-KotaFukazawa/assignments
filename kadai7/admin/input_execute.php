<?php 
session_start();
session_regenerate_id(true);//セッションハイジャック防止
if (isset($_SESSION['login'])==false) 
{
  print "ログインされていません";
  print '<a href="login.php">ログイン画面へ</a>';
  exit();
}else{
  print $_SESSION['staff_name'];
  print "さんログイン中";

}
//情報をget
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8","root","");

$sql = "select *from news";

$stmt=$pdo->prepare($sql);

$stmt ->execute();

$result = $stmt->fetchALL(PDO::FETCH_ASSOC);



foreach ($result as $row) {
   echo $row["news_title"]."<br>";
   echo $row["news_detail"]."<br>";
   echo $row["author"]."<br>";
   echo $row["create_date"]."<br>";
   echo "<hr>";
}

$pdo = null;


	$title=$_POST["title"];
	$contents=$_POST["contents"];
	$author=$_POST["author"];

  echo $title;
  echo $contents;
  echo $author;



         //1. 接続します
      $pdo = new PDO('mysql:dbname=cs_academy;host=localhost', 'root', '');
      //2. DB文字コードを指定
      $stmt = $pdo->query('SET NAMES utf8');
      //３．データ登録SQL作成
      $stmt = $pdo->prepare("INSERT INTO news (news_title, news_detail, author, create_date)VALUES(:title, :detail, :author,sysdate())");
      $stmt->bindValue(':title', $title);
      $stmt->bindValue(':detail', $contents);
      $stmt->bindValue(':author', $author);
      $status = $stmt->execute();
      if($status==false){
        echo "SQLエラー";
        exit;
      }else{
        echo "登録完了！";
      
      }
  ?>
  <a href="index.php">TOPに戻る</a>