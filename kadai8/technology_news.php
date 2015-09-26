<?php
  //情報をget
    $pdo = new PDO("mysql:host=localhost;dbname=cms_news;charset=utf8","root","");

    $sql = "select * from news where news_category='technology'";

    $stmt=$pdo->prepare($sql);
    $stmt ->execute();

    $gather = $stmt->fetchALL(PDO::FETCH_ASSOC);

    foreach ($gather as $news) {
           $news["news_id"]."<br>";
           $news["news_title"]."<br>";
           $news["news_contents"]."<br>";
           $news["news_date"]."<br>";
           //$row["news_image"];
           "<hr>";
      }

      //画像取得
      $img_path = "upload";
      $directry = new RecursiveDirectoryIterator($img_path); //走査するディレクトリを指定
      $data_obj = new RecursiveIteratorIterator($directry);  //指定したディレクトリから反復処理でデータを取得

      //画像を繰返し取得表示
      $list = "";
      foreach ($data_obj as $filepath) { // $data_obj から $filepathにてデータを取得
          if ($filepath->isFile()) {
              $list .=  '<img src="'.$filepath->getPathname().'">';
         }
        }

    $pdo = null;
?>

  <?php include('header.php'); ?>
    <div id="contents">
      <h1>テクノロジーカテゴリー</h1>
      <?php
      foreach ($gather as $news) {
           echo $news["news_id"]."<br>";
           echo $news["news_title"]."<br>";
           echo $news["news_contents"]."<br>";
           echo $news["news_date"]."<br>";
           echo '<p><a href="news_detail.php?news_id='.$news['news_id'].'">'.$news["news_title"].'</a></p>';
           echo '<img src="' . $news['news_image'] . '">';
           echo "<hr>";
      }
      ?>
    </div>
    <?php include('sidebar.php'); ?>
   
