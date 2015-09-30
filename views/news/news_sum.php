<?php include ROOT_PATH.'/views/news/news_header.php';?>

<div class="content">
	<div class="content_left">
		<div class="box">
			<div class="box_left">
				<?php  
					$news=new newsController();
					$n1=$news->getTopbyID();
					if (!isset($n1)) {
						echo "Không đủ dữ liệu";
						die();
					}
				?>
				<?php foreach ($n1 as  $value) { ?>
				<div class="first_news">
					<div class="first_img">
						<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>" 
							title="<?php echo $value['title']; ?>">
							<img src="<?php echo HOME_PATH.'/'.$value['images']; ?>"/>
						</a>
					</div>
					<div class="first_content">
						<div class="first_title">
							<p>
								<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>">
									<b><?php echo $value['title']; ?></b>
								</a>
							</p>
							<p id="text_p">
								<?php echo $value['summary_post'].'...'; ?>
							</p>
						</div>
						<div class="view_more">
							<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>">Xem tiếp</a>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php  
					$news2=new newsController();
					$n2=$news2->getPostbyIdCategory();
					if (!isset($n2)) {
						echo "Không đủ dữ liệu";
						die();
					}
				?>
				<?php foreach ($n2 as  $value) { ?>
				<div class="second_news">
					<div class="second_img">
						<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>" title="<?php echo $value['title']; ?>">
							<img src="<?php echo HOME_PATH.'/'.$value['images']; ?>"/>
						</a>
					</div>
					<div class="second_content">
						<div class="second_title">
							<p>
								<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>">
									<b><?php echo $value['title']; ?></b>
								</a>
							</p>
							<p id="text_p2">
								<?php echo $value['summary_post'].'...'; ?>
							</p>
						</div>
						<div class="view_more">
							<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>">Xem tiếp</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="box_right">
				<?php  
					$news3=new newsController();
					$n3=$news3->getPostbyIdCategory();
					if (!isset($n3)) {
						echo "Không đủ dữ liệu";
						die();
					}
				?>
				<?php foreach ($n3 as  $value) { ?>
				<div class="news_nomal">
					<ul>
						<li>
							<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>">
								<?php echo $value['title']; ?>
							</a>
						</li>
					</ul>
				</div>
				<?php } ?>
				<!-- <div class="view_more_news">
					<a href="#"><b><< Xem Thêm >></b></a>
				</div> -->
			</div>
		</div>
	</div>
	<div class="content_right">
		QUẢNG CÁO

	</div>
</div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>