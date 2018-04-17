<?php
session_start();
include('../../db.php');

$page = $_GET['page'];
// 改
$sql = "SELECT * FROM article_all WHERE art_author = 'p1026 (豬)' ";
//改
$sql2 = "SELECT * FROM `p1026_2` WHERE `art_newID` = '$page' ";
$result=mysqli_query($con,$sql);
$result2=mysqli_query($con,$sql2);
$row_result2=mysqli_fetch_assoc($result2);

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

    <script type="text/javascript">
    	
    	$(document).ready(function(){
    		$(".ibtn").click(function(){
    			$(this).prop("checked", true);
    		});
    	});

    </script>


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
    					<li><a target='_parent' href="../../index_2.php">首頁</a></li>
    					<li><a target='_parent' href="../../pagelist_2.php">文章列表</a></li>
                        <!-- 改 -->
                        <li><a target='_parent' href="p1026_2.php">追蹤名單</a></li>
                        <li><a>
                            <select onchange="location = this.value;">
                                <option>ID</option>
                                <!-- 改 -->
                                <option value="../Llingjing/Llingjing_2.php">LLINGJING (冷劍塵)</option>
                                <option value="../zeze/zeze_2.php">zeze (籠中鳥)</option>
                                <option value="../gossiplarry/gossiplarry_2.php">gossiplarry (賴瑞)</option>
                                <option value="p1026_2.php">p1026 (豬)</option>
                                <option value="../viable/viable_2.php">viable (viable)</option>
                                <option value="../fervorya/fervorya_2.php">fervorya (一..)</option>
                                <option value="../yehz/yehz_2.php">yehz (葉子)</option>
                                <option value="../epoch3004/epoch3004_2.php">epoch3004 (木字旁)</option>
                                <option value="../ezk/ezk_2.php">ezk (蒲葵貓)</option>
                                <option value="../lickmebaby/lickmebaby_2.php">lickmebaby (孤獨..)</option>
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
    							Hello~~5678
    						</form>
    						<button>
    							<a target='_parent' href="../../logout.php">登出</a>
    						</button>
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
    				<form action="emotion_2.php" method="post" target="_parent">
    					<div>
    						<input type="hidden" name="number" value="<?php echo $_GET['page'] ?>"/>
    					</div>
                        <strong>總分:</strong>
                        <div class="boxright">
                            <input type="number" name="emotion_grade" placeholder="<?php                                
                            echo $row_result2['emotion_grade']; 
                            ?>" value="<?php if ($row_result2['emotion_grade'] != 0) {
                                echo $row_result2['emotion_grade'];
                            } ?>">
                        </div>
    					<br>
    					<div>
    						<h3>DSM-5面相</h3>
    						<div> 

    							<strong>常感到情緒低落、沮喪或失望</strong>
    						
    							<div class="boxright">
    								<input type="hidden" name="notes1_1" class="ibtn">負向情緒 <br>
    								<textarea name="notes1_1"><?php echo $row_result2['notes1_1']; ?></textarea><br>
    								<input type="hidden" name="notes1_2" class="ibtn">無緣無故哭泣 <br>
    								<textarea name="notes1_2"><?php echo $row_result2['notes1_2']; ?></textarea><br>
    								<input type="hidden" name="notes1_3" class="ibtn">感到痛苦、絕望 <br>
    								<textarea name="notes1_3"><?php echo $row_result2['notes1_3']; ?></textarea>
    							</div>

    							<strong>對日常活動失去興趣或樂趣</strong>

    							<div class="boxright">
    								<input type="hidden" name="notes2_1" class="ibtn">失去活力，興趣，愉悅感 <br>
    								<textarea name="notes2_1"><?php echo $row_result2['notes2_1']; ?></textarea><br>
    							</div>

    							<strong>失眠或睡眠過度</strong>

    							<div class="boxright">
    								<input type="hidden" name="notes3_1" class="ibtn">睡眠不正常 <br>
    								<textarea name="notes3_1"><?php echo $row_result2['notes3_1']; ?></textarea><br>
    							</div>

    							<strong>精神運動激昂或遲滯</strong>

    							<div class="boxright">
    								<input type="hidden" name="notes4_1" class="ibtn">情緒不穩，暴躁，易怒 <br>
    								<textarea name="notes4_1"><?php echo $row_result2['notes4_1']; ?></textarea><br>
    							</div>

    							<strong>疲倦或缺乏活力</strong>

    							<div class="boxright">
    								<input type="hidden" name="notes5_1" class="ibtn">感覺怠惰 <br>
    								<textarea name="notes5_1"><?php echo $row_result2['notes5_1']; ?></textarea><br>
    							</div>

    							<strong>無價值感或過度不適當的罪惡感</strong>

    							<div class="boxright">
    								<input type="hidden" name="notes6_1" class="ibtn">自我否定 <br>
    								<textarea name="notes6_1"><?php echo $row_result2['notes6_1']; ?></textarea><br>
    								<input type="hidden" name="notes6_2" class="ibtn">人際問題 <br>
    								<textarea name="notes6_2"><?php echo $row_result2['notes6_2']; ?></textarea><br>
    							</div>

    							<strong>精神不集中，注意力減退</strong>

    							<div class="boxright">
    								<input type="hidden" name="notes7_1" class="ibtn">無法集中精神 <br>
    								<textarea name="notes7_1"><?php echo $row_result2['notes7_1']; ?></textarea><br>
    							</div>

    							<strong>反覆的想到死亡或有自殺的念頭</strong>

    							<div class="boxright">
    								<input type="hidden" name="notes8_1" class="ibtn">有死亡想法，自殺意念及計畫 <br>
    								<textarea name="notes8_1"><?php echo $row_result2['notes8_1']; ?></textarea><br>
    							</div>

    							<strong>其他</strong>

    							<div class="boxright">
    								<input type="hidden" name="notes9_1" class="ibtn">消極想法 <br>
    								<textarea name="notes9_1"><?php echo $row_result2['notes9_1']; ?></textarea><br>
    								<input type="hidden" name="notes9_2" class="ibtn">遺憾為中心的憂鬱 <br>
    								<textarea name="notes9_2"><?php echo $row_result2['notes9_2']; ?></textarea><br>
    								<input type="hidden" name="notes9_3" class="ibtn">缺乏動機，感到迷茫 <br>
    								<textarea name="notes9_3"><?php echo $row_result2['notes9_3']; ?></textarea><br>
    								<input type="hidden" name="notes9_4" class="ibtn">具憂鬱病識感 <br>
    								<textarea name="notes9_4"><?php echo $row_result2['notes9_4']; ?></textarea><br>
    							</div>

                                <strong>生理症狀</strong>

                                <div class="boxright">
                                    <input type="hidden" name="notes10_1" class="ibtn">
                                    <textarea name="notes10_1"><?php echo $row_result2['notes10_1']; ?></textarea><br>
                                </div>

                                <strong>求救訊號</strong>

                                <div class="boxright">
                                    <input type="hidden" name="notes11_1" class="ibtn">
                                    <textarea name="notes11_1"><?php echo $row_result2['notes11_1']; ?></textarea><br>
                                </div>

    							<strong>備註:</strong>
    							<div class="boxright">
    								<textarea name="notes"><?php echo $row_result['notes']; ?></textarea>
    							</div>
    						</div>
    					</div>
                        <br>
                        <strong>全文希望感分數:</strong>
                        <div>
                            <input type="number" name="hopeful_grade" placeholder="<?php                                
                            echo $row_result2['hopeful_grade']; 
                            ?>" value="<?php if ($row_result2['hopeful_grade'] != 0) {
                                echo $row_result2['hopeful_grade'];
                            } ?>">
                            <br>
                            <textarea name="hopeful_note"><?php echo $row_result2['hopeful_note']; ?></textarea>
                        </div>
                        <br>
                        <strong>最後一句希望感分數:</strong>
                        <div>
                            <input type="number" name="hopeful_grade2" placeholder="<?php                                
                            echo $row_result2['hopeful_grade2']; 
                            ?>" value="<?php if ($row_result2['hopeful_grade2'] != 0) {
                                echo $row_result2['hopeful_grade2'];
                            } ?>">
                            <br>
                            <textarea name="hopeful_note2"><?php echo $row_result2['hopeful_note2']; ?></textarea>
                        </div>
                        <strong>文章分類:</strong>
                        <br>
                        <input type=checkbox value="戀情" name="classify_1" <?php //if(isset($_POST['classify_1'])) echo "checked='checked'"; ?> /> 戀情
                        <input type=checkbox value="生活記事" name="classify_2"> 生活記事
                        <input type=checkbox value="心情抒發" name="classify_3"> 心情抒發
                        <input type=checkbox value="家庭關係" name="classify_4"> 家庭關係
                        <input type=checkbox value="生理狀況" name="classify_5"> 生理狀況
                        <br>
                        <input type=checkbox value="發問" name="classify_6"> 發問
                        <input type=checkbox value="自介" name="classify_7"> 自介
                        <input type=checkbox value="給版友的話" name="classify_8"> 給版友的話
                        <input type=checkbox value="回文" name="classify_9"> 回文
                        <input type=checkbox value="文章分享" name="classify_10"> 文章分享
                        <br>
                        <input type=checkbox value="反串文" name="classify_11"> 反串文
                        <input type=checkbox value="就醫經驗" name="classify_12"> 就醫經驗
                        <input type=checkbox value="悲憤" name="classify_13"> 悲憤
                        <br>
                        <textarea name="classify_other"><?php echo $row_result2['classify']; ?></textarea>
    					<br>
    					<button class="ibtn">儲存</button>
    					</form>
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
    						echo "<li><a target='_parent' href=new_page_2.php?page=".$prevpage.">上一篇</a></li> ";
    					} else{
    						echo "<li><a target='_parent' href=new_page_2.php?page=1>上一篇</a></li> ";
    					}
    					if ($page < 6) {
    						for( $i=1 ; $i<=6 ; $i++ ) {
    							echo "<li><a target='_parent' href=new_page_2.php?page=".$i.">".$i."</a></li> ";
    						} 
    					}elseif ($page >= 6 ) {
    						for( $i=1 ; $i<=$pages ; $i++ ) {
    							if ( $page-3 < $i && $i < $page+3 ) {
    								echo "<li><a target='_parent' href=new_page_2.php?page=".$i.">".$i."</a></li> ";
    							}
    						} 
    					}
    					if ($page != $data_nums+1) {
    						$nextpage = $page - 1;
    						echo "<li><a target='_parent' href=new_page_2.php?page=".$nextpage.">下一篇</a></li>";
    					} 
    					?>
    				</ul>
    			</div>
    			<br>
    		</div>
    	</body>
    	</html>