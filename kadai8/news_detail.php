<?php
  $news_id=$_GET['news_id'];

  //情報をget
    $pdo = new PDO("mysql:host=localhost;dbname=cms_news;charset=utf8","root","");

    $sql = 'SELECT * FROM news WHERE news_id=?';

    $stmt=$pdo->prepare($sql);
    $data[]=$news_id;
    $stmt ->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    

    $title=$rec["news_title"];
    $contents=$rec["news_contents"];

    $dbh=null;

    
?>
<?php include('header.php'); ?>
    <div id="contents">
      <h1><?php echo $title ?></h1>
      <h2><?php echo $contents ?></h2>
    </div>
    <?php include('sidebar.php'); ?>
    

