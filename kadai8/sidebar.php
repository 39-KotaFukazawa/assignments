<?php
  //情報をget
    $pdo = new PDO("mysql:host=localhost;dbname=cms_news;charset=utf8","root","");

    $sql = "select * from news order by news_id desc limit 10";

    $stmt=$pdo->prepare($sql);

    $stmt ->execute();

    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);



    foreach ($result as $row) {
           $row["news_id"]."<br>";
           $row["news_title"]."<br>";
           $row["news_contents"]."<br>";
           $row["news_date"]."<br>";
           $row["news_category"]."<br>";
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
<div id="new">
      <h1>最新ニュース</h1>
      <?php
      foreach ($result as $row) {
           echo $row["news_id"]."<br>";
           echo '<p><a href="news_detail.php?news_id='.$row['news_id'].'">'.$row["news_title"].'</a></p>';
           echo $row["news_contents"]."<br>";
           echo $row["news_date"]."<br>";
           echo $row["news_category"]."<br>";
           //$row["news_image"];
           echo "<hr>";
      }
?>
</div>
  