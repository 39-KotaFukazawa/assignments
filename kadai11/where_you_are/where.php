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
$home_params = ['count' => '1'];
$home = $connection->get('statuses/home_timeline', $home_params);


foreach ($home as $i => $tweet) {
	$icon_url = $tweet->user->profile_image_url;
    echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
    // echo $i.':'.$tweet->text.'<br>';
    echo $tweet->user->follower_count;
    '<br>';
    
}



//レスポンス確認
var_dump($home);
?>
<!DOCTYPE html>
<html>
<head lang="ja">
	<meta charset="utf-8">
	<title>tweetから位置情報</title>
	 <script type="text/javascript">
      function GetMap()
      {   

         var map = new Microsoft.Maps.Map(document.getElementById("mapDiv"), 
                           {credentials: "AsVpQVJH57h9UPQGQltSxXGTvgEMsPpBjfmry9GvFD8sm9dGi3kFf5Xu0f-DlToa",
                            center: new Microsoft.Maps.Location(45.5, -122.5),
                            mapTypeId: Microsoft.Maps.MapTypeId.road,
                            zoom: 7});
      }
      </script>
</head>
<body>
	<div onload="GetMap();">
      <div id='mapDiv' style="position:relative; width:400px; height:400px;"></div> 
	<a href="index.php">tweetAPIを試してみた</a>

</body>
</html>