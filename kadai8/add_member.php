<?php
 $img = "";
  if (!isset($_FILES["upfile"]["error"]) || !is_int($_FILES["upfile"]["error"])) {
    echo "パラメーターが不正です。";
  }else{
  	//file取得少し複雑なので先に。
  	$file_name = $_FILES["upfile"]["name"];//filesなので、２つ取る。
    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得
    $tmp_path = $_FILES["upfile"]["tmp_name"];//一度tmp_nameに保存（キャッシュ？）のちにMoveさせる。
    $uniq_name = date("YmdHis").session_id() . "." . $extension; //ユニークファイル名作成

    $file_dir_path = "upload/";
    $img = "";

    //fileupload スタート！
    if (is_uploaded_file($tmp_path)) { //画像が上がってきていれば。
      if (move_uploaded_file($tmp_path, $file_dir_path.$uniq_name)) { //move関数の形（移動のもの,場所）.は変数と文字列をくっつけるもの

        chmod($file_dir_path.$uniq_name,0644);//権限を与える。

        echo $uniq_name."をアップロードしました。";
        $img = '<img src="'.$file_dir_path.$uniq_name.'">';
    }
}
}


 //サニタイズ関数
 require_once('functions/sanitize.php');

//新規ログイン情報取得
 $post=sanitize($_POST);
 $name=$post['name'];
 $email=$post['email'];
 $description=$post['description'];
 $pass1=$post['pass1'];
 $pass2=$post['pass2'];
 

 $okflag = true;


//以下チェック
 if ($name=='') 
 {
 	print 'お名前が入力されていません';
 	$okflag = false;
 
 }
 else
 {
 	print 'お名前<br/>';
 	print $name;
 	print '<br/>';
 }

 if (preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',$email)==0) 
 {
 	print 'メールアドレスを正確に入力してください<br/><br/>';
 	$okflag = false;
 	
 }
 else
 {
 	print 'メールアドレス<br/>';
 	print $email;
 	print '<br/>';
 }

 if ($description=='') 
 {
 	print '自己紹介が登録されていません';
 	$okflag = false;
 	
 }
 else
 {
 	print '自己紹介<br/>';
 	print $description;
 	print '<br/>';
 }

 if ($pass1 != $pass2) 
 {
	print "パスワードが一致しません";
	$okflag = false;
}
if ($name=='' || $pass1=='' || $pass1 != $pass2) 
{
	print "<form>";
	print "<input type='button' onclick='history.back()' value='back'>";
	print "</form>";
 }

 if ($okflag==true) 
 {
 	
 	$dsn = 'mysql:dbname=cms_news;host=localhost';
	$user='root';
	$password='';
	$dbh = new PDO($dsn,$user,$password);
	$dbh -> query('SET NAMES utf8');


	$sql ='INSERT INTO user(user_name, user_email,user_pass, user_image, user_description)VALUES
       	(?,?,?,?,?)';
	$stmt = $dbh ->prepare($sql);
	$data[]=$name;
	$data[]=$email;
	$data[]=$pass1;
	$data[]=$file_dir_path.$uniq_name;
	$data[]=$description;

	$stmt->execute($data);

	$dbh=null;




 }
 

 // 	//1. 接続します
 //      $pdo = new PDO('mysql:dbname=cms_news;host=localhost', 'root', '');
 //      //2. DB文字コードを指定
 //      $stmt = $pdo->query('SET NAMES utf8');
 //      //３．データ登録SQL作成
 //      $stmt = $pdo->prepare("INSERT INTO user(user_id,user_name, user_email,user_pass, user_image, user_description)VALUES
 //      	(NULL,:name,:email,:pass1,:image,:description");
 //      $stmt->bindValue(':name', $name);
 //      $stmt->bindValue(':email', $email);
 //      $stmt->bindValue(':pass1', $pass1);
 //      $stmt->bindValue(':image', $file_dir_path.$uniq_name);
 //      $stmt->bindValue(':description', $description);
 //      $status = $stmt->execute();
 //      if($status==false){
 //        echo "SQLエラー";
 //        exit;
 //      }else{
 //        echo "登録完了！";
 //      }

 //      }else{
 //        echo "Error:アップロードできませんでした。";
 //      }
 // // else
 // {
 // 	print '<input type="button" onclick="history.back()" value="戻る">';
 // }
?>
<!--HTMl-->
<?php include('header.php') ?>
    <div id="contents">
      
    </div>
 <?php include('sidebar.php'); ?>

 