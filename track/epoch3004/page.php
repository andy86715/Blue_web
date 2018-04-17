<?php
    session_start();
    include('../../db.php');

    // $page = $_GET['page'];
    $sql = "SELECT * FROM article_all WHERE art_author = 'epoch3004 (木字旁)' ";
    // $sql = "SELECT * FROM article_all";
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
    	<title>Data Lab</title>
    	<meta charset="utf-8">
    	<!-- <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css"> -->
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
                        <li><a target='_parent' href="epoch3004.php">追蹤名單</a></li>
                        <li>
                            <select onchange="location = this.value;">
                                <option>ID</option>
                                <option value="../Llingjing/Llingjing.php">LLINGJING (冷劍塵)</option>
                                <option value="../zeze/zeze.php">zeze (籠中鳥)</option>
                                <option value="../gossiplarry/gossiplarry.php">gossiplarry (賴瑞)</option>
                                <option value="../p1026/p1026.php">p1026 (豬)</option>
                                <option value="../viable/viable.php">viable (viable)</option>
                                <option value="../fervorya/fervorya.php">fervorya (一..)</option>
                                <option value="../yehz/yehz.php">yehz (葉子)</option>
                                <option value="epoch3004.php">epoch3004 (木字旁)</option>
                                <option value="../ezk/ezk.php">ezk (蒲葵貓)</option>
                                <option value="../lickmebaby/lickmebaby.php">lickmebaby (孤獨..)</option>
                            </select>
                        </li>
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
    					<h2><?php
    						while($row_result=mysqli_fetch_assoc($result)){
    							echo $row_result['art_title'];
    							?></h2>
    							作者:<?php echo $row_result['art_author']."<br>"; ?>
    							時間:<?php echo $row_result['art_date']."<br>"; ?>
    							來源:<a href="<?php echo $row_result['art_website']; ?>">
    							<?php echo $row_result['art_website']; ?>
    						</a>
    						<h1>&nbsp</h1>
    						<p><?php echo $row_result['art_content'];?></p>
    						<?php
    					}
    					?>
    				</div>
    				
    				<br class="clearfix" />
    			</div>
    			<br class="clearfix" />
    		</div>
    		<div align="center">
    			<ul class="pagination">
    				<?php
					    //分頁頁碼
    				echo '共 '.$data_nums.' 篇文章-在第 '.$page.' 篇文章'.'<br>';
    				if($page > 1) {
    					$prevpage = $page + 1;
    					echo "<li><a target='_parent' href=new_page.php?page=".$prevpage.">上一篇</a></li> ";
    				} else{
    					echo "<li><a target='_parent' href=new_page.php?page=1>上一篇</a></li> ";
    				}
    				if ($page < 6) {
    					for( $i=1 ; $i<=6 ; $i++ ) {
    						echo "<li><a target='_parent' href=new_page.php?page=".$i.">".$i."</a></li> ";
    					} 
    				}elseif ($page >= 6 ) {
    					for( $i=1 ; $i<=$pages ; $i++ ) {
    						if ( $page-3 < $i && $i < $page+3 ) {
    							echo "<li><a target='_parent' href=new_page.php?page=".$i.">".$i."</a></li> ";
    						}
    					} 
    				}
    				if ($page != $data_nums+1) {
    					$nextpage = $page - 1;
    					echo "<li><a target='_parent' href=new_page.php?page=".$nextpage.">下一篇</a></li>";
    				} 
    				?>
    			</ul>
    		</div>
    		<br>
    	</div>
    </body>
    </html>