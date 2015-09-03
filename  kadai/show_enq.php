<!--<?php
	$fp = fopen("data/data.csv", "r");

	flock($fp, LOCK_SH);

	while(!feof($fp)){
		$fp_str = fgets($fp);
		echo $fp_str."<br>";
	}
	flock($fp, LOCK_UN);
	fclose($fp);

	?>

	<?php
$fp = fopen("data/data.txt", "r"); //ファイルを開く
flock($fp, LOCK_SH); //ファイルロック
while ($array = fgetcsv( $fp )) { // ファイルを読み込む
$num = count($array); // 行数カウント
for($i=0;$i<$num;$i++){
echo $array[$i];
}
}
flock($fp, LOCK_UN); //ファイルロック解除
fclose($fp); //ファイルを閉じる
?>-->
<!--<?php

$file = "data/data.csv";
if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {
    echo "<table>\n";
    while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
        echo "\t<tr>\n";
        for ( $i = 0; $i < count( $data ); $i++ ) {
            echo "\t\t<td>{$data[$i]}</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    fclose ( $handle );
}

?>-->





<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>アンケート結果</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="jquery.csv2table-0.02-b-4.3.js"></script>
	<script>
		$(function(){
			$('#table_disp').csv2table('data/data.csv');
});
// 	</script>
</head>
<body>
	<div id="table_disp"></div>

</body>
</html>