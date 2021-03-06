<?php
    session_start();
    include('db.php');

    // $page = $_GET['page'];
    $sql=" SELECT * FROM `article` ";
    // $sql2 = "SELECT * FROM `emotion` WHERE `art_newID` = '$page' ";
    $result=mysqli_query($con,$sql);
    // $result2=mysqli_query($con,$sql2);

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
    					<li><a href="index.php" target="_parent">首頁</a></li>
    					<li><a href="pagelist.php" target="_parent">文章列表</a></li>
                        <li><a href="./track/Llingjing/Llingjing.php" target='_parent'>追蹤名單</a></li>
    				</ul>
    				<br class="clearfix" />
    			</div>
    		</div>
    		<div id="page">
    			<div id="sidebar">
    				<div class="box">
    					<div>
    						<form method="post" action="login.php">
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
    							echo '['.$row_result['art_classify'].']';
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
    					$prevpage = $page - 1;
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
    				if ($page != $data_nums) {
    					$nextpage = $page + 1;
    					echo "<li><a target='_parent' href=new_page.php?page=".$nextpage.">下一篇</a></li>";
    				} 
    				?>
    			</ul>
    		</div>
    		<br>
    	</div>
    </body>
    </html>