<?php

// OAuthライブラリの読み込み
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

//認証情報４つ
$consumerKey = "fNEWSPlfKWlHEtF3U2ZHVACsl";
$consumerSecret = "RK2xSGaN9xDbmaNCmQAp69N8Mz4XdiavGSucewPsuSEwS6nnIu";
$accessToken = "2868439833-TC3h1EjttCV4swB5fmV6Siw1RHlYQPlH46c4Pkn";
$accessTokenSecret = "VBOiuTrV7kBFlKmBjqH7x4qf2Qb1v9PET7yjJWAWNtTFz";

//接続
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

//ツイート
// $res = $connection->post("statuses/update", array("status" => "テストメッセージ"));
// 自分のタイムラインを取得して表示
$home_params = ['count' => '5'];
$home = $connection->get('statuses/home_timeline', $home_params);


foreach ($home as $i => $tweet) {
	$icon_url = $tweet->user->profile_image_url;
    echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
    echo $i.':'.$tweet->text.'<br>';
    echo $tweet->user->name;
    '<br>';
    
}

//友達の情報を取得。
$user_params = array(
	'screen_name'=>'@s_n_0123',
	'count'=>'5'
	);
$user = $connection->get('statuses/user_timeline', $user_params);



foreach ($user as $i => $tweet) {
	$icon_url = $tweet->user->profile_image_url;
    echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
    $tweet_text = $i.':'.$tweet->text.'<br>';
    echo $tweet_text;
    echo $tweet->user->name;
    '<br>';
    // [つぶやく] 下のコメントを外すと、指定した友達のツイートが自分のツイートとなる。大変なことになる。笑
	// $status = $connection->post('statuses/update', ['status' =>$tweet_text]);
    
}


//レスポンス確認
// var_dump($home);
?>
<!DOCTYPE html>
<html>
<head lang="ja">
	<meta charset="utf-8">
	<title>twitterAPIを使った遊び</title>
</head>
<body>
	<a href="where.php">tweetを元に位置情報を地図に表示する</a>

</body>
</html>