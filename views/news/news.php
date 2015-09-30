<?php include ROOT_PATH.'/views/news/news_header.php';?>
<?php
	$news=new newsController();
	$getNews=$news->getnewsbyid();
	if (!isset($getNews)) {
		echo "Không có dữ liệu";
		die();
	}
?>
<div class="news_content">
	<div id="content_left">
		<div id="content">
			<?php foreach ($getNews as $value) { ?>
			<div id="intro">
				<div id="content_link">
					<ul>
						<li> 
							<a href="<?php echo HOME_PATH;?>/index.php?controller=home&action=home">Viet News</a> &nbsp;>&nbsp;
							<li><a href="<?php echo HOME_PATH;?>/index.php?controller=news&action=categoryviews&id_category=<?php echo $value['id_category']; ?>"><?php echo $value['full_category']; ?></a></li>
						</li>
					</ul>
				</div>
				<div id=c"content_time">
					<p id="news_time">
						<?php echo $value['time_post']; ?>
					</p>
				</div>
			</div>
			<div id="news_title">
				<p>
					<b><?php echo $value['title']; ?></b>
				</p>
			</div>
			<div id="news_summary">
				<p>
					<b><?php  echo $value['summary_post']; ?></b>
				</p>
							
			</div>
			<div id="content_">
				<?php echo $value['content']; ?>
			</div>
			<div id="author">
				<p id="news_author">
					<b><?php echo $value['author']; ?></b>
				</p>
			</div>
			<div id="comment_box">
				<div id="comment_bar">
					<div id="comment_logo">
						<a href="<?php echo HOME_PATH;?>/index.php?controller=home&action=home"><img src="public/img/logo.png" /></a>
					</div>
					<div id="comment_user">
						<ul>
							<?php
							if (isset($_SESSION['login'])) {
							echo '<div id="welcome"><b>'.$_SESSION['login']['user_name'].'</b></div>';
							}
							else{
							?>
							<li><a href="<?php echo HOME_PATH;?>/index.php?controller=home&action=home">Đăng nhập</a></li>
							<li><a href="<?php echo HOME_PATH;?>/index.php?controller=user&action=register">Đăng kí</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="delete_status">
		            <?php 
			            if(isset($_SESSION['msg_cmt'])){
			                echo $_SESSION['msg_cmt'];
			                unset($_SESSION['msg_cmt']);
			            }
		            ?>
            	</div>
				<form method="post" action="<?php echo HOME_PATH;?>/index.php?controller=news&action=comment&id_post=<?php echo $value['id']; ?>">
				<?php } ?> <!-- end foreach -->
					<div id="comment_inner">
						<textarea name="content" minlength="1"  maxlength="500" required placeholder="Nội dung bình luận"></textarea>
					</div>

					<div id="comment_post">
						<div id="sum_comment">
							<?php  
								$cmtcount=new newsController();
								$sumcmt=$cmtcount->countCmt();
							?>
							<?php foreach ($sumcmt as $value) { ?>
							<p><b><?php echo $value['sumCmt'].' '; ?>Bình luận</b></p>
							<?php } ?>
						</div>
						<div id="comment_post_action">
							<input type="submit" value="Gửi bình luận"></input>
						</div>
					</div>
				</form>
			</div>
			<?php
				$cmt = new newsController();
				$allCmt = $cmt->getAllComment();
			?>
			<?php foreach ($allCmt as $value) { ?>
			<div id="comment_list">
				<div id="comment1">
					<div id="user_cmt_bar">
						<div id="user_cmt">
							<p><b><?php echo $value['user_name']; ?></b></p>
						</div>
						<div id="cmt_time">
							<p><?php echo $value['time_comment']; ?></p>
						</div>
						<?php foreach ($getNews as  $val) { ?>
						<?php if (isset($_SESSION['login']) && $_SESSION['login']['id_group']==2) { ?>
							<div id="deleteComment">
								<a href="<?php echo HOME_PATH;?>/index.php?controller=news&action=deleteCmt&id_cmt=
													<?php echo $value['id']; ?>&id_post=<?php echo $val['id'];  ?>">Xóa</a>
							</div>
						<?php } else if (isset($_SESSION['login'])
										&& $_SESSION['login']['id']== $val['id_editor']) { ?>
											<div id="deleteComment">
												<a href="<?php echo HOME_PATH;?>/index.php?controller=news&action=deleteCmt&id_cmt=
													<?php echo $value['id']; ?>&id_post=<?php echo $val['id'];  ?>">Xóa</a>
											</div>
								<?php } ?> <?php } ?>
					</div>
					<div id="comment_content">
						<p><?php echo $value['content_comment']; ?></p>
					</div>
				</div>

				<!-- <div id="view_more_cmt">
					<a href="#"><b>Xem các bình luận khác</b></a>				
				</div> -->
			</div>
			<?php } ?> <!-- end foreach -->
		</div>
	</div>
	<div id="content_right">
		<script> 
			// $(function() {    
			// 	$('.neoslideshowCol img:gt(0)').hide();   
			// 	setInterval(function(){      
			// 		$('.neoslideshow :first-child').fadeOut().next('img').fadeIn().end().appendTo('.neoslideshow');
			// 	},4000);
			// })   
		</script>
		
<!-- 		<div class="neoslideshowCol">  --> 
			<img src="public/img/slide2/slide1.jpg"  />
			<!-- <img src="public/img/slide2/slide2.jpg" width="auto" height="auto" />
			<img src="public/img/slide2/slide3.jpg" width="auto" height="auto" /> -->
<!-- 		</div>  -->
	</div>
</div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>