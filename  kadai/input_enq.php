
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>アンケート</title>
</head>
<body>
    <form action="input_finish.php" method="post">
        <p>名前:<input type="text" name="name"></p>
         <p>メール::<input type="text" name="email"></p>
         <p>年齢:<input type="text" name="age"></p>
         <p>性別:<input type="radio" name="sex" value="male"checked>男性
        <input type="radio"value="female" name="sex">女性</p>
        <p>選んだ理由をお答えください。</p>
        <p>
<input type="checkbox" name="reason[]" value="1" checked="checked">面白い
<input type="checkbox" name="reason[]" value="2">役に立つ
<input type="checkbox" name="reason[]" value="3">楽しそう
</p>
        <input type="submit" value="送信">
    </form>
    <form action="confirm.php" method="post">
        <input type="submit" value="内容を確認">
    </form>
</body>
</html>