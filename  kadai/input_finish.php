<?php

//情報を受け取る
$name = $_POST["name"];
$age= $_POST["age"];
$mail= $_POST["email"];
$sex = $_POST["sex"];
$reason = $_POST["reason"];

var_dump($reason);



//$reason = $_POST["reason"];



$name = htmlspecialchars($name);
$age = htmlspecialchars($age);
$mail = htmlspecialchars($mail);
$sex = htmlspecialchars($sex);





// var_dump($reason["reason"]);


if ($name=="") {
	echo "名前を入力してください。<br>";
}else{
	echo "Hello #{$name}<br>";
}
if ($age=="") {
	echo "年齢を入力してください。<br>";
}else{
	echo "Your age is #{$age}<br>";
}
if ($mail=="") {
	echo "メールアドレスを入力してください。<br>";
}else{
	echo "Your email is #{$mail}<br>";
}
$count = count($reason);
for ($i=0; $i < $count; $i++) { 
     $reasons=$reason[$i];
     echo $reasons;
}

if ($name=="" || $age=="" || $mail=="" || $reason=="") {
	echo "<form>";
	echo "<input type='button' onclick='history.back()' value='戻る''>";
	echo "</form>";
}else{

// 	$reasons = array(1 => "役に立つから", 2=> "面白いから",3=> "スキルアップのため");

// foreach ($reason as $value ) {
// 	$select_reason .=$reasons[$value].",";
// }
// $reason_list = rtrim($select_reason).",";
// echo $reason_list."をえらびました";
// var_dump($reason_list);
	
	
	$str = $name.",".$age.",".$mail.",".$sex.",".$reasons.","."\n";



	$file = fopen("data/data.csv", "a");
	flock($file, LOCK_EX);
	fwrite($file,$str);
	flock($file, LOCK_UN);
	fclose($file);
	echo "{$name}さん、入力THANK YOU SO MUCH!!";

	echo "<form method='post' action='show_enq.php'>";
	echo "<input type='submit' value='結果を表示する''>";
	echo "<input type='button' onclick='history.back()' value='戻る''>";
	echo "</form>";
}



?>
<!DOCTYPE html>
<html>
<head lang="ja">
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
