  <?php
  //情報をget
    $pdo = new PDO("mysql:host=localhost;dbname=cms_news;charset=utf8","root","");

    $sql = "select * from news limit 30";

    $stmt=$pdo->prepare($sql);

    $stmt ->execute();

    $gather = $stmt->fetchALL(PDO::FETCH_ASSOC);

    
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
          $news_contents=$news["news_contents"];
          $news_contents_length = mb_strlen($news_contents);
          $news_short = mb_substr($news_contents,0,10);
          if ($news_contents_length<=5)
          {
            echo $news_short."<br>";

          }elseif ($news_contents_length>=5) 
          {
            echo $news_short.'....<br>';
          }
          
          echo $news["news_date"]."<br>";
          echo '<img src="' . $news['news_image'] . '">';
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
          $news_contents=$news["news_contents"];
          $news_contents_length = mb_strlen($news_contents);
          $news_short = mb_substr($news_contents,0,10);
          if ($news_contents_length<=5)
          {
            echo $news_short."<br>";

          }elseif ($news_contents_length>=5) 
          {
            echo $news_short.'....<br>';
          }
          echo $news["news_date"]."<br>";
          echo '<img src="' . $news['news_image'] . '">';
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
          $news_contents=$news["news_contents"];
          $news_contents_length = mb_strlen($news_contents);
          $news_short = mb_substr($news_contents,0,10);
          if ($news_contents_length<=5)
          {
            echo $news_short."<br>";

          }elseif ($news_contents_length>=5) 
          {
            echo $news_short.'....<br>';
          }
          echo $news["news_date"]."<br>";
          echo '<img src="' . $news['news_image'] . '">';
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
          $news_contents=$news["news_contents"];
          $news_contents_length = mb_strlen($news_contents);
          $news_short = mb_substr($news_contents,0,10);
          if ($news_contents_length<=5)
          {
            echo $news_short."<br>";

          }elseif ($news_contents_length>=5) 
          {
            echo $news_short.'....<br>';
          }
          echo $news["news_date"]."<br>";
           echo '<img src="' . $news['news_image'] . '">';
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
          $news_contents=$news["news_contents"];
          $news_contents_length = mb_strlen($news_contents);
          $news_short = mb_substr($news_contents,0,10);
          if ($news_contents_length<=5)
          {
            echo $news_short."<br>";

          }elseif ($news_contents_length>=5) 
          {
            echo $news_short.'....<br>';
          }
          echo $news["news_date"]."<br>";
          echo '<img src="' . $news['news_image'] . '">';
           echo "<hr>";
         }
         }
      ?>
    </div>
    </div>
    <?php include('sidebar.php'); ?>
    <?php include('footer.php'); ?>


 
  
  
  