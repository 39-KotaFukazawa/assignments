<?php
  $user_id=$_GET['user_id'];
  $user_name=$_GET['user_name'];
  //情報をget
    $pdo = new PDO("mysql:host=localhost;dbname=cms_news;charset=utf8","root","");

    $sql = 'SELECT * FROM  user WHERE user_id=? ';//ここを実装。

    $stmt=$pdo->prepare($sql);
    $data[]=$user_id;
    $stmt ->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    

    $name=$rec["user_name"];
    $description=$rec["user_description"];
    $image= '<img src="' . $rec['user_image'] . '" width="200" height="400">';
    


//userが書いた記事を取得
    $sql = 'SELECT * FROM  user,news WHERE user.user_id=? AND news.news_author=? ';//ここを実装。
    
    $stmt=$pdo->prepare($sql);
    
    $c[]=$user_id;
    $c[]=$user_name;
    $stmt ->execute($c);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $title=$rec['news_title'];
    $news_id=$rec['news_id'];

    
    $dbh=null;

    
?>
<?php include('header.php'); ?>
    <div id="contents">
      <h1><?php echo $name ?></h1>
      <h2><?php echo $description ?></h2>
      <?php echo $image; ?>
      <h3>書いている記事</h3>
      <!--

    -->
    <?php 
      echo '<p><a href="news_detail.php?news_id='.$rec['news_id'].'">'.$rec["news_title"].'</a></p>'; 
    ?>
    </div>
    <?php include('sidebar.php'); ?>
    

