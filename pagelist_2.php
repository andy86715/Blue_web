<?php
	session_start();
	include('db.php');

	// $sql = "SELECT * FROM emotion, article WHERE emotion.art_newID=article.art_newID";
	$sql = "SELECT * FROM article";
	$result=mysqli_query($con,$sql);


	$data_nums = mysqli_num_rows($result); //統計總比數
    $per = 10; //每頁顯示項目數量
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
	<title>Data Lab</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="logo">
				<h1>Blue專案</h1>
			</div>
			<div id="menu">
				<ul>
					<li><a target='_parent' href="index_2.php">首頁</a></li>
					<li><a target='_parent' href="pagelist_2.php">文章列表</a></li>
					<li><a target='_parent' href="./track/Llingjing/Llingjing_2.php">追蹤名單</a></li>
				</ul>
				<br class="clearfix" />
			</div>
		</div>
		<div id="page">
			<div id="sidebar">
				<div class="box">
					<div>
						<form method="post" action="login.php">
							Hello~~5678
						</form>
						<button>
							<a target='_parent' href="logout.php">登出</a>
						</button>
					</div>
				</div>
			</div>
			<div id="content">
				<div class="box">
					<h2 align="center">PTT憂鬱版文章</h2>
					<dl>
						<dd>
							<form action="pagelist_search_2.php" method="post">
								<div align="right">
									<input type="text" name="search" placeholder="輸入文章" >
									<input type="submit" name="button" value="搜尋">
								</div>
							</form>
							<ul>
								<li>
								<?php
									while($row_result=mysqli_fetch_assoc($result)){
										?>
										<a href="new_page2.php?page=<?php echo $row_result['art_newID']?>">
										<?php
										if ($row_result['art_insert2'] == 1) {
											echo '['.$row_result['art_classify'].']';
											echo $row_result['art_title'];
											echo "<br>";
											// echo "---(已評分)"."<br>";
										}else{
											echo '['.$row_result['art_classify'].']';
											echo $row_result['art_title']."<br>";
										   	}
										}
								?>
								 </a></li>
							</ul>
						</dd>
					</dl>
				</div>
				<br class="clearfix" />
			</div>
			<br class="clearfix" />
		</div>
		<div class="center">
			<ul class="pagination">
			<?php
			    //分頁頁碼
			    echo '共 '.$data_nums.' 筆-在 '.$page.' 頁-共 '.$pages.' 頁';
			    echo "<br /><li><a href=?page=1>首頁</a></li> ";

			    if($page > 1) {
			    	$prevpage = $page - 1;
			    	echo "<li><a href=?page=".$prevpage.">上一頁</a></li> ";
			    	} else{
			    		echo "<li><a href=?page=1>上一頁</a></li> ";
			    	}
			    if ($page < 6) {
			    	for( $i=1 ; $i<=6 ; $i++ ) {
			    		echo "<li><a href=?page=".$i.">".$i."</a></li> ";
			    	} 
			    }elseif ($page >= 6 ) {
			    	for( $i=1 ; $i<=$pages ; $i++ ) {
			    	    if ( $page-3 < $i && $i < $page+3 ) {
			    	        echo "<li><a href=?page=".$i.">".$i."</a></li> ";
			    	    }
			    	} 
			    }

			    if ($page != $data_nums) {
			    	$nextpage = $page + 1;
			    	echo "<li><a href=?page=".$nextpage.">下一頁</a></li>";
			    } 

			    echo " <li><a href=?page=".$pages.">末頁</a></li><br /><br />";
			?>
			</ul>
		</div>
	</div>
</body>
</html>