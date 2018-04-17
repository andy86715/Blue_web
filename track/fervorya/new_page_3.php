<?php
	session_start();
    include('../../db.php');
// 改
    $sql = "SELECT * FROM article_all WHERE art_author = 'fervorya (一丄上止正)' ";
    $result=mysqli_query($con,$sql);

	$data_nums = mysqli_num_rows($result); //統計總比數
    $per = 1; //每頁顯示項目數量
    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } else {
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start = ($page-1)*$per; //每一頁開始的資料序號
    $result = mysqli_query($con,$sql.' LIMIT '.$start.', '.$per) or die("Error");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<frameset cols="40%,60%">
            <frame name="view" src="<?php while($row_result=mysqli_fetch_assoc($result)){
                                echo $row_result['art_website']; 
                                ?>"></frame>
            <frame name="view" src="page_3.php?page=<?php echo $page; 
                                }?>"></frame>
    </frameset>
</head>
<body>

</body>
</html>