<?php 

$staff_name = $_POST['name'];
$staff_pass = $_POST['pass'];
$staff_pass2 = $_POST['pass2'];

$staff_name = htmlspecialchars($staff_name);
$staff_pass = htmlspecialchars($staff_pass);
$staff_pass2 = htmlspecialchars($staff_pass2);

if ($staff_name=='') {
	print "スタッフ名が入力されていません";
}else{
	print "スタッフ名";
	print $staff_name;
}
if ($staff_pass=='') {
	print "パスワードを入力してください";
}

if ($staff_pass != $staff_pass2) {
	print "パスワードが一致しません";
}
if ($staff_name=='' || $staff_pass=='' || $staff_pass != $staff_pass2) {
	print "<form>";
	print "<input type='button' onclick='history.back()' value='back'>";
	print "</form>";
}else{
	$staff_pass = md5($staff_pass);
	print "<form method='Post'action='admin_add_done.php'>";
	print '<input type="hidden" name="name" value="'.$staff_name.'">';
	print'<input type="hidden" name="pass" value="'.$staff_pass.'">';	
	print "<input type='button' onclick='history.back()' value='back'>";
	print "<input type='submit' value='OKEY'>";
	print "</form>";
}

?>

