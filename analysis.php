<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Analysis</title>
	<style type="text/css">
		table{
			border:1px solid black;
		}
		td{
			border:1px solid black;
			text-align: center;
			font-size:25px;
		}
	</style>
</head>
<body>
	<?php
$filepath = 'grade.txt';
$array = file($filepath);
$arraylen = sizeof($array);
$chntotal = 0;
$engtotal = 0;
$mathtotal = 0;
$phytotal = 0;
$chetotal = 0;
$classTotal = 0;//每個人平均的平均
$total = 0;
$rank = array();
$a = 1; //紀錄名次
echo'<table>';
echo'<tr><td>姓名</td><td>學號</td><td>Email</td><td>國文</td><td>英文</td><td>數學</td><td>物理</td><td>化學</td><td>總分</td><td>平均</td><td>名次</td></tr>';
//函式將原本的記事本的陣列加上總分(將標籤設為輸入的資料)
function rankedarray($array){
	foreach($array as $info){
		$sum = 0;
		$entry = explode(',',$info);
		for ($i = 3; $i < 8; $i++){
			$sum+=$entry[$i];
		}
		$rank[$info] = $sum;
		
	}
	return $rank;
}

$rankedarray = rankedarray($array); //將原本的陣列帶入函式
arsort($rankedarray); //照總分排序

foreach($rankedarray as $score =>$all){ //將每個人的資訊細分
	$sum = 0; //每個人的總分
	$info = explode(',',$score); //紀錄每個人的各個資訊的陣列
	/* 以下紀錄所有人各科的加總 */
	$chntotal += $info[3];
	$engtotal += $info[4];
	$mathtotal += $info[5];
	$phytotal += $info[6];
	$chetotal += $info[7];

	$total+=$all;
	
	echo '<tr>';
	foreach($info as $entry){	//將每個人的資訊分配到表格中
	if (is_numeric($entry) && $entry <60 && strlen($entry)<3){
		echo '<td style="color:red;">'.$entry."</td>";
	}else if($entry == 0){

	}
	else{
		echo '<td>'.$entry.'</td>';
		}
	}
	$average = ($all / 5);
	$classTotal +=$average;
	if ($all<60){
		echo '<td style="color:red">'.$all.'</td>';
	}else{
	echo '<td>'.$all.'</td>';
	}
	if ($average <60){
		echo '<td style="color:red;">'.$average.'</td>';
	}else{
	echo '<td>'.$average.'</td>';
	}
	echo '<td>'.$a.'</td>';
	echo '</tr>';
	$a++;

}


//各科平均
$classave = round($classTotal / $arraylen,1); 
$chineseave = round($chntotal / $arraylen,1);
$engave = round($engtotal / $arraylen,1);
$mathave = round($mathtotal/ $arraylen,1);
$phyave = round($phytotal /$arraylen,1);
$cheave = round($chetotal/ $arraylen,1);
$totalave = round($total / $arraylen,1);
$everyave = array($chineseave,$engave,$mathave,$phyave,$cheave,$totalave,$classave);
echo '<tr><td colspan="3">全班各科平均</td>';
foreach($everyave as $ave){
	if ($ave <60){
		echo '<td style="color:red;">'.$ave.'</td>';
	}else{
		echo '<td>'.$ave.'</td>';
	}
}
echo '</tr>';
echo '</table>';
?>
</body>
</html>
