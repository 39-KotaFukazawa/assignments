<?php 
   //session接続
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


      //news一覧を表示
      foreach ($result as $row) {
         echo $row["news_title"]."<br>";
         echo $row["news_detail"]."<br>";
         echo $row["author"]."<br>";
         echo $row["create_date"]."<br>";
         echo '<a href="update.php?id='.$row["news_id"].'">修正</a>';
         if ($row['show_flg']==1) {
            echo "表示";
         }
         echo "<hr>";
      }

      $pdo = null;
?>
<h1><a href="index.php">トップメニューへ</a></h1>
