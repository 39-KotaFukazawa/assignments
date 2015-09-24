  <?php
  //情報をget
    $pdo = new PDO("mysql:host=localhost;dbname=cms_news;charset=utf8","root","");

    $sql = "select * from news";

    $stmt=$pdo->prepare($sql);

    $stmt ->execute();

    $gather = $stmt->fetchALL(PDO::FETCH_ASSOC);

    foreach ($gather as $news) {
           $news["news_id"]."<br>";
           $news["news_title"]."<br>";
           $news["news_contents"]."<br>";
           $news["news_date"]."<br>";
           $news["news_category"]."<br>";
           $news["news_image"];
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
      <h1>カテゴリー別news</h1>
      <div class="sports">
        <h2><a href="sports_news.php">sports</a></h2>
      <?php foreach ($gather as $news) {
        if ($news["news_category"]=='sports'){
          echo $news["news_id"]."<br>";
          echo '<p><a href="news_detail.php?news_id='.$news['news_id'].'">'.$news["news_title"].'</a></p>';
          echo $news["news_contents"]."<br>";
          echo $news["news_date"]."<br>";
          echo  $news["news_category"]."<br>";
           //$row["news_image"];
           echo "<hr>";
         }
         }
      ?>
    </div>
    <div class="economics">
      <h2><a href="economics_news.php">economics</a></h2>
      <?php foreach ($gather as $news) {
        if ($news["news_category"]=='economics'){
          echo $news["news_id"]."<br>";
          echo '<p><a href="news_detail.php?news_id='.$news['news_id'].'">'.$news["news_title"].'</a></p>';
          echo $news["news_contents"]."<br>";
          echo $news["news_date"]."<br>";
          echo $news["news_category"]."<br>";
          echo $news["news_image"];
           echo "<hr>";
         }
         }
      ?>
    </div>
    <div class="business">
      <h2><a href="business_news.php">business</a></h2>
      <?php foreach ($gather as $news) {
        if ($news["news_category"]=='business'){
          echo $news["news_id"]."<br>";
          echo '<p><a href="news_detail.php?news_id='.$news['news_id'].'">'.$news["news_title"].'</a></p>';
          echo $news["news_contents"]."<br>";
          echo $news["news_date"]."<br>";
          echo  $news["news_category"]."<br>";
          echo '<li> <img src="' . $news['news_image'] . '"></li>';
           echo "<hr>";
         }
         }
      ?>
    </div>
    <div class="technology">
      <h2><a href="technology_news.php">technology</a></h2>
      <?php foreach ($gather as $news) {
        if ($news["news_category"]=='technology'){
          echo $news["news_id"]."<br>";
          echo '<p><a href="news_detail.php?news_id='.$news['news_id'].'">'.$news["news_title"].'</a></p>';
          echo $news["news_contents"]."<br>";
          echo $news["news_date"]."<br>";
          echo  $news["news_category"]."<br>";
           //$row["news_image"];
           echo "<hr>";
         }
         }
      ?>
    </div>
    <div class="innovation">
      <h2><a href="innovation_news.php">innovation</a></h2>
      <?php foreach ($gather as $news) {
        if ($news["news_category"]=='innovation'){
          echo $news["news_id"]."<br>";
          echo '<p><a href="news_detail.php?news_id='.$news['news_id'].'">'.$news["news_title"].'</a></p>';
          echo $news["news_contents"]."<br>";
          echo $news["news_date"]."<br>";
          echo  $news["news_category"]."<br>";
           //$row["news_image"];
           echo "<hr>";
         }
         }
      ?>
    </div>
    </div>
    <?php include('sidebar.php'); ?>
    <?php include('footer.php'); ?>


 
  
  
  