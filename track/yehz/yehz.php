<?php
	session_start();
	include('../../db.php');

		// $sql = "SELECT * FROM emotion, article WHERE emotion.art_newID=article.art_newID";
	$sql = "SELECT * FROM article_all WHERE art_author = 'yehz (葉子)' ORDER BY art_newID DESC";
    // $sql = "SELECT * FROM article_all";
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
    	<link rel="stylesheet" type="text/css" href="../../style.css">
    </head>
    <body>
    	<div id="wrapper">
    		<div id="header">
    			<div id="logo">
    				<h1>Blue專案</h1>
    			</div>
    			<div id="menu">
    				<ul>
    					<li><a href="../../index.php" target="_parent">首頁</a></li>
    					<li><a href="../../pagelist.php" target="_parent">文章列表</a></li>
                        <li><a>追蹤名單
                            <select onchange="location = this.value;">
                                <option>ID</option>
                                <option value="../Llingjing/Llingjing.php">LLINGJING (冷劍塵)</option>
                                <option value="../zeze/zeze.php">zeze (籠中鳥)</option>
                                <option value="../gossiplarry/gossiplarry.php">gossiplarry (賴瑞)</option>
                                <option value="../p1026/p1026.php">p1026 (豬)</option>
                                <option value="../viable/viable.php">viable (viable)</option>
                                <option value="../fervorya/fervorya.php">fervorya (一..)</option>
                                <option value="yehz.php">yehz (葉子)</option>
                                <option value="../epoch3004/epoch3004.php">epoch3004 (木字旁)</option>
                                <option value="../ezk/ezk.php">ezk (蒲葵貓)</option>
                                <option value="../lickmebaby/lickmebaby.php">lickmebaby (孤獨..)</option>
                            </select>
                        </a></li>
    				</ul>
    				<br class="clearfix" />
    			</div>
    		</div>
    		<div id="page">
    			<div id="sidebar">
    				<div class="box">
    					<div>
    						<form method="post" action="../../login.php">
    							帳號:<input type="text" name="account">
    							<br>
    							密碼:<input type="password" name="password">
    							<br>
    							<button type="submit"> 登入</button>
    						</form>
    					</div>
    				</div>
    			</div>
    			<div id="content">
    				<div class="box">
    					<h2 align="center">yehz (葉子)</h2>
    					<dl>
    						<dd>
    							<!-- <form action="pagelist_search.php" method="post">
    								<div align="right">
    									<input type="text" name="search" placeholder="輸入文章" >
    									<input type="submit" name="button" value="搜尋">
    								</div>
    							</form> -->
    							<ul>
    								<li>
    									<?php
                                        if ($page==1) {
                                            $art = 173;
                                        }
                                        if ($page==2) {
                                            $art = 163;
                                        }
                                        if ($page==3) {
                                            $art = 153;
                                        }
                                        if ($page==4) {
                                            $art = 143;
                                        }
                                        if ($page==5) {
                                            $art = 133;
                                        }
                                        if ($page==6) {
                                            $art = 123;
                                        }
                                        if ($page==7) {
                                            $art = 113;
                                        }
                                        if ($page==8) {
                                            $art = 103;
                                        }
                                        if ($page==9) {
                                            $art = 93;
                                        }
                                        if ($page==10) {
                                            $art = 83;
                                        }
                                        if ($page==11) {
                                            $art = 73;
                                        }
                                        if ($page==12) {
                                            $art = 63;
                                        }
                                        if ($page==13) {
                                            $art = 53;
                                        }
                                        if ($page==14) {
                                            $art = 43;
                                        }
                                        if ($page==15) {
                                            $art = 33;
                                        }
                                        if ($page==16) {
                                            $art = 23;
                                        }
                                        if ($page==17) {
                                            $art = 13;
                                        }
                                        if ($page==18) {
                                            $art = 3;
                                        }
    									while($row_result=mysqli_fetch_assoc($result)){
    										?>
    										<a href="new_page.php?page=<?php echo $art?>">
    											<?php
    											echo $row_result['art_title']."<br>";
                                                $art -=1;
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
                        // $page = 1;
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