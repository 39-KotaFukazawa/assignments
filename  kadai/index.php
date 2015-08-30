<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>アンケート</title>
</head>
<body>
    <form action="input.php" method="post">
        <p>名前:<input type="text" name="name"></p>
         <p>メール::<input type="text" name="email"></p>
         <p>年齢:<input type="text" name="age"></p>
         <p>性別:<input type="radio" name="male" value="male"checked>男性
        <input type="radio"value="female" name="female">女性</p>
        <p>理由をお答えください。</p>
        <p>
<input type="checkbox" name="reason" value="1" checked="checked">面白い
<input type="checkbox" name="reason" value="2">役に立つ
<input type="checkbox" name="reason" value="3">いまいち
</p>
        <input type="submit" value="送信">
        
    </form>
</body>
</html>