<?php
	session_start();
	include('../../db.php');
// 勾選資料寫入
	$page = $_POST['number'];
	$emotion1_1 = $_POST['notes1_1']? 1:0;
	$emotion1_2 = $_POST['notes1_2']? 1:0;
	$emotion1_3 = $_POST['notes1_3']? 1:0;
	$emotion2_1 = $_POST['notes2_1']? 1:0;
	$emotion3_1 = $_POST['notes3_1']? 1:0;
	$emotion4_1 = $_POST['notes4_1']? 1:0;
	$emotion5_1 = $_POST['notes5_1']? 1:0;
	$emotion6_1 = $_POST['notes6_1']? 1:0;
	$emotion6_2 = $_POST['notes6_2']? 1:0;
	$emotion7_1 = $_POST['notes7_1']? 1:0;
	$emotion8_1 = $_POST['notes8_1']? 1:0;
	$emotion9_1 = $_POST['notes9_1']? 1:0;
	$emotion9_2 = $_POST['notes9_2']? 1:0;
	$emotion9_3 = $_POST['notes9_3']? 1:0;
	$emotion9_4 = $_POST['notes9_4']? 1:0;
	$emotion10_1 = $_POST['notes10_1']? 1:0;
	$emotion11_1 = $_POST['notes11_1']? 1:0;
	$notes1_1 = $_POST['notes1_1'];
	$notes1_2 = $_POST['notes1_2'];
	$notes1_3 = $_POST['notes1_3'];
	$notes2_1 = $_POST['notes2_1'];
	$notes3_1 = $_POST['notes3_1'];
	$notes4_1 = $_POST['notes4_1'];
	$notes5_1 = $_POST['notes5_1'];
	$notes6_1 = $_POST['notes6_1'];
	$notes6_2 = $_POST['notes6_2'];
	$notes7_1 = $_POST['notes7_1'];
	$notes8_1 = $_POST['notes8_1'];
	$notes9_1 = $_POST['notes9_1'];
	$notes9_2 = $_POST['notes9_2'];
	$notes9_3 = $_POST['notes9_3'];
	$notes9_4 = $_POST['notes9_4'];
	$notes10_1 = $_POST['notes10_1'];
	$notes11_1 = $_POST['notes11_1'];
	$emotion_grade = $_POST['emotion_grade'];
	$notes = $_POST['notes'];
	$hopeful_grade = $_POST['hopeful_grade'];
	$hopeful_grade2 = $_POST['hopeful_grade2'];
	$hopeful_note = $_POST['hopeful_note'];
	$hopeful_note2 = $_POST['hopeful_note2'];
	//文章分類
	$classify_1 = NULL;
	$classify_2 = NULL;
	$classify_3 = NULL;
	$classify_4 = NULL;
	$classify_5 = NULL;
	$classify_6 = NULL;
	$classify_7 = NULL;
	$classify_8 = NULL;
	$classify_9 = NULL;
	$classify_10 = NULL;
	$classify_11 = NULL;
	$classify_12 = NULL;
	$classify_13 = NULL;

	if (empty($_POST['classify_1'])!=1) {
		$classify_1 = $_POST['classify_1']."、";
	}else{
		$classify_1 = NULL;
	}
	if (empty($_POST['classify_2'])!=1) {
		$classify_2 = $_POST['classify_2']."、";
	}else{
		$classify_2 = NULL;
	}
	if (empty($_POST['classify_3'])!=1) {
		$classify_3 = $_POST['classify_3']."、";
	}else{
		$classify_3 = NULL;
	}
	if (empty($_POST['classify_4'])!=1) {
		$classify_4 = $_POST['classify_4']."、";
	}else{
		$classify_4 = NULL;
	}
	if (empty($_POST['classify_5'])!=1) {
		$classify_5 = $_POST['classify_5']."、";
	}else{
		$classify_5 = NULL;
	}
	if (empty($_POST['classify_6'])!=1) {
		$classify_6 = $_POST['classify_6']."、";
	}else{
		$classify_6 = NULL;
	}
	if (empty($_POST['classify_7'])!=1) {
		$classify_7 = $_POST['classify_7']."、";
	}else{
		$classify_7 = NULL;
	}
	if (empty($_POST['classify_8'])!=1) {
		$classify_8 = $_POST['classify_8']."、";
	}else{
		$classify_8 = NULL;
	}
	if (empty($_POST['classify_9'])!=1) {
		$classify_9 = $_POST['classify_9']."、";
	}else{
		$classify_9 = NULL;
	}
	if (empty($_POST['classify_10'])!=1) {
		$classify_10 = $_POST['classify_10']."、";
	}else{
		$classify_10 = NULL;
	}
	if (empty($_POST['classify_11'])!=1) {
		$classify_11 = $_POST['classify_11']."、";
	}else{
		$classify_11 = NULL;
	}
	if (empty($_POST['classify_12'])!=1) {
		$classify_12 = $_POST['classify_12']."、";
	}else{
		$classify_12 = NULL;
	}
	if (empty($_POST['classify_1'])!=1) {
		$classify_13 = $_POST['classify_13'];
	}else{
		$classify_13 = NULL;
	}
	$classify = $classify_1.$classify_2.$classify_3.$classify_4.$classify_5.$classify_6.$classify_7.$classify_8.$classify_9.$classify_10.$classify_11.$classify_12.$classify_13;
