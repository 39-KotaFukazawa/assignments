<?php
  $user_id=$_GET['user_id'];

  //情報をget
    $pdo = new PDO("mysql:host=localhost;dbname=cms_news;charset=utf8","root","");

    $sql = 'SELECT * FROM user WHERE user_id=?';

    $stmt=$pdo->prepare($sql);
    $data[]=$user_id;
    $stmt ->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    

    $name=$rec["user_name"];
    $description=$rec["user_description"];
    $image= '<img src="' . $rec['user_image'] . '" width="200" height="400">';

    $dbh=null;

    
?>
<?php include('header.php'); ?>
    <div id="contents">
      <h1><?php echo $name ?></h1>
      <h2><?php echo $description ?></h2>
      <?php echo $image; ?>
    </div>
    <?php include('sidebar.php'); ?>
    

