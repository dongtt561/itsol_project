<?php include ROOT_PATH.'/views/news/news_header.php';?>
<div class="content_search">
	<h4><b>Kết quả tìm kiếm</b></h4>
	<?php
		$sear=new newsController();
		$search=$sear->searchfull();
		if(!($search)){
			echo "Không tìm thấy bài viết";
		}
	?>

	<?php foreach ($search as $value) { ?>
	<div class="box_search">
		<div class="search_title">
			<a href="<?php echo HOME_PATH;?>/index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>">
				<b><?php echo $value['title']; ?></b>
			</a>
		</div>
		<div class="search_content">
			<p><?php echo $value['summary_post'];?></p>
		</div>
	</div>
	<?php } ?>
</div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>