// 改
	$art = "SELECT * FROM `p1026_3` WHERE `art_newID` = '$page' ";
	$result = mysqli_query($con,$art);

	if(mysqli_num_rows($result) > 0){
		// 改
		$sql = "UPDATE `p1026_3` SET `emotion1_1` = '$emotion1_1', `emotion1_2` = '$emotion1_2', `emotion1_3` = '$emotion1_3', `emotion2_1` = '$emotion2_1', `emotion3_1` = '$emotion3_1', `emotion4_1` = '$emotion4_1', `emotion5_1` = '$emotion5_1', `emotion6_1` = '$emotion6_1', `emotion6_2` = '$emotion6_2', `emotion7_1` = '$emotion7_1', `emotion8_1` = '$emotion8_1', `emotion9_1` = '$emotion9_1', `emotion9_2` = '$emotion9_2', `emotion9_3` = '$emotion9_3', `emotion9_4` = '$emotion9_4', `emotion10_1` = '$emotion10_1', `emotion11_1` = '$emotion11_1', `notes1_1` = '$notes1_1', `notes1_2` = '$notes1_2', `notes1_3` = '$notes1_3', `notes2_1` = '$notes2_1', `notes3_1` = '$notes3_1', `notes4_1` = '$notes4_1', `notes5_1` = '$notes5_1', `notes6_1` = '$notes6_1', `notes6_2` = '$notes6_2', `notes7_1` = '$notes7_1', `notes8_1` = '$notes9_1', `notes9_1` = '$notes9_1', `notes9_2` = '$notes9_2', `notes9_3` = '$notes9_3', `notes9_4` = '$notes9_4', `notes10_1` = '$notes10_1',`notes11_1` = '$notes11_1',`emotion_grade` = '$emotion_grade', `notes` = '$notes', `hopeful_grade` = '$hopeful_grade', `hopeful_note` = '$hopeful_note', `hopeful_grade2` = '$hopeful_grade2', `hopeful_note2` = '$hopeful_note2', `classify` = '$classify' WHERE `p1026_3`.`art_newID` = '$page' ";
		//改
	}else{
		// 改
		$sql = "INSERT INTO `p1026_3` (`emotion_2ID`, `art_newID`, `emotion1_1`, `emotion1_2`, `emotion1_3`, `emotion2_1`, `emotion3_1`, `emotion4_1`, `emotion5_1`, `emotion6_1`, `emotion6_2`, `emotion7_1`, `emotion8_1`, `emotion9_1`, `emotion9_2`, `emotion9_3`, `emotion9_4`, `emotion10_1`, `emotion11_1`,`notes1_1`, `notes1_2`, `notes1_3`, `notes2_1`, `notes3_1`, `notes4_1`, `notes5_1`, `notes6_1`, `notes6_2`, `notes7_1`, `notes8_1`, `notes9_1`, `notes9_2`, `notes9_3`, `notes9_4`, `notes10_1`,`notes11_1`,`emotion_grade`, `notes`,`hopeful_grade`,`hopeful_note`,`hopeful_grade2`,`hopeful_note2`,`classify`)
		VALUES (NULL,'$page','$emotion1_1','$emotion1_2','$emotion1_3','$emotion2_1','$emotion3_1','$emotion4_1','$emotion5_1','$emotion6_1','$emotion6_2','$emotion7_1','$emotion8_1','$emotion9_1','$emotion9_2','$emotion9_3','$emotion9_4','$emotion10_1','$emotion11_1','$notes1_1','$notes1_2','$notes1_3','$notes2_1','$notes3_1','$notes4_1','$notes5_1','$notes6_1','$notes6_2','$notes7_1','$notes8_1','$notes9_1','$notes9_2','$notes9_3','$notes9_4','$notes10_1','$notes11_1','$emotion_grade','$notes','$hopeful_grade','$hopeful_note','$hopeful_grade2','$hopeful_note2','$classify')";
	}
	mysqli_query($con,$sql);

	$page2 = $page-1;
	header("HTTP/1.1 301 Moved Permanently");
// 改
	header("Location: http://localhost/proj-blue/track/p1026/new_page_3.php?page=$page2");
	// header("Location: http://d-lab.in/proj-blue/track/p1026/new_page_3.php?page=$page2");
?>