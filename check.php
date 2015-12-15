<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
include('function.php');
if (isWords($_POST['student']) && isID($_POST['IDnumber']) && isEmail($_POST['email']) && isGrade($_POST['chinese']) && isGrade($_POST['english']) && isGrade($_POST['math']) && isGrade($_POST['physics']) && isGrade($_POST['chemistry'])){
	echo '輸入成功';
	write($_POST['student'],$_POST['IDnumber'],$_POST['email'],$_POST['chinese'],$_POST['english'],$_POST['math'],$_POST['physics'],$_POST['chemistry']);
}else{
	echo '輸入失敗';
}


?>
</body>
</html>
