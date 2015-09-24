<?php
try
{
	$member_email = $_POST['email'];
	$member_pass = $_POST['pass'];



	$member_email = htmlspecialchars($member_email);
	$member_pass = htmlspecialchars($member_pass);

	

	$dsn = 'mysql:dbname=cms_news;host=localhost';
	$user='root';
	$password='';
	$dbh = new PDO($dsn,$user,$password);
	$dbh -> query('SET NAMES utf8');

	$sql ='SELECT user_id,user_name FROM  user WHERE user_email=? AND user_pass=?';
	$stmt = $dbh ->prepare($sql);
	$data[]=$member_email;
	$data[]=$member_pass;
	$stmt->execute($data);

	$dbh = null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($rec ==false) {
		print "メールアドレスかパスワードが間違っています";
		print '<a href="news_top.php">戻る</a>';
	}else{
		session_start();
		$_SESSION['member_login']=1;
		$_SESSION['member_code'] = $rec['user_id'];
		$_SESSION['member_name'] =$rec['user_name'];
		header('Location:news_top.php');
	}
}
catch(Exception $e)
{
	print 'ただいま障害により大変なご迷惑をおかけしています';
	exit();
}
?>


<?php include('header.php') ?>
    <div id="contents">
      
    </div>
    <?php include('sidebar.php'); ?>

 