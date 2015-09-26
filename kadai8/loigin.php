<?php include('header.php') ?>
    <div id="contents">
      <h1>ログインする方はこちら</h1>
	<form method="POST" action="member_login_check.php">
		<p>アドレス</p>
		<input type="text" name="email">
		<p>パスワード</p>
		<input type="password" name="pass">
		<input type="submit" value="LOGIN">
	<p><a href="logout.php">logout</a></p>
	</form>

	<h1>新規の方はこちら</h1>
	<form method="POST" action="add_member.php" enctype="multipart/form-data">
		<p>お名前</p>
		<input type="text" name="name">
		<p>写真</p>
		<input type="file" accept="image/*" capture="camera" name="upfile">
		<p>自己紹介</p>
		<input type="text" name="description">
		<p>メールアドレス</p>
		<input type="text" name="email">
		<p>パスワード</p>
		<input type="password" name="pass1">
		<p>パスワードをもう一度入力してください</p>
		<input type="password" name="pass2">
		<p><input type="submit" value="LOGIN"></p>
	</form>
    </div>
<?php include('sidebar.php'); ?>

